<?php 
include "../config.php";

$id = $_GET['id'];

$query_name = mysqli_query($db, "SELECT * FROM CATEGORY WHERE ID_CATEGORY = '$id'");
$row_nama = mysqli_fetch_assoc($query_name);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">

    <title>Product</title>
</head>

<body style="overflow-x: hidden;">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid bg1">
            <img src="./asset/icon/logo.jpeg" alt="" class="align-self-center rounded-circle" width="100px"
                height="100px" style="margin: 0,1% 0; position:relative; left:200px;">
            <form class="d-flex" style="position:relative; right:80px">
                <input class="form-control me-2" type="Cari Disini" placeholder="Cari Disini" aria-label="Cari">
                <button class="btn btn-outline-success" type="submit" style="width: 200px;">Cari</button>
                <img src="./asset/icon/keranjang.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"> Keranjang</a>
                <p style="margin-left: 30px;"> |</p>
                <img src="./asset/icon/user.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"> User</a>
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
                <div class="navbar-nav mx-auto custom2">
                <a class="nav-link active" aria-current="page" href="../Homepage/index.php">HOME</a>
                <a class="nav-link active" aria-current="page" href="../PRODUCT/index.php?id=3001">BUNGA POT BESAR</a>
                <a class="nav-link active" aria-current="page" href="../PRODUCT/index.php?id=3002">BUNGA POT KECIL</a>
                <a class="nav-link active" aria-current="page" href="../PRODUCT/index.php?id=3003">POHON HIAS</a>
                <a class="nav-link active" aria-current="page" href="#">PROMO</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container-fluid" style="position:relative; right: 0px; background-color: #F0F0F0;">
        <br>
        <div style="position:relative; left:300px; top:2px;">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../Homepage/index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $row_nama['NAME'] ?></li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid">
            <h3 class="footer mt-5 pb-5" style="position: relative; left: 300px;">
            <?= $row_nama['NAME'] ?>
            <a href="../tambah-barang.php?id_category=<?= $id ?>">
                <button type="button" class="btn btn-primary ms-5">Tambah</button>
            </a>
            </h3>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php 
            $query = mysqli_query($db, "SELECT * FROM product a JOIN category_product b ON a.id_product = b.id_product WHERE id_category = $id");
                while($row = mysqli_fetch_assoc($query)) :
                    $diskon = $row['PRICE'] - $row['DISCOUNT'];
                    $persen = $row['PRICE'] / $row['DISCOUNT']/100;
            ?>
            <div class="col-lg-2 col-md-6">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin-left: 300px;">
                        <img src="./asset/icon/logo.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['NAME'] ?></h5>
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    <h6 style="font-size: 15px; text-decoration:line-through">Rp.<?= $row['PRICE'] ?></h6>
                                </div>
                                <div class="p-2 bd-highlight" style="margin-top: -4px;"><span
                                        style="font-size: 15px; text-decoration: none !important;">Rp.<?= $diskon ?></span>
                                </div>
                            </div>
                                <form action="../tambah-cart.php?id=<?= $row['ID_PRODUCT'] ?>" method="post">
                                    <div class="button">
                                        <a href="../tambah-cart.php?id=<?= $row['ID_PRODUCT'] ?>">
                                            <button name="beli_barang" type="submit" class="btn btn-primary mr-auto">Beli</button>
                                        </a>
                                    </div>
                                </form>
                            <div class="badge bg-primary text-wrap ml-auto">
                                <?= $persen ?>% Off
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            endwhile;
            ?>
        </div>

        <br>

        <br><br><br>

        <nav aria-label="Page navigation example">
            <ul class="pagination" style="margin-left: 300px;">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>

        <br>

    

    <div class="footer mt-5 pb-5 bg2">
        <div class="container-fluid">
            <div class="row ms-5 me-5">
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
                        <input type="email" name="email"><input style="background-color: black; color: white;"
                            type="submit" value="Subscribe">
                    </form>
                </div>
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