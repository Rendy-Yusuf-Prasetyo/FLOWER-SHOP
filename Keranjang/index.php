<?php 
include "config.php";

if (isset($_POST['beli'])) {
    $id = $_GET['id'];
    
    // $cek_id_user = mysqli_query($db, "SELECT * FROM db_user");
    // $row_id_user = mysqli_fetch_assoc($cek_id_user);

    $cek_id_produk = mysqli_query($db, "SELECT * FROM PRODUCT WHERE ID_PRODUCT = $id");
    $row_id_produk = mysqli_fetch_assoc($cek_id_produk);
    $price_cart = $row_id_produk['PRICE'];

    $cek_id_cart = mysqli_query($db, "SELECT * FROM CART");
    while($row_cek_id_cart = mysqli_fetch_assoc($cek_id_cart)){
        if ($id !== $row_cek_id_cart['ID_USER']) {
            $id_user = $row_id_user['ID_USER'];
            mysqli_query($db, "INSERT INTO CART VALUES('','$id_user','','$price_cart','400','')");
            break;
        }
        // KALO GAADA ID NYA BRARTI NAMBAH, KALO NULL brarti NAMBAH, KALO UDA ADA UPDATE QUANTITY
    }
    

    $query_tambah_keranjang = mysqli_query($db, "INSERT INTO CART_ITEM VALUES('','','','','','')");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">

    <title>Keranjang</title>
</head>

<body style="overflow-x: hidden;">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid bg1">
            <img src="./asset/icon/logo.jpeg" alt="" class="align-self-center rounded-circle" width="100px"
                height="100px" style="margin: 0,1% 0; position:relative; left:200px;">
            <form class="d-flex" style="position:relative; right:80px">
                <input class="form-control me-2" type="Cari Disini" placeholder="Cari Disini" aria-label="Cari">
                <button class="btn btn-outline-success" type="submit" style="width: 200px;">Cari</button>
                <img src="./asset/icon/keranjang.jpeg" alt="" class="image"
                    style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"> Keranjang</a>
                <p style="margin-left: 30px;"> |</p>
                <img src="./asset/icon/user.jpeg" alt="" class="image"
                    style="margin-left: 20px; width:25px; height:25px;">
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
                    <a class="nav-link active" aria-current="page" href="../Homepage/index.html">HOME</a>
                    <a class="nav-link active" aria-current="page" href="#">BUNGA POT BESAR</a>
                    <a class="nav-link active" aria-current="page" href="../PRODUCT/index.html">BUNGA POT KECIL</a>
                    <a class="nav-link active" aria-current="page" href="#">POHON HIAS</a>
                    <a class="nav-link active" aria-current="page" href="#">BUNGA HIAS TANGKAI</a>
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
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
        <br>
        <h4 style="margin-left:300px;">CART</h4>

        <br>

        <div class="container"
            style="max-width: 800px; max-height: 1250px; margin-left: 300px; background-color: white;">
            <br>
            <div class="contariner" style="width: 10px;">
                <img src="./asset/icon/logo.jpeg" style="width:150px; margin-left: 20px;">
                <h5 style="margin-left: 180px; margin-top: -130px; width: 200px;">Bunga Sepatu</h5>
            </div>
            <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through; margin-left: 175px;">Rp.50.000.00</h6>
            </div>
            <div class="p-2 bd-highlight" style="margin-top: -46px;"><span
                    style="font-size: 15px; text-decoration: none !important; margin-left: 270px;"> Rp. 35.000,00</span>
                <button style="width: 150px; height: 40px; margin-left: 150px; margin-top: -350px;">Remove</button>
            </div>
            <div class="d-grid gap-2 d-md-block" style="margin-left: 180px;">
                <button class="btn btn-secondary" type="button" style="width: 40px;">-</button>
                <div class="border border-dark"
                    style="width: 40px; height: 38px; margin-left: 45px; margin-top: -38px;">
                    <span class="badge bg-light text-dark" style="width: 35px; height: 35px; font-size: 20px">1</span>
                </div>
                <button class="btn btn-secondary" type="button"
                    style="width: 40px; margin-left: 91px; margin-top: -67px;">+</button>
            </div>

            <br>

            <div class="contariner" style="width: 10px;">
                <img src="./asset/icon/logo.jpeg" style="width:150px; margin-left: 20px;">
                <h5 style="margin-left: 180px; margin-top: -130px; width: 200px;">Bunga Sepatu</h5>
            </div>
            <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through; margin-left: 175px;">Rp.50.000.00</h6>
            </div>
            <div class="p-2 bd-highlight" style="margin-top: -46px;"><span
                    style="font-size: 15px; text-decoration: none !important; margin-left: 270px;"> Rp. 35.000,00</span>
                <button style="width: 150px; height: 40px; margin-left: 150px; margin-top: -350px;">Remove</button>
            </div>
            <div class="d-grid gap-2 d-md-block" style="margin-left: 180px;">
                <button class="btn btn-secondary" type="button" style="width: 40px;">-</button>
                <div class="border border-dark"
                    style="width: 40px; height: 38px; margin-left: 45px; margin-top: -38px;">
                    <span class="badge bg-light text-dark" style="width: 35px; height: 35px; font-size: 20px">1</span>
                </div>
                <button class="btn btn-secondary" type="button"
                    style="width: 40px; margin-left: 91px; margin-top: -67px;">+</button>
            </div>

            <br>

            <div class="contariner" style="width: 10px;">
                <img src="./asset/icon/logo.jpeg" style="width:150px; margin-left: 20px;">
                <h5 style="margin-left: 180px; margin-top: -130px; width: 200px;">Bunga Sepatu</h5>
            </div>
            <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through; margin-left: 175px;">Rp.50.000.00</h6>
            </div>
            <div class="p-2 bd-highlight" style="margin-top: -46px;"><span
                    style="font-size: 15px; text-decoration: none !important; margin-left: 270px;"> Rp. 35.000,00</span>
                <button style="width: 150px; height: 40px; margin-left: 150px; margin-top: -350px;">Remove</button>
            </div>
            <div class="d-grid gap-2 d-md-block" style="margin-left: 180px;">
                <button class="btn btn-secondary" type="button" style="width: 40px;">-</button>
                <div class="border border-dark"
                    style="width: 40px; height: 38px; margin-left: 45px; margin-top: -38px;">
                    <span class="badge bg-light text-dark" style="width: 35px; height: 35px; font-size: 20px">1</span>
                </div>
                <button class="btn btn-secondary" type="button"
                    style="width: 40px; margin-left: 91px; margin-top: -67px;">+</button>
            </div>

            <br>

            <div class="contariner" style="width: 10px;">
                <img src="./asset/icon/logo.jpeg" style="width:150px; margin-left: 20px;">
                <h5 style="margin-left: 180px; margin-top: -130px; width: 200px;">Bunga Sepatu</h5>
            </div>
            <div class="p-2 bd-highlight">
                <h6 style="font-size: 15px; text-decoration:line-through; margin-left: 175px;">Rp.50.000.00</h6>
            </div>
            <div class="p-2 bd-highlight" style="margin-top: -46px;"><span
                    style="font-size: 15px; text-decoration: none !important; margin-left: 270px;"> Rp. 35.000,00</span>
                <button style="width: 150px; height: 40px; margin-left: 150px; margin-top: -350px;">Remove</button>
            </div>
            <div class="d-grid gap-2 d-md-block" style="margin-left: 180px;">
                <button class="btn btn-secondary" type="button" style="width: 40px;">-</button>
                <div class="border border-dark"
                    style="width: 40px; height: 38px; margin-left: 45px; margin-top: -38px;">
                    <span class="badge bg-light text-dark" style="width: 35px; height: 35px; font-size: 20px">1</span>
                </div>
                <button class="btn btn-secondary" type="button"
                    style="width: 40px; margin-left: 91px; margin-top: -67px;">+</button>
            </div>

            <br>
        </div>

        <div class="container"
            style="max-width: 400px; max-height: 1250px; margin-left: 1140px; margin-top: -755px; background-color: white;">
            <br>
            <a style="font-size: 20px; margin-left: 10px;">
                Add Promo Code
            </a>
            <div style="width: 350px; margin-bottom: 5px; margin-left: 15px;">
                <br>
                <input type="text" class="form-control">
            </div>

            <br>

            <button
                style="width: 100px; height: 40px; margin-left: 20px; background-color: black; color : white;">ADD</button>

            <div style="margin-top: 20px;">
                <a style="margin-left: 20px;">Sunmmary</a>
            </div>

            <div style="margin-top: 25px;">
                <a style="font-size: 13px; margin-left: 20px;">Price (4 items)</a>
                <span style="font-size: 15px; text-decoration: none !important; margin-left: 150px; font-size: 13px;">
                    Rp. 35.000,00</span>
            </div>

            <div style="margin-top: 25px;">
                <a style="font-size: 13px; margin-left: 20px;">Delivery Charge</a>
                <span style="font-size: 15px; text-decoration: none !important; margin-left: 150px; font-size: 13px;">
                    Rp.7.500,00</span>
            </div>

            <div style="margin-top: 25px;">
                <a style="font-size: 13px; margin-left: 20px;">Total Price</a>
                <span style="font-size: 15px; text-decoration: none !important; margin-left: 175px; font-size: 13px;">
                    Rp. 42.500,00</span>
            </div>

            <div class="border border-dark" style="width: 120px; height: 40px; margin-left: 40px; margin-top: 50px;">
                <button class="btn btn-light" type="button" style="width: 110px; margin-left: 5px;">Continue</button>
            </div>

            <div>
                <button class="btn btn-dark" type="button"
                    style="width: 120px; height: 40px; margin-left: 200px; margin-top: -68px;">Place Order</button>
            </div>


        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br>



        <div class="footer mt-5 pb-5 bg2">
            <div class="container-fluid">
                <div class="row ms-5 me-5">
                    <div class="col-lg-2 col-md-6 footer-contact" style="margin-top: 50px; margin-left: 25px;">
                        <img src="./asset/icon/logo.jpeg" class="align-self-center rounded-circle" alt="..."
                            style="height: 100px; width: 100px; margin-left: 85px;">
                        <div class="icon-sosmed d-flex flex-row justify-content-center">
                            <a href="#" style="margin: 0 1%">
                                <img src="./asset/icon/facebook.png" alt="" width="40px" height="40px"
                                    style="margin-top: 10px;">
                            </a>
                            <a href="#" style="margin: 0 1%">
                                <img src="./asset/icon/twitter.png" alt="" width="35px" height="35px"
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