<?php  
  //koneksi ke database  
 include 'koneksi.php';

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

    <section class="konten">
    	<div class="container">
    		
    		<h2>Detail Pembelian</h2>
        <br><br>

			<?php 
			$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian ='$_GET[id]'");
			$detail=$ambil->fetch_assoc();
			?>

			<!-- <pre><?php //print_r($detail);  ?></pre> -->


        <div class="row">
          <div class="col-md-4">
            <h3>Pembelian</h3>
            <strong>No. Pembelian<?php echo $detail['id_pembelian']; ?></strong> <br>
            Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
            Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
          </div>
          <div class="col-md-4">
            <h3>Pelanggan</h3>
            <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
            <p>
              
              <?php echo $detail['telepon_pelanggan']; ?> <br>
              <?php echo $detail['email_pelanggan']; ?>

            </p>
          </div>
          <div class="col-md-4">
            <h3>Pengiriman</h3>
            <strong><?php echo $detail['nama_kota']; ?></strong> <br>
            Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
            Alamat : <?php echo $detail['alamat_pengiriman']; ?>
          </div>
        </div>

			  <table class ="table table-bordered">
			    <thead>
			      <tr>
			        <th>No</th>
			        <th>Nama Produk</th>
			        <th>Harga</th>
              <th>Berat</th>
			        <th>Jumlah</th>
              <th>Subberat</th>
			        <th>Subtotal</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php $nomor=1; ?>
			    	<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'"); ?>
			    	<?php	while($pecah=$ambil->fetch_assoc()){ ?>
			      <tr>
			        <td><?php echo $nomor; ?></td>
			        <td><?php echo $pecah['nama']; ?></td>
			        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
              <td><?php echo $pecah['berat']; ?> Gr.</td>
			        <td><?php echo $pecah['jumlah']; ?></td>
              <td><?php echo $pecah['subberat']; ?> Gr.</td>
			        <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
			      </tr>
			      <?php $nomor++;  ?>
			      <?php }	 ?>

			    </tbody>
			  </table>

			  <div class = "row">
			  	<div class="col-md-7">
			  		<div class="alert alert-info">
			  			<p>
			  				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
			  				<strong>BANK BCA 44223455 AN. BLKCREW STORE </strong>
			  			</p>
			  			
			  		</div>
			  	</div>
			  </div>


    	</div> 	
    </section>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>



