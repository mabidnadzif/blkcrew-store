<?php  
  session_start();

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

    <title>BLKCREW.Login</title>
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
              <li><a class="dropdown-item" href="produk.php">ALL CATEGORY</a></li>
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
    <br><br>

<form action="" method="post">
  <center>
    <img src="logo.png" style="width: 30%">

      <div class="col-md-4" style="margin-right: 6%; margin-bottom: 20%">
       <div class="mb-2 row">
        <label for="input" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"> 
          <input type="input" class="form-control" name="email" placeholder="Username">
         
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Password">
      <div class="col-auto" style="margin-top: 3%">
        <button type="submit" class="btn btn-primary mb-3" name="login">Login</button>
      </div>

       <div id="emailHelp" class="form-text" align="justify">Untuk mencoba melanjutkan transaksi silahkan masukkan Username & Password yang sudah disediakan,<p><br> <b>Masukkan : <br> Username : abid@gmail.com <br> Password : abid123 </b></p><br> 
        atau mencoba untuk <a href="daftar.php"> Daftar Akun </a></div>
        </div>
      </div>
    </div>
  </center>
</form>


  <?php  
  //Jika tombol di tekan

  if (isset($_POST["login"]))
  {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $ambil = $koneksi->query("SELECT*FROM pelanggan 
      WHERE email_pelanggan='$email' AND password ='$password'");

    $akunyangcocok = $ambil->num_rows;

    if ($akunyangcocok==1)
    {
      $akun = $ambil->fetch_assoc();

      $_SESSION["pelanggan"] = $akun;
      echo "<script>alert('anda sukses login');</script>";
      echo "<script>location ='index.php';</script>";
    }
    else
    {
      echo "<script>alert('anda gagal login, periksa akun anda');</script>";
      echo "<script>location ='login.php';</script>";
    }


  }
  ?>


  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  
</body>
</html>

      