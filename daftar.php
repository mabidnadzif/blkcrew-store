<?php 
	include 'koneksi.php';
?>


<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>BLKCREW. Daftar</title>
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
              <li><a class="dropdown-item" href="#pria">MEN</a></li>
              <li><a class="dropdown-item" href="#wanita">LADIES</a></li>
              <li><a class="dropdown-item" href="katalog.php">ALL CATEGORY</a></li>
            </ul>
          </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#about"><b>ABOUT</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#contact"><b>CONTACT</b></a>
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
  <br><br><br><br><br><br><br>

  <div class="container">
  	<div class="row">
  		<div class="col-md-8 col-md-offset-5">
  			<div class="panel panel-default">
  				<div class="panel-heading">
  					<h3>Daftar Akun Pelanggan</h3>
  				</div>
  				<div class="panel-body">
  					<form method="post" class="form-horizontal">
  						<div class="form-group">
  							<label class="control-label col-md-3">Nama</label>
  							<div class="col-md-7">
  								<input type="text" class="form-control" name="nama" required>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-md-3">Email</label>
  							<div class="col-md-7">
  								<input type="email" class="form-control" name="email" required>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-md-3">Password</label>
  							<div class="col-md-7">
  								<input type="text" class="form-control" name="password" required>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-md-3">Alamat</label>
  							<div class="col-md-7">
  								<textarea class="form-control" name="alamat" required></textarea>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-md-3">Telp/Hp</label>
  							<div class="col-md-7">
  								<input type="text" class="form-control" name="telepon" required><br>
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="col-md-7 col-md-offset-3">
  								<button class="btn btn-primary" name="daftar">Daftar</button>
  							</div>
  						</div>
  						
  					</form>
  					<?php  
  					//jika tombol daftar di tekan

  					if (isset($_POST ["daftar"]))
  					{
  						//mengambil isian nama,email,password,alamat,telepon
  						$nama = $_POST["nama"];
  						$email = $_POST["email"];
  						$password = $_POST["password"];
  						$alamat = $_POST["alamat"];
  						$telepon = $_POST["telepon"];

  						// cek email apakah sudah digunakkan 
  						$ambil = $koneksi-> query ("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
  						$yangcocok = $ambil -> num_rows;
  						if ($yangcocok == 1)
  						{
  							echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
  							echo "<script>location='daftar.php';</script>";
  						}
  						else
  						{
  							//query insert ke tabel pelanggan
  							$koneksi -> query("INSERT INTO pelanggan (email_pelanggan,password,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES ('$email','$password','$nama','$telepon','$alamat')");

  							echo "<script>alert('pendaftaran sukses,silahkan login');</script>";
  							echo "<script>location='login.php';</script>";
  						}
  					}

  					?>


  				</div>
  			</div>	
  		</div>
  	</div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>
