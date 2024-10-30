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
  <br><br><br><br>


    <!-- Produk Terbaru -->
    <section id="pria" class="pria bg-light">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>NEW ARRIVAL
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 12,6 "); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>


        </div>
      </div>
    </div>
    </section>

    <br><br><br>

    <!-- Kategori Pria -->
    <section id="pria" class="pria">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>KATEGORI PRIA
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 0,6 "); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>


        </div>
      </div>
    </div>
    </section>

    <br><br><br>

     <!-- Produk Wanita -->
    <section id="wanita" class="wanita bg-light">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>KATEGORI WANITA
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 6,6"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>

      </div>
      </div>
    </div>
    </section>
    <br><br><br>



    <!-- BOYS KATEGORI -->
    <section id="pria" class="pria">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>BOYS KATEGORI
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 18,6 "); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>


        </div>
      </div>
    </div>
    </section>

    <br><br><br>

     <!-- GIRLS KATEGORI -->
    <section id="wanita" class="wanita bg-light">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>GIRL'S KATEGORI 
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 24,6"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>

      </div>
      </div>
    </div>
    </section>
    <br><br><br>


    <!-- KATEGORI CREWNECK -->
    <section id="pria" class="pria">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>CREWNECK
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 30,6 "); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>


        </div>
      </div>
    </div>
    </section>

    <br><br><br>

    <!-- KATEGORI HOODIE -->
    <section id="wanita" class="wanita bg-light">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>HOODIE 
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 36,6"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>

      </div>
      </div>
    </div>
    </section>
    <br><br><br>

    <!-- KATEGORI COACH JACKET -->
    <section id="pria" class="pria">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>COACH JACKET
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 42,6 "); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>


        </div>
      </div>
    </div>
    </section>

    <br><br><br>

     <!-- KATEGORI LONG SLEEVE -->
    <section id="wanita" class="wanita bg-light">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>LONG SLEEVE
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 48,6"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>

      </div>
      </div>
    </div>
    </section>
    <br><br><br>

    <!-- SEPATU -->
    <section id="pria" class="pria">
    <div class="homepage mt-3 ">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="font-weight-bold text-center p-4" style="" ><b>SEPATU 
              </b></h3>
            </div>
          </div>

      <div class="row mt-3">


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 54,6 "); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-4 col-sm-6 col-xs-12 shadow p-3 mb-5 bg-body rounded ">
          <div class="card ">
            <div class="card-body ">
              <img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
              <h4 class="card-title"><?php echo $perproduk['nama_produk'];?></h4>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-dark">
                Beli
              </a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-success">
                <img src="icon/shopping-cart-down.svg">
                Lihat Detail Produk
              </a>
            </div>
          </div>
        </div>
      <?php } ?>


        </div>
      </div>
    </div>
    </section>

    <br><br><br>

     <!-- ======= Footer ======= -->
  <footer id="footer" class="bg-dark text-white">
    <br><br><br>

    <div class="footer-top">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>BLKCREW.</h3>
            <p>
              JL.Tubagus Tosari <br>
              Kendal, Pos 51371<br>
              Indonesia <br><br>
              <strong>Phone:</strong> +62 83838470175<br>
              <strong>Email:</strong> officialbulek@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links ">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-white">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about" class="text-white">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact" class="text-white">Contact us</a></li>
            </ul>
          </div>

          <div class="col-lg-5 col-md-6 footer-newsletter me-5">
            <h4>Join Our Newsletter</h4>
            <p>However, none of the things I will read will be our big mistake</p>
            <form action="" method="post" >
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>BLKCREW.</span></strong> All Rights Reserved
        </div>
        <div class="credits">
          Credit by BLKCREW.
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.instagram.com/" class="instagram"><i><img class="mx-3" src="social-media/ig_ico.svg"></i></a>
        <a href="https://www.facebook.com/" class="facebook"><i><img class="mx-3" src="social-media/fb_ico.svg"></i></a>
        <a href="https://www.twitter.com/" class="twitter"><i ><img class="mx-3" src="social-media/twit_ico.svg"></i></a>
        <a href="#" class="pinters"><i><img class="mx-3" src="social-media/pinters_ico.svg"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>



  </body>
</html>