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

  <?php 
  					if (isset($_POST ["kirim"]))
  					{
  						//mengambil isian nama,email,password,alamat,telepon
  						$nama = $_POST["nama"];
  						$email = $_POST["email"];
  						$subjek = $_POST["subjek"];
  						$pesan = $_POST["pesan"];


  							$koneksi -> query("INSERT INTO respon (namares,emailres,subjekres,pesanres) VALUES ('$nama','$email','$subjek','$pesan')");

  							echo "<script>alert('Terimakasih,Pesan Anda Berhasil Dikirim');</script>";
  							echo "<script>location='index.php';</script>";
  						
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
