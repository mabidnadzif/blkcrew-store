<?php  
  session_start();
  error_reporting(0); 

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
  <br><br><br><br><br><br>

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
	        <th>Aksi</th>
	      </tr>
	    </thead>
	    <tbody align="center">
	      <?php $nomor=1; ?>
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
	        <td>
          		<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class ="btn btn-danger btn-xs">hapus</a>
          	</td> 
	      </tr>
	  <?php $nomor++;  ?>
	  <?php endforeach	 ?>

	    </tbody>
	  </table>
	  <p><font size="2"><b>Nb : Jika Ingin Menambah Jumlah Beli Produk, Silahkan Lanjutkan Belanja Dan Klik "Pesan" Pada Produk Yang Sama, atau bisa melalui detail produk kemudian masukkan jumlah beli yang di inginkan</b> </font></p>

	  <a href="index.php" class="btn btn-outline-dark"> Lanjutkan Belanja</a>
	  <a href="checkout.php" class="btn btn-primary"> Checkout</a>
	 </div>
	</section>


  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>