<?php 
include "config.php";
session_start();

if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

$login = $_SESSION['login'];
$query_user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$login'"));

$query = mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$login'");
$row = mysqli_fetch_assoc($query);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/text.css">

  <title>Home</title>
</head>

<body style="overflow-x: hidden;">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid bg1">
      <img src="logo.png" alt="" class="align-self-center rounded-circle" width="100px" height="100px"
        style="margin: 0,1% 0; position:relative; left:200px;">
      <form class="d-flex" style="position:relative; right:80px">
        <input class="form-control me-2" type="Cari Disini" placeholder="Cari Disini" aria-label="Cari">
        <button class="btn btn-outline-success" type="submit" style="width: 200px;">Cari</button>
        <img src="./asset/icon/keranjang.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
        <i class="bx bx-chevron-right"></i> <a href="keranjang.php" style="margin-left: 10px;"> Keranjang</a>
        <p style="margin-left: 30px;"> |</p>
        <img src="<?= "foto/profil/" .$query_user['PHOTO'] ?>" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
        <i class="bx bx-chevron-right"></i> <a href="profile.php" style="margin-left: 10px;"> <?= $row['FIRST_NAME'] ?></a>
        <p style="margin-left: 30px;"> |</p>
        <i class="bx bx-chevron-right"></i> <a class="fw-bold" href="#" style="margin-left: 20px;"> Bahasa</a>
      </form>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
          <a class="nav-link active" aria-current="page" href="homepage.php">HOME</a>
          <a class="nav-link active" aria-current="page" href="product.php?id=3001">BUNGA POT BESAR</a>
          <a class="nav-link active" aria-current="page" href="product.php?id=3002">BUNGA POT KECIL</a>
          <a class="nav-link active" aria-current="page" href="product.php?id=3003">POHON HIAS</a>
        </div>
      </div>
    </div>
  </nav>

  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <img src="./asset/icon/slide1.jpg" class="d-block w-100" alt="" class="img-fluid"
          style="height: 630px; width: 1600px;">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="./asset/icon/slide2.jpg" class="d-block w-100" alt="" class="img-fluid"
          style="height: 630px; width: 1600px;">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="./asset/icon/slide3.jpg" class="d-block w-100" alt="" class="img-fluid"
          style="height: 630px; width: 1600px;">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container mt-3">

    <h3 style="margin-top: 50px;" >New Arrival!!!</h3>
    <br>

    <div class="row mt-3">
      <div class="col-md-5 custom1">
        <img src="./asset/icon/box1.jpg" alt="" class="img-fluid" style="height: 420px; width: 500px;">
        <!-- <button type="button" class="btn btn-primary">SHOP NOW</button> -->
      </div>
      <?php 
        $query1 = mysqli_query($db, "SELECT * FROM product ORDER BY ID_PRODUCT ASC LIMIT 2");
        while($row_query1 = mysqli_fetch_assoc($query1)) :
          $id_product = $row_query1['ID_PRODUCT'];        
          $diskon = $row_query1['PRICE'] - $row_query1['DISCOUNT'];
          // $persen = $row_query_top_Seller['DISCOUNT'] / $row_query_top_Seller['PRICE'] * 100;
          $query_diskon =  mysqli_query($db, "SELECT * FROM product WHERE ID_PRODUCT = '$id_product'");
          $row_diskon = mysqli_fetch_assoc($query_diskon);
          $persen_total = $row_diskon['tmp_discount'];
      ?>
      <div class="col-md-3">
        <a href="detail-page.php?id=<?= $row_query1['ID_PRODUCT'] ?>">
          <div class="card" style="width: 18rem;">
            <img src="<?= "foto/" . $row_query1['gambar'] ?>" class="card-img-top" alt="Ini Foto" width="50" height="300">
            <div class="card-body">
              <h5 class="card-title"><?= $row_query1['NAME'] ?></h5>

              <div class="d-flex flex-row bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                  <h6 style="font-size: 15px; text-decoration:line-through">Rp. <?= $row_query1['PRICE'] ?></h6>
                </div>
                <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                    style="font-size: 15px; text-decoration: none !important;"> Rp. <?= $diskon ?></span></div>
              </div>

              <div class="badge bg-primary text-wrap ml-auto">
                <?= $persen_total ?>% Off
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <?php 
          $query2 = mysqli_query($db, "SELECT * FROM product ORDER BY QUANTITY DESC LIMIT 2");
          while($row_query2 = mysqli_fetch_assoc($query2)) :
            $id_product = $row_query2['ID_PRODUCT'];        
            $diskon = $row_query2['PRICE'] - $row_query2['DISCOUNT'];
            // $persen = $row_query_top_Seller['DISCOUNT'] / $row_query_top_Seller['PRICE'] * 100;
            $query_diskon =  mysqli_query($db, "SELECT * FROM product WHERE ID_PRODUCT = '$id_product'");
            $row_diskon = mysqli_fetch_assoc($query_diskon);
            $persen_total = $row_diskon['tmp_discount'];
      ?>
      <div class="col-md-3">
        <a href="detail-page.php?id=<?= $row_query2['ID_PRODUCT'] ?>">
          <div class="card" style="width: 18rem;">
            <img src="<?= "foto/" . $row_query2['gambar'] ?>" class="card-img-top" alt="Ini Foto" width="50" height="300">
            <div class="card-body">
              <h5 class="card-title"><?= $row_query2['NAME'] ?></h5>
              <div class="d-flex flex-row bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                  <h6 style="font-size: 15px; text-decoration:line-through">Rp. <?= $row_query2['PRICE'] ?></h6>
                </div>
                <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                    style="font-size: 15px; text-decoration: none !important;"> Rp. <?= $diskon ?></span></div>
              </div>
              <div class="badge bg-primary text-wrap ml-auto">
                <?= $persen_total ?>% Off
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php 
        endwhile;
      ?>
      <div class="col-md-5 custom1">
        <img src="./asset/icon/taman.jpg" alt="" class="img-fluid" style="height: 420px; width: 500px;">
      </div>
      <div class="row">
        <img src="./asset/icon/panjang1.jpg" class="img-fluid mt-3" alt="..." style="height: 177px; width: 1185px;">
      </div>
      <h3><br style="margin-top: 50px;">TOP SELLERS</h3>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <?php 
        $query_top_seller = mysqli_query($db, "SELECT * FROM PRODUCT ORDER BY QUANTITY DESC LIMIT 4");
        while($row_query_top_Seller  = mysqli_fetch_assoc($query_top_seller)) :
          $id_product = $row_query_top_Seller['ID_PRODUCT'];        
          $diskon = $row_query_top_Seller['PRICE'] - $row_query_top_Seller['DISCOUNT'];
          // $persen = $row_query_top_Seller['DISCOUNT'] / $row_query_top_Seller['PRICE'] * 100;
          $query_diskon =  mysqli_query($db, "SELECT * FROM product WHERE ID_PRODUCT = '$id_product'");
          $row_diskon = mysqli_fetch_assoc($query_diskon);
          $persen_total = $row_diskon['tmp_discount'];
      ?>
      <div class="col-md-3">
        <a href="detail-page.php?id=<?= $row_query_top_Seller['ID_PRODUCT'] ?>">
          <div class="card">
            <img src="<?= "foto/" . $row_query_top_Seller['gambar'] ?>" class="card-img-top" alt="Ini Foto" width="50" height="300">
            <div class="card-body">
              <h5 class="card-title"><?= $row_query_top_Seller['NAME'] ?></h5>
              <div class="d-flex flex-row bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                  <h6 style="font-size: 14px; text-decoration:line-through">Rp.<?= $row_query_top_Seller['PRICE'] ?></h6>
                </div>
                <div class="p-2 bd-highlight" style="margin-top: -6px;"><span
                    style="font-size: 14px; text-decoration: none !important;"> Rp. <?= $diskon ?></span></div>
              </div>
              <div class="badge bg-primary text-wrap ml-auto">
                <?= $persen_total ?>% Off
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php 
      endwhile;
      ?>
    </div>
  </div>

  <div class="footer mt-5 pb-5 bg1">
    <div class="container-fluid">
      <div class="row ms-5 me-6">

        <div class="col-lg-2 col-md-6 footer-contact" style="margin-top: 50px; margin-left: 25px;">
          <img src="./asset/icon/logo.jpeg" class="align-self-center rounded-circle" alt="..."
            style="height: 100px; width: 100px; margin-left: 85px;">
          <div class="icon-sosmed d-flex flex-row justify-content-center">
            <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/bfacebook.png" alt="" width="40px" height="40px"
                  style="margin-top: 10px;">
          </a>
          <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/btwitter.png" alt="" width="35px" height="35px"
                  style="margin-top: 13px;">
          </a>
          <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/google+.jpeg" alt="" width="40px" height="40px"
                  style="margin-top: 10px;">
          </a>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links" style="margin-top: 50px; margin-left: 25px;">
          <h4>MAIN PAGE</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Sell with Us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Promos</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Become an Ambassador</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 footer-links" style="margin-top: 50px; margin-left: 25px;">
          <h4>POLICY</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of Usage</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy Policy</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Return Policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 footer-contact" style="margin-top: 50px; margin-left: 25px;">
          <h4>CATEGORIES</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="product.php?id=3001">Bunga Pot Besar</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="product.php?id=3002">Bunga Pot Kecil</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="product.php?id=3003">Pohon Hias</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 footer-contact" style="margin-top: 50px; margin-left: 25px;">
          <h4>SUBSCRIBE</h4>
          <p>Subscribe to our newsletter, so that you can be the first to know about new offers and
            promotions.</p>
          <form action="" method="post">
            <input type="email" name="email"><input style="background-color: black; color: white;" type="submit"
              value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="bank" style="position: relative; left: 1550px;">
    <h6 style="position: relative; right: 1430px; top: 35px;">
      &copy; 2021 Rens Corporation
    </h6>
    <img src="./asset/icon/ceklis.jpeg" class="img-fluid col-lg-2 col-md-3" alt="..."
      style="height: 28px; width: 22px; margin-left: 20px;">
    <img src="./asset/icon/card.png" class="img-fluid col-lg-2 col-md-3" alt="..."
      style="height: 35px; width: 55px; margin-left: 15px;">
    <img src="./asset/icon/visa.jpeg" class="img-fluid col-lg-2 col-md-3" alt="..."
      style="height: 25px; width: 75px; margin-left: 15px;">
  </div>

  <br>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>