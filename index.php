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
  <br><br><br><br>

  
      <!-- Carousel -->

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="banner/banner2.png " class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="banner/bannernewfix.png" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="banner/bannernew.png" class="d-block w-100" alt="...">
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <br><br><br><br>

    <!-- Produk Pria -->
    <section id="pria" class="pria bg-light">
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

    <!-- Feature Brand -->
    <section id="brand" class="brand">
      <div class="container">
        <h3 class="font-weight-bold text-center" style="" ><b>FEATURED BRAND </b></h3>
        <div class="row mt-3">
        <img src="banner/jumbro1.jpeg" class="card-img-top p-1" alt="...">
        <img src="banner/bannerhan.jpg" class="card-img-top p-1" alt="...">
        <center>
          <img src="banner/logogl.png" class="card-img-fluid" style="width: 15rem;" alt="...">
          <img src="banner/logohanna.png" class="card-img-fluid"  style="width: 15rem;" alt="...">
        </center>
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


        <?php $ambil = $koneksi->query("SELECT*FROM produk LIMIT 6,6 "); ?>
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



  <section id="about" class="about p-4">
    <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img src="banner/abct.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>ABOUT US</h3>
            <br>
            <p>
              <b>BLKCREW</b> adalah sebuah perusahaan yang bergerak di bidang Fashion kami menyediakan banyak fashion berbagai kalangan baik pria maupun wanita
              dengan style yang terbaru dan selalu menyuguhkan kualitas yang terbaik
              demi kenyamanan pelanggan.
            </p>
            <p>
              <b>BLKCREW</b> sendiri sudah bekerjasama dengan beberapa produk lokal terbaik
              salah satunya yaitu ada 3second,Greenlight,Hana, dan juga Cutoff, dengan harapan kerja sama ini mampu memperkuat produk pakaian lokal lebih dikenal masyarakat luas baik luar maupun dalam negeri.
            </p>
            <p>
              Dengan tagline kami <b>"ADA MANTAN YANG HARUS MENYESAL"</b> kami akan membantu para generasi milenial, memperbaiki penampilan yang lebih berkualitas dengan pakaian - pakaian yang berkualitas pula, karena pakaian yang berkulitas menggambarkan kualitas diri yang baik
            </p>
            <p>
              <b>BLKCREW</b> memberikan jaminan barang bisa dikembalikan atau tukar size sepuasnya jika pakaian yang diterima tidak sesuai dengan pesanan yang diharapkan, dengan catatan maksimal h+3 setelah barang diterima
          </div>
        </div>
      </div>
    </section>
  
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <br><br><br><br><br>
      <div class="container">

        <div class="section-title text-center">
          <h2>CONTACT US</h2>
        </div>

        <div class="row mt-5 justify-content-center text-center">

          <div class="col-lg-10 bg-light ">
          <br><br>

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i><img src="icon/lokasi.svg" style="width: 10%;"></i>
                  <h4>Lokasi</h4>
                  <p>Jl.Tubagus,Kendal, Jawa Tengah</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i><img src="icon/mail.svg" style="width: 10%;"></i>
                  <h4>Email</h4>
                  <p>officialbulek@gmail.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i><img src="icon/phone.svg" style="width: 10%;"></i>
                  <h4>Telepon</h4>
                  <p>WA +62 83838470175 </p>
                </div>
              </div>
            </div>

          <div class="row mt-5 justify-content-center">
          <div class="col-lg-10">
            <form action="respon.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="pesan" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center p-4"><button class="btn btn-dark" type="submit" name="kirim">Kirim Pesan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <br><br>

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