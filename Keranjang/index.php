<?php 
include "../config.php";

$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT FIRST_NAME FROM db_user"));
$cek_cart_id = mysqli_query($db, "SELECT * FROM cart WHERE status = 'berjalan'");
$row_cart = mysqli_fetch_assoc($cek_cart_id);
$id_cart = $row_cart['ID_CART'];
// $cek_cart_item = mysqli_query($db, "SELECT b.NAME, b.QUANTITY, b.PRICE, a.QUANTITY as 'BANYAK', a.ID_CART_ITEM FROM cart_item a JOIN product b ON a.ID_PRODUCT = b.ID_PRODUCT WHERE a.ID_CART = '$id_cart'");
$cek_cart_item = mysqli_query($db, "SELECT *, a.QUANTITY as 'BANYAK' FROM cart_item a JOIN product b ON a.ID_PRODUCT = b.ID_PRODUCT WHERE a.ID_CART = '$id_cart'");
$row_cart_item = mysqli_fetch_assoc($cek_cart_item);
$cek_quantity = mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(QUANTITY) 'BANYAK' FROM cart_item WHERE ID_CART = '$id_cart'"));
$banyak_uang = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(a.tmp_price) 'BANYAK' FROM cart_item a JOIN product b ON a.ID_PRODUCT = b.ID_PRODUCT WHERE a.ID_CART = '$id_cart'"));
$quantity = 1;
$ambil_quantity = mysqli_query($db, "SELECT * FROM cart_item WHERE a.ID_CART = '$id_cart'");

if (isset($_POST['tambah'])) {
    $id_tambah = $_GET['id_cart_item'];
    $query_tambah = mysqli_query($db, "SELECT * FROM cart_item WHERE ID_CART_ITEM = '$id_tambah'");
    $row_tambah = mysqli_fetch_assoc($query_tambah);
    $hitung_tambah = $row_tambah['QUANTITY'];
    $hitung_tambah++;
    mysqli_query($db, "UPDATE cart_item SET QUANTITY = '$hitung_tambah' WHERE ID_CART_ITEM = '$id_tambah'");
        
        $row_tambah_stok = mysqli_fetch_assoc(mysqli_query($db, "SELECT b.QUANTITY, b.ID_PRODUCT FROM cart_item a JOIN product b ON a.ID_PRODUCT = b.ID_PRODUCT WHERE ID_CART_ITEM = '$id_tambah'"));
        $id_barang_tambah = $row_tambah_stok['ID_PRODUCT'];
        $stok = $row_tambah_stok['QUANTITY'];

        $total_tambah = $stok - 1;
        mysqli_query($db, "UPDATE product SET QUANTITY = '$total_tambah' WHERE ID_PRODUCT = '$id_barang_tambah'");

            $hitung_uang_satu = mysqli_fetch_assoc(mysqli_query($db, "SELECT PRICE, QUANTITY FROM cart_item WHERE ID_CART_ITEM = '$id_tambah'"));
            $hitung_uang_dua = $hitung_uang_satu['PRICE'] * $row_tambah['QUANTITY'];
            // echo "TOTAL UANG = " . $hitung_uang_dua;
            mysqli_query($db, "UPDATE cart_item SET  tmp_price = '$hitung_uang_dua' WHERE ID_CART_ITEM = '$id_tambah'");
            // echo "<br> TOTAL BANYAK = " . $cek_quantity['BANYAK'];
            $total_banyak = $banyak_uang['BANYAK'] - ($banyak_uang['BANYAK'] - ($cek_quantity['BANYAK'] * 1000));
            // echo "<br> BANYAK SEMUA = " .$total_banyak;
                    mysqli_query($db, "UPDATE cart SET DELIVERY_CHARGE = '$total_banyak' WHERE ID_CART = '$id_cart'");

}else if(isset($_POST['kurang'])){
    $id_kurang = $_GET['id_cart_item'];
    $query_kurang = mysqli_query($db, "SELECT * FROM cart_item WHERE ID_CART_ITEM = '$id_kurang'");
    $row_kurang = mysqli_fetch_assoc($query_kurang);
    $hitung_kurang = $row_kurang['QUANTITY'];
    $hitung_kurang--;
    mysqli_query($db, "UPDATE cart_item SET QUANTITY = '$hitung_kurang' WHERE ID_CART_ITEM = '$id_kurang'");
        
        $row_kurang_stok = mysqli_fetch_assoc(mysqli_query($db, "SELECT b.QUANTITY, b.ID_PRODUCT, a.QUANTITY 'BANYAK' FROM cart_item a JOIN product b ON a.ID_PRODUCT = b.ID_PRODUCT WHERE ID_CART_ITEM = '$id_kurang'"));
        $id_barang_kurang = $row_kurang_stok['ID_PRODUCT'];
        $stok = $row_kurang_stok['QUANTITY'];
        $row_banyak = $row_kurang_stok['BANYAK'];
        // echo "QUANTITY = " .$row_kurang_stok['BANYAK'];
        $total_kurang = $stok + 1;
        mysqli_query($db, "UPDATE product SET QUANTITY = '$total_kurang' WHERE ID_PRODUCT = '$id_barang_kurang'");

            $hitung_uang_satu = mysqli_fetch_assoc(mysqli_query($db, "SELECT PRICE, QUANTITY FROM cart_item WHERE ID_CART_ITEM = '$id_kurang'"));
            $hitung_uang_dua = $hitung_uang_satu['PRICE'] / $row_kurang['QUANTITY'];
            // echo "TOTAL UANG = " . $hitung_uang_dua;
            mysqli_query($db, "UPDATE cart_item SET tmp_price = '$hitung_uang_dua' WHERE ID_CART_ITEM = '$id_kurang'");
            // echo "<br> TOTAL BANYAK = " . $cek_quantity['BANYAK'];
            $total_banyak = $banyak_uang['BANYAK'] - ($banyak_uang['BANYAK'] - ($cek_quantity['BANYAK'] * 1000));
            // echo "<br> BANYAK SEMUA = " .$total_banyak;
                    mysqli_query($db, "UPDATE cart SET DELIVERY_CHARGE = '$total_banyak' WHERE ID_CART = '$id_cart'");
                    if($row_kurang_stok['BANYAK'] < 1){
                        mysqli_query($db, "DELETE FROM cart_item WHERE ID_CART_ITEM = '$id_kurang'");
                    }

}else{
    global $row_banyak, $id_kurang;
    // echo "<br> TOTAL BANYAK = " . $cek_quantity['BANYAK'];
    $total_banyak = $banyak_uang['BANYAK'] - ($banyak_uang['BANYAK'] - ($cek_quantity['BANYAK'] * 1000));
    // echo "<br> BANYAK SEMUA = " .$total_banyak;
            mysqli_query($db, "UPDATE cart SET DELIVERY_CHARGE = '$total_banyak' WHERE ID_CART = '$id_cart'");
            if($row_banyak < 1){
                mysqli_query($db, "DELETE FROM cart_item WHERE ID_CART_ITEM = '$id_kurang'");
            }
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
            <img src="../logo.png" alt="ini gambar" class="align-self-center rounded-circle" width="100px"
                height="100px" style="margin: 0,1% 0; position:relative; left:200px;">
            <form class="d-flex" style="position:relative; right:80px">
                <input class="form-control me-2" type="Cari Disini" placeholder="Cari Disini" aria-label="Cari">
                <button class="btn btn-outline-success" type="submit" style="width: 200px;">Cari</button>
                <img src="./asset/icon/keranjang.jpeg" alt="" class="image"
                    style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"> Keranjang</a>
                <p style="margin-left: 30px;"> |</p>
                <img src="../logo.png" alt="" class="image"
                    style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"><?= $user['FIRST_NAME'] ?></a>
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
                    <li class="breadcrumb-item"><a href="../Homepage/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
        <br>
        <h4 style="margin-left:300px;">CART</h4>

        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Available</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col">Aksi</th>
                                    
                                    
                                    <th scope="col" class="text-right">Price</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = mysqli_query($db, "SELECT a.ID_CART_ITEM, b.NAME, b.QUANTITY, a.QUANTITY 'BANYAK', b.PRICE, b.gambar FROM cart_item a JOIN product b ON a.ID_PRODUCT = b.ID_PRODUCT WHERE ID_CART = '$id_cart'");
                                while ($row = mysqli_fetch_assoc($query)) :
                                ?>
                                <tr>
                                    <td><?= $row['NAME']; ?></td>
                                    <td><?= $row['QUANTITY']; ?></td>
                                    <td>
                                        <?= $row['BANYAK'] ?>
                                    </td>
                                    <form action="index.php?id_cart_item=<?= $row['ID_CART_ITEM'] ?>" method="post">
                                        <td>
                                            <a href="index.php?id_cart_item=<?= $row['ID_CART_ITEM'] ?>">
                                                <button type="submit" class="btn btn-primary" name="tambah">+</button>
                                            </a>
                                            <a href="index.php?id_cart_item=<?= $row['ID_CART_ITEM'] ?>">
                                                <button type="submit" class="btn btn-danger" name="kurang" style="margin-left: 10px;">-</button>
                                            </a>
                                        </td>
                                    </form>
                                    <td class="text-right">Rp.<?= $row['PRICE'] ?></td>
                                    <td></td>
                                    <!-- </tr> -->
                                    <?php 
                                    endwhile;
                                    ?>
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>Rp.<?= $banyak_uang['BANYAK'] ?></strong></td>
                                </tr>
                            </tbody>
                            </table>
                                <form action="../checkout.php?id_cart=<?= $id_cart ?>" method="post">
                                    <div class="col-sm-12 col-m d-6 text-right">
                                        <button class="btn btn-lg btn-block btn-success text-uppercase" name="submit" type="submit" name="lanjutkan">Lanjutkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="footer mt-5 pb-5 bg2">
        <div class="container-fluid">
            <div class="row ms-5 me-5">
                <div class="col-lg-2 col-md-6 footer-contact" style="margin-top: 50px; margin-left: 25px;">
                    <img src="./asset/icon/logo.jpeg" class="align-self-center rounded-circle" alt="..." style="height: 100px; width: 100px; margin-left: 85px;">
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
            © 2021. Rens Corporations.
        </h6>
        <img src="./asset/icon/ceklis.jpeg" class="img-fluid col-lg-2 col-md-3" alt="..."
            style="height: 28px; width: 22px; margin-left: 20px;">
        <img src="./asset/icon/card.png" class="img-fluid col-lg-2 col-md-3" alt="..."
            style="height: 35px; width: 55px; margin-left: 15px;">
        <img src="./asset/icon/visa.jpeg" class="img-fluid col-lg-2 col-md-3" alt="..."
            style="height: 25px; width: 75px; margin-left: 15px;">
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>=
</body>

</html>