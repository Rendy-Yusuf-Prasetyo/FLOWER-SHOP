<?php 
include "../config.php";


if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $query = mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$email'");
  $row = mysqli_fetch_assoc($query);
  // var_dump($email);

  $query_user = mysqli_query($db, "SELECT * FROM db_user");
  // $row = mysqli_fetch_assoc($query_user);
  while ($row_user = mysqli_fetch_assoc($query_user)) {
    if($email != $row_user['EMAIL']) {
      echo "
        <script>
            alert('Email salah');
        </script>
      ";
      header("Location: ../Login/login.php");
    }

    if($username == $row_user['FIRST_NAME'] && $password == $row_user['PASSWORD']){
      // header("Location: ../Homepage/index.php");
    }else{
      echo "
        <script>
            alert('Username/Password salah');
        </script>
      ";
      header("Location: ../Login/login.php");
    }
  }
}
// $query = mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$email'");
$query = mysqli_query($db, "SELECT * FROM db_user");
$row = mysqli_fetch_assoc($query);


  
  // }else{
  //   // header("Location: ../Login/login.php");
  // }


// }

// if(isset($_POST['submit'])){
//   $username = $_POST['username'];
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   $query = mysqli_query($db, "SELECT * FROM db_user where FIRST_NAME = $username");
//   $row = mysqli_fetch_assoc($query);

//   var_dump($row['ID_USER']);
//   echo $row['ID_USER'];
// }
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
      <img src="./asset/icon/logo.jpeg" alt="" class="align-self-center rounded-circle" width="100px" height="100px"
        style="margin: 0,1% 0; position:relative; left:200px;">
      <form class="d-flex" style="position:relative; right:80px">
        <input class="form-control me-2" type="Cari Disini" placeholder="Cari Disini" aria-label="Cari">
        <button class="btn btn-outline-success" type="submit" style="width: 200px;">Cari</button>
        <img src="./asset/icon/keranjang.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
        <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"> Keranjang</a>
        <p style="margin-left: 30px;"> |</p>
        <img src="./asset/icon/user.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
        <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"> <?= $row['FIRST_NAME'] ?></a>
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
          <a class="nav-link active" aria-current="page" href="../Homepage/index.php">HOME</a>
          <a class="nav-link active" aria-current="page" href="../PRODUCT/index.php?id=3001">BUNGA POT BESAR</a>
          <a class="nav-link active" aria-current="page" href="../PRODUCT/index.php?id=3002">BUNGA POT KECIL</a>
          <a class="nav-link active" aria-current="page" href="../PRODUCT/index.php?id=3003">POHON HIAS</a>
          <a class="nav-link active" aria-current="page" href="#">PROMO</a>
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

    <h3>Produk Lain <a href="" style="font-size: 20px"> Lihat Semua</a></h3>
    <br>

    <div class="row mt-3">
      <div class="col-md-5 custom1">
        <img src="./asset/icon/box1.jpg" alt="" class="img-fluid" style="height: 420px; width: 500px;">
        <button class="btn btn-light">
          SHOP NOW
        </button>
        <!-- <button type="button" class="btn btn-primary">SHOP NOW</button> -->
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="./asset/icon/logo.jpeg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Bunga Sepeda</h5>

            <div class="d-flex flex-row bd-highlight mb-3">
              <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through">Rp.50.000.00</h6>
              </div>
              <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                  style="font-size: 15px; text-decoration: none !important;"> Rp. 35.000,00</span></div>
            </div>

            <div class="badge bg-primary text-wrap ml-auto">
              30% Off
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="./asset/icon/logo.jpeg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Bunga Sepeda</h5>

            <div class="d-flex flex-row bd-highlight mb-3">
              <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through">Rp.50.000.00</h6>
              </div>
              <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                  style="font-size: 15px; text-decoration: none !important;"> Rp. 35.000,00</span></div>
            </div>

            <div class="badge bg-primary text-wrap ml-auto">
              30% Off
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="./asset/icon/logo.jpeg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Bunga Sepeda</h5>
            <div class="d-flex flex-row bd-highlight mb-3">
              <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through">Rp.50.000.00</h6>
              </div>
              <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                  style="font-size: 15px; text-decoration: none !important;"> Rp. 35.000,00</span></div>
            </div>
            <div class="badge bg-primary text-wrap ml-auto">
              30% Off
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="./asset/icon/logo.jpeg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Bunga Sepeda</h5>
            <div class="d-flex flex-row bd-highlight mb-3">
              <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through">Rp.50.000.00</h6>
              </div>
              <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                  style="font-size: 15px; text-decoration: none !important;"> Rp. 35.000,00</span></div>
            </div>
            <div class="badge bg-primary text-wrap ml-auto">
              30% Off
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 custom1">
        <img src="./asset/icon/box1.jpg" alt="" class="img-fluid" style="height: 420px; width: 500px;">
        <button class="btn btn-light">
          SHOP NOW
        </button>
      </div>
      <div class="row">
        <img src="./asset/icon/panjang1.jpg" class="img-fluid mt-3" alt="..." style="height: 177px; width: 1185px;">
      </div>
      <h3><br>TOP SELLERS <a href="" style="font-size: 20px"> SEE ALL</a></h3>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <?php 
        $query_top_seller = mysqli_query($db, "SELECT * FROM PRODUCT WHERE QUANTITY < 100001 ORDER BY QUANTITY DESC ");
        while($row_query_top_Seller = mysqli_fetch_assoc($query_top_seller)) :
              $diskon = $row_query_top_Seller['PRICE'] - $row_query_top_Seller['DISCOUNT'];
              $persen = $row_query_top_Seller['PRICE'] / $row_query_top_Seller['DISCOUNT']/100;
      ?>
      <div class="col-md-3">
        <div class="card">
          <img src="./asset/icon/logo.jpeg" class="card-img-top" alt="">
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
              <?= $persen ?>% Off
            </div>
          </div>
        </div>
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
            <li><i class="bx bx-chevron-right"></i> <a href="#">Bunga Pot Besar</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Bunga Pot Kecil</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Bunga Gantung</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Pohon Hias</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Bunga Hias Tangkai</a></li>
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
      © 2021. All Rights Reserved.
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