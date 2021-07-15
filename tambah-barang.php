<?php 
include "config.php";

$query_user = mysqli_query($db, "SELECT FIRST_NAME FROM db_user");
        $row = mysqli_fetch_assoc($query_user);
        
    if (isset($_POST['simpan'])) {
        $id = $_GET['id_category'];
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $harga = $_POST['price'];
        $diskon = $_POST['discount'];
        $quantity = $_POST['quantity'];
        $deksripsi = $_POST['deskripsi'];
        // $foto = $_POST['file'];

        // $targer_dir = "gambar/";
        // $name_photo = $_FILES['file']['name'];
        // $target_file = $targer_dir . basename($name_photo);
        // $uploadOK = 1;
        // $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // CEK GAMBARNYA BENERAN APA GA
        
            
        $ekstensi_diperboleh = array('png', 'jpg');
        $nama_foto = basename($_FILES['file']['name']);
        $x = explode('.', $nama_foto);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['file']['size'];
        $file_temp = $_FILES['file']['tmp_name'];

        if(in_array($ekstensi, $ekstensi_diperboleh) === true){
            if($ukuran > 10440700){
            
                echo "
                    <script>
                        alert('Ukuran File Terlalu Besar');
                    </script>
                ";
            }
        }else{
            echo "
                <script>
                    alert('Eksetensi Yang diperbolehkan Hanya jpg dan png');
                </script>
            ";
        }
        move_uploaded_file($file_temp, 'foto/' . $nama_foto);
        $cek_nama_barang = mysqli_query($db, "SELECT * FROM product");
                
        while($row_nama_barang = mysqli_fetch_assoc($cek_nama_barang)){
            $nama_barang = $row_nama_barang['NAME'];
            if ($nama_barang == null) {
                mysqli_query($db, "INSERT INTO product VALUES(4001, '$nama ', '$brand', '$harga', '$diskon', '$quantity', '$nama_foto', '', '$deksripsi')");
                mysqli_query($db, "INSERT INTO category_product VALUES('$id',4001)");
                echo "
                    <script>
                        alert('Data sukses ditambahkan');
                    </script>
                ";
                break;
            }else if($nama_barang != $nama){
                mysqli_query($db, "INSERT INTO product VALUES('', '$nama ', '$brand', '$harga', '$diskon', '$quantity', '$nama_foto', '', '$deksripsi')");
                echo "
                    <script>
                        alert('Data sukses ditambahkan');
                    </script>
                ";
                break;
            }else if($nama_barang == $nama){
                echo "
                    <script>
                        alert('Data Gagal ditambahkan');
                    </script>
                ";
            // break;
            }
        }
        $query_update_barang_baru = mysqli_query($db, "SELECT * FROM product ORDER BY ID_PRODUCT DESC LIMIT 1");
        $row_query_update_barang_baru = mysqli_fetch_assoc($query_update_barang_baru);
        $id_barang = $row_query_update_barang_baru['ID_PRODUCT'];
        $query =  mysqli_query($db, "INSERT INTO category_product VALUES('', '$id','$id_barang')");
        header("Location: homepage.php");
        // $row_id_barang = mysqli_fetch_assoc($cek_id_barang);

        // mysqli_query($db, "INSERT INTO BARANG VALUES('', '$nama', '$harga', '$stok', '$deksripsi')");
        // echo "
        //     <script>
        //         alert('Data sukses ditambahkan');
        //     </script>
        // ";
        if ($query) {
            
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        // include "bootstrap.php";
    ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/text.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid bg1">
      <img src="logo.png" alt="" class="align-self-center rounded-circle" width="100px" height="100px"
        style="margin: 0,1% 0; position:relative; left:200px;">
      <form class="d-flex" style="position:relative; right:80px">
        
        <img src="asset/icon/keranjang.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
        <i class="bx bx-chevron-right"></i> <a href="checkout.php" style="margin-left: 10px;"> Keranjang</a>
        <p style="margin-left: 30px;"> |</p>
        <img src="asset/icon/user.png" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
        <i class="bx bx-chevron-right"></i> <a href="#" style="margin-left: 10px;"><?= $row['FIRST_NAME'] ?></a>
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
          <a class="nav-link active" aria-current="page" href="../UAS/Homepage/index.php">HOME</a>
          <a class="nav-link active" aria-current="page" href="../UAS/PRODUCT/index.php?id=3001">BUNGA POT BESAR</a>
          <a class="nav-link active" aria-current="page" href="../UAS/PRODUCT/index.php?id=3002">BUNGA POT KECIL</a>
          <a class="nav-link active" aria-current="page" href="../UASPRODUCT/index.php?id=3003">POHON HIAS</a>
        </div>
      </div>
    </div>
  </nav>
<div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" required>
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="discount">Discount</label>
                    <input type="text" class="form-control" name="discount" required>
                </div>
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" required>
                </div>
                <div class="mb-3">
                    <!-- <label class="input-group-text" for="inputGroupFile01">Upload Gambar</label> -->
                    <label for="foto">Input Foto</label>
                    <input type="file" class="form-control" name="file" id="foto">
                </div>
                <div class="mb-3">
                    <label for="quantity">Deskripsi Produk</label>
                    <input type="text" class="form-control" name="deskripsi" style="padding-bottom: 80px;" required>
                </div>
                <div class="mb-3">
                    <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
</body>
</html>