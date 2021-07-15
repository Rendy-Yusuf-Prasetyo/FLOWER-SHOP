<?php 
include "config.php";

    if(isset($_POST['simpan'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $email = strtolower($_POST['email']);
        $nomor = $_POST['nomor'];
        $kecamatan = $_POST['kecamatan'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        // $gambar = $_POST['file'];

        $query = mysqli_query($db, "SELECT * FROM db_user");
        while($row = mysqli_fetch_assoc($query)){
            $row_email = $row['EMAIL'];
            if($row_email == null){
                break;
            }else if($row_email == $email){
                echo "
                    <script>
                        alert('Email Sudah Pernah digunakan');
                    </script>
                ";
            }
        }


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
        move_uploaded_file($file_temp, 'foto/profil/' . $nama_foto);
               


        echo "<br> nama depan = " . $nama_depan;
        echo "<br> nama belakang = " . $nama_belakang;
        echo "<br> email = " . $email;
        echo "<br> number = " . $nomor;
        echo "<br> kecamatan = " . $kecamatan;
        echo "<br> provinsi = " . $provinsi;
        echo "<br> kota = " . $kota;
        echo "<br> password = " . $password;
        echo "<br> repassword = " . $repassword;
        var_dump($gambar);

        $query = mysqli_query($db, "SELECT * FROM db_user");
        while($row = mysqli_fetch_assoc($query)){
            $row_email = $row['EMAIL'];
            echo "EMAILROW" . $row_email;
        }

        if ($password != $repassword) {
            
            echo "
            <script>
                alert('Password tidak cocok');
            </script>
            ";
       }else{
        if($row_email == null){
            echo "
            <script>
                alert('Sukses Mendaftar dengan null');
            </script>
            ";
            $query_1 = mysqli_query($db, "INSERT INTO db_user VALUES('','$nama_depan','$nama_belakang','$email','$password','$provinsi','$kota','$kecamatan',''$nama_foto,'$nomor','')");
            if ($query_1) {
                echo "
                <script>
                    alert('SUKSES');
                </script>
                "; 
            }
            if($query){
                echo "                                    
                    <script>
                    alert('JELEK');
                    </script>
                ";
            }
        }else if($row_email == $email){
            echo "
            <script>
                alert('Email Sudah Pernah digunakan');
            </script>
            ";

        }elseif($row_email != $email){
            echo "
            <script>
                alert('Sukses Mendaftar');
            </script>`
            ";
            $query_2 = mysqli_query($db, "INSERT INTO db_user VALUES('','$nama_depan','$nama_belakang','$email','$password','$provinsi','$kota','$kecamatan','$nama_foto','$nomor','')");
                                            // INSERT INTO `db_user` (`ID_USER`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `PROVINSI`, `CITY`, `DISTRICTS`, `PHOTO`, `PHONE`, `FAVORITE`) VALUES (NULL, 'Rendy', 'Yusuf', 'rendi@yusuf.com', 'aaaa', 'Surabaya Timur', 'Surabaya', 'tambak', '', '091241525', NULL)
            if ($query_2) {
                echo "
                <script>
                    alert('SUKSES');
                </script>
                ";
            }
        }
        // mysqli_query($db, "INSERT INTO db_user VALUES('','$nama_depan','$nama_belakang','$email','$password','$provinsi','$kota','$kecamatan','$nama_foto','$nomor','')");
       }
}


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

    <title>Registration</title>
</head>

<body style="overflow-x: hidden;">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav justify-content-center pb-3 pt-3">
                <img src="logo.png" alt="" width="400" height="400">
            </ul>
        </div>
    </div>

    <div class="container-fluid" style="position:relative; right: 0px;">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <h3 class="mt-5 pb-5" style="position: relative; left: 210px;">
                    REGISTRATION
                </h3>          
                <h6 style="margin-left: 400px;">
                    Personal Data
                </h6>
                <div class="col-lg-6">
                    <h6 style="margin-left: 450px;">
                        Nama Depan
                    </h6>
                    <div class="input-group " style="margin-bottom: 3%; width: 310px; margin-left: 450px;">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input required type="text" class="form-control" aria-describedby="basic-addon1"
                            name="nama_depan">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h6 style="margin-left: 50px;">
                        Nama Belakang
                    </h6>
                    <div class="input-group " style="width: 310px; left: 50px;">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input required type="text" class="form-control" aria-describedby="basic-addon1"
                            name="nama_belakang">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h6 style="margin-left: 450px;">
                        Email
                    </h6>
                    <div class="input-group " style="margin-bottom: 3%; width: 310px; margin-left: 450px;">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input required type="text" class="form-control" aria-describedby="basic-addon1"
                            name="email">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h6 style="margin-left: 50px;">
                        Nomor Telepon
                    </h6>
                    <div class="input-group " style="width: 310px; left: 50px;">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input required type="text" class="form-control" aria-describedby="basic-addon1"
                            name="nomor">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h6 style="margin-left: 450px;">
                        Masukan Password
                    </h6>
                    <div class="input-group " style="margin-bottom: 3%; width: 310px; margin-left: 450px;">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input required type="password" class="form-control" aria-describedby="basic-addon1"
                            name="password">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h6 style="margin-left: 50px;">
                        Masukan Password Lagi
                    </h6>
                    <div class="input-group " style="width: 310px; left: 50px;">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input required type="password" class="form-control" aria-describedby="basic-addon1"
                            name="repassword">
                    </div>
                </div>

                <h6 style="margin-left: 400px;">
                    Address
                </h6>

                <div class="col-lg-6">
                        <h6 style="margin-left: 450px;">
                            Kecamatan
                        </h6>
                        <div class="input-group " style="margin-bottom: 3%; width: 310px; margin-left: 450px;">
                            <span class="input-group-text" id="basic-addon1"></span>
                            <input required type="text" class="form-control" aria-describedby="basic-addon1"
                                name="kecamatan">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h6 style="margin-left: 50px;">
                            kota
                        </h6>
                        <div class="input-group " style="width: 310px; left: 50px;">
                            <span class="input-group-text" id="basic-addon1"></span>
                            <input required type="text" class="form-control" aria-describedby="basic-addon1"
                                name="kota">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h6 style="margin-left: 450px;">
                            Provinsi
                        </h6>
                        <div class="input-group " style="margin-bottom: 3%; width: 310px; margin-left: 450px;">
                            <span class="input-group-text" id="basic-addon1"></span>
                            <input required type="text" class="form-control" aria-describedby="basic-addon1"
                                name="provinsi">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h6 style="margin-left: 50px;">
                            Foto Profil
                        </h6>
                        <div class="input-group " style="width: 310px; left: 50px;">
                            <span class="input-group-text" id="basic-addon1"></span>
                            <input type="file" class="form-control" aria-describedby="basic-addon1"
                                name="file">
                        </div>
                    </div>
                    <!-- COBA -->

                <div class="mt-3">
                    <button type="submit" name="simpan" class="btn btn-primary" style="float: right; margin-right: 570px; padding: 10px 30px 10px 30px ;">simpan</button>
                    <h5 style="margin-left: 450px;">Sudah Punya Akun? </h5><a href="login.php" style="float: left; margin-left: 450px; color: gray;">Klik Disini!!</a>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid" style="background-color: azure;">
        <div class="footer-satu"  style="position: relative; float: left; top: 35px; margin-left: 100px; padding: 50px 0px;">
            <h6>
                © 2021. Rens Corporations.
            </h6>
        </div>
        <div class="footer-dua" style="position: relative; float: right; top: 35px; margin-right: 100px;padding: 50px 0px;">
            <img src="./asset/icon/ceklis.jpeg" class="img-fluid col-lg-2 col-md-3" alt="..."
                style="height: 28px; width: 22px; margin-left: 20px;">
            <img src="./asset/icon/card.png" class="img-fluid col-lg-2 col-md-3" alt="..."
                style="height: 35px; width: 55px; margin-left: 15px;">
            <img src="./asset/icon/visa.jpeg" class="img-fluid col-lg-2 col-md-3" alt="..."
                style="height: 25px; width: 75px; margin-left: 15px;">
        </div>
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