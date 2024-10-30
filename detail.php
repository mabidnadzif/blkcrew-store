<?php

 session_start();
  //koneksi ke database  
 include 'koneksi.php';


//mendapatkan id produk dari url
$id_produk = $_GET['id'];

//querry ambil data
$ambil = $koneksi -> query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil -> fetch_assoc();

//echo "<pre>";
	//print_r($detail);
//echo "</pre>";


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
  	<div class="container">
  		<div class="row">
  			<div class ="col-md-6">
  				<img src="foto_produk/<?php echo $detail["foto_produk"];?>" alt="" class="img-fluid">	
  			</div>
  			<div class="col-md-6">
  				<h2><?php echo $detail["nama_produk"]?></h2>
  				<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4><br>

  				<form method = "post">
  					<div class="form-group">
  						<div class="input-group">
  							<input type="number" min="1" class="form-control" placeholder="Masukkan Jumlah Beli" name="jumlah">
  							<div class="input-group-btn">
  								<button class="btn btn-primary" name="beli">Beli</button>
  							</div>
  						</div>
  					</div>
  				</form>
  				<br>

  				<?php  

  				//jk ada tombol beli
  				if (isset($_POST["beli"]))
  				{
  					//mendapatkan jumlah yang diinputkan
  					$jumlah = $_POST["jumlah"];
  					//masukkan di keranjang belanja
  					$_SESSION["keranjang"][$id_produk] = $jumlah;

  					echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
  					echo "<script>location = 'keranjang.php';</script>";
  				}

  				?>

  				<h4>Deskripsi Produk :</h4>
  				<p ><?php echo $detail["deskripsi_produk"]?></p>


  			</div> 

  		</div>
  	</div>
  </section> 

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	

</body>
</html>