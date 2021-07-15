<?php 
include "config.php";

session_start();

if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

$login = $_SESSION['login'];
echo "LIHAT SESSION = " .$login;

$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$login'"));
$id_user = $user['ID_USER'];

    if(isset($_POST['update'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_akhir'];
        $email = strtolower($_POST['email']);
        $nomor = $_POST['nomor'];
        $kecamatan = $_POST['kecamatan'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $password = $_POST['password'];
        $file = $_POST['file'];

        $ekstensi_diperboleh = array('png', 'jpg', 'jpeg', 'JPG', 'PNG', 'JPEG');
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
        
        $query = mysqli_query($db, "UPDATE db_user SET FIRST_NAME = '$nama_depan', LAST_NAME = '$nama_belakang', EMAIL = '$email', PASSWORD = '$password', PROVINSI = '$provinsi', CITY = '$kota', DISTRICTS = '$kecamatan', PHONE = '$nomor' WHERE ID_USER = '$id_user'");
        if ($query) {
            echo "
                <script>
                    alert('Update Berhasii');
                </script>
            ";
            $_SESSION['login'] = $email;
        }

}

if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
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
        <link rel="stylesheet" href="asset/css/text.css">
    <style>
        body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
    </style>

    <title>Registration</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid bg1">
            <img src="logo.png" alt="" class="align-self-center rounded-circle" width="100px"
                height="100px" style="margin: 0,1% 0; position:relative; left:200px;">
            <form class="d-flex" style="position:relative; right:80px">
                <input class="form-control me-2" type="Cari Disini" placeholder="Cari Disini" aria-label="Cari">
                <button class="btn btn-outline-success" type="submit" style="width: 200px;">Cari</button>
                <img src="./asset/icon/keranjang.jpeg" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="Keranjang.php" style="margin-left: 10px;"> Keranjang</a>
                <p style="margin-left: 30px;"> |</p>
                <img src="<?= "foto/profil/" . $user['PHOTO'] ?>" alt="" class="image" style="margin-left: 20px; width:25px; height:25px;">
                <i class="bx bx-chevron-right"></i> <a href="profile.php" style="margin-left: 10px;"><?= $user['FIRST_NAME'] ?></a>
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
                <a class="nav-link active" aria-current="page" href="homepage.php">HOME</a>
          <a class="nav-link active" aria-current="page" href="product.php?id=3001">BUNGA POT BESAR</a>
          <a class="nav-link active" aria-current="page" href="product.php?id=3002">BUNGA POT KECIL</a>
          <a class="nav-link active" aria-current="page" href="product.php?id=3003">POHON HIAS</a>
                </div>
            </div>
        </div>
    </nav>

<div class="container mt-5">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?= "foto/profil/" . $user['PHOTO'] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110" height="110">
                                    <div class="mt-3">
                                        <h4><?= $user['FIRST_NAME'] ?></h4>
                                        <p class="text-muted font-size-sm"><?= $user['CITY']?></p>
                                        <button class="btn btn-danger" type="submit" name="logout">Keluar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
				</div>
				<div class="col-lg-8">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Awal</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="nama_depan" value="<?= $user['FIRST_NAME'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Akhir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="nama_akhir" value="<?= $user['LAST_NAME'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email" value="<?= $user['EMAIL'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nomor</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="nomor" value="<?= $user['PHONE'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="password" value="<?= $user['PASSWORD'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kecamatan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="kecamatan" value="<?= $user['DISTRICTS'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">kota</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="kota" value="<?= $user['CITY'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">provinsi</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="provinsi" value="<?= $user['PROVINSI'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 mb-0>Foto Profil</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" aria-describedby="basic-addon1" name="file">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" name="update">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>