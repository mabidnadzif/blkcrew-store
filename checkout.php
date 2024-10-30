<?php  
  session_start();

    //echo "<pre>";
  //print_r($_SESSION['keranjang']);
  //echo "</pre>";

  //koneksi ke database  
  include 'koneksi.php';

  if (!isset ($_SESSION["pelanggan"]))
  {
    echo "<script>alert('Untuk melanjutkan transaksi, silahkan login terlebih dahulu');</script>";
    echo "<script>location ='login.php';</script>";
  }



?>

<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>BLKCREW.</title>
  </head>
    <body>

      <!-- Navbar -->
     <header id="header" class="fixed-top d-block align-items-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid px-3">
          <a class="navbar-brand" href="index.html"><img src="logo.png" width="150"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-1">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><b>HOME</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle font-weight-bold" style="color:  #000000;" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>
            KATALOG
              </b></a>
           <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="katalog.php">MEN</a></li>
              <li><a class="dropdown-item" href="katalog.php">LADIES</a></li>
              <li><a class="dropdown-item" href="katalog.php">ALL CATEGORY</a></li>
            </ul>
          </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><b>ABOUT</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><b>CONTACT</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="keranjang.php"><b>KERANJANG</b></a>
            </li>
            
            <?php if (isset($_SESSION["pelanggan"])): ?>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php"><b>LOGOUT</b></a>
              </li>
            <?php else :  ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php"><b>LOGIN</b></a>
              </li>
            <?php endif  ?>
            
          </ul>
        <form class="d-flex me-2 mb-lg-1" style="width: 500px">
          <input class="form-control me-2" type="search" placeholder="Search Product" aria-label="Search">
          <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>

        </div>
        </div>
      </nav>
    </header>
    <br><br><br><br><br><br><br><br>

    <section class ="konten">
    <div class = "container">
      <h1> Keranjang Belanja </h1>
      <hr>

    <table class ="table table-bordered">
      <thead align="center">
        <tr>
          <th>No</th>
          <th>Foto Produk</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>

        </tr>
      </thead>
      <tbody align="center">
        <?php $nomor=1; ?>
        <?php $totalbelanja = 0; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
        <?php 
        $ambil = $koneksi->query("SELECT*FROM produk WHERE id_produk='$id_produk'");
        $pecah=$ambil->fetch_assoc();
        $subharga = $pecah["harga_produk"]*$jumlah;
        ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td>
            <img src="foto_produk/<?php echo $pecah['foto_produk'];?>" width = "100">
          </td>
          <td><?php echo $pecah['nama_produk']; ?></td>
          <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
          <td><?php echo $jumlah; ?></td>
          <td>Rp. <?php echo number_format($subharga); ?></td>
    
    <?php $nomor++;  ?>
    <?php $totalbelanja+=$subharga; ?>
    <?php endforeach   ?>

      </tbody>
      <tfoot>
        <tr>
          <th colspan="5"> Total Belanja </th>
          <th>Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>
      </tfoot>
    </table>
    

    <form method="post">
      <div class = "row">
        <div class = "col-md-4">
          <div class = "form-group">
            <input type = "text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class = "form-control">
          </div>
        </div>
        <div class ="col-md-4">
          <div class = "form-group">
            <input type = "text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class = "form-control">
          </div>
        </div>
        <div class ="col-md-4">
          <select class = "form-control" name ="id_ongkir">
            <option value>Pilih Ongkos Kirim</option>
            <?php 
            $ambil = $koneksi->query("SELECT*FROM ongkir");
            while($perongkir=$ambil->fetch_assoc()){
             ?>
            <option value="<?php echo $perongkir['id_ongkir'] ?>">
              <?php echo $perongkir['nama_kota'] ?> -
              Rp. <?php echo number_format($perongkir['tarif']) ?>
            </option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group"><br>
        <label> Alamat Lengkap Pengiriman :</label><br>
        <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap penngiriman"></textarea>
      </div>
       <br>
      <button  class="btn btn-primary" name="checkout">Checkout</button>
    </form>

    <?php  

    if (isset($_POST["checkout"]))
    {
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $id_ongkir = $_POST["id_ongkir"];
      $tanggal_pembelian = date("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

      $ambil = $koneksi->query("SELECT*FROM ongkir WHERE id_ongkir = '$id_ongkir'");
      $arrayongkir=$ambil->fetch_assoc();
      $nama_kota = $arrayongkir['nama_kota'];
      $tarif = $arrayongkir['tarif'];

      $total_pembelian = $totalbelanja + $tarif;

      //menyimpan data ke tabel pembelian
      $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

      // mendapatkan id pembelian barusan terjadi
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
      {
          
         $ambil = $koneksi -> query ("SELECT * FROM produk WHERE id_produk = '$id_produk'");
         $perproduk = $ambil -> fetch_assoc();

         $nama = $perproduk['nama_produk'];
         $harga = $perproduk['harga_produk'];
         $berat = $perproduk['berat'];

         $subberat = $perproduk['berat'] * $jumlah;
         $subharga = $perproduk ['harga_produk']*$jumlah; 

         $koneksi -> query ("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
          VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
      }

      // mengkosongkan keranjang belanja

      unset ($_SESSION["keranjang"]);

      //tampilan dialihkan ke halaman nota dari pembelian barusan
      echo "<script>alert('pembelian_sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }

    ?>

   </div>
  </section>

  <!-- <pre><?php //print_r($_SESSION['pelanggan'])  ?></pre> -->
  <!-- <pre><?php //print_r($_SESSION["keranjang"])  ?></pre> -->

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>
</html>

