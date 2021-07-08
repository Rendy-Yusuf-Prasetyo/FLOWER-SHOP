<?php 
include "../bima/config.php";


    if (isset($_POST['simpan'])) {
        $id = $_GET['id_category'];
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $harga = $_POST['price'];
        $diskon = $_POST['discount'];
        $quantity = $_POST['quantity'];
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
        move_uploaded_file($file_temp, 'gambar/' . $nama_foto);
        $cek_nama_barang = mysqli_query($db, "SELECT * FROM product");
                
        while($row_nama_barang = mysqli_fetch_assoc($cek_nama_barang)){
            $nama_barang = $row_nama_barang['NAME'];
            if ($nama_barang == null) {
                mysqli_query($db, "INSERT INTO product VALUES(4001, '$nama ', '$brand', '$harga', '$diskon', '$quantity', '$nama_foto')");
                mysqli_query($db, "INSERT INTO category_product VALUES('$id',4001)");
                echo "
                    <script>
                        alert('Data sukses ditambahkan');
                    </script>
                ";
                break;
            }else if($nama_barang != $nama){
                mysqli_query($db, "INSERT INTO product VALUES('', '$nama ', '$brand', '$harga', '$diskon', '$quantity', '$nama_foto')");
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
        mysqli_query($db, "INSERT INTO category_product VALUES('', '$id','$id_barang')");
        // $row_id_barang = mysqli_fetch_assoc($cek_id_barang);

        // mysqli_query($db, "INSERT INTO BARANG VALUES('', '$nama', '$harga', '$stok', '$deksripsi')");
        // echo "
        //     <script>
        //         alert('Data sukses ditambahkan');
        //     </script>
        // ";
        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include "bootstrap.php";
    ?>
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" required>
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" required>
                </div>
                <div class="mb-3">
                    <label for="discount">Discount</label>
                    <input type="text" class="form-control" name="discount" id="discount" required>
                </div>
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" required>
                </div>
                <div class="mb-3">
                    <!-- <label class="input-group-text" for="inputGroupFile01">Upload Gambar</label> -->
                    <label for="foto">Input Foto</label>
                    <input type="file" class="form-control" name="file" id="foto">
                </div>
                <div class="mb-3">
                    <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
                </div>
            </form>
        </div>
    </div>
  </body>
</body>
</html>