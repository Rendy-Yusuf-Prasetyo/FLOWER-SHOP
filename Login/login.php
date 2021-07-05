<?php 
include "../config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    
    <link rel="stylesheet" href="./asset/css/login.css">
    <title>Gallery Marin</title>
  </head>
  <body>
    
    <div class="position-absolute" style="height:100%;width:100%;">
      <div class="d-flex flex-row" style="height:100%;width:100%;">
        <div class="d-flex flex-column left-content  align-items-scretch justify-content-center" style="background-color: #EBE8E8;">
          <h1 class="fs-1 align-self-center fw-bold">
            GALLERY MARIN
          </h1>
          <img src="./asset/icon/logo.jpeg" alt="" class="align-self-center rounded-circle" width="250px" height="250px" style="margin: 3% 0">
          <p class="fs-5 align-self-center">The Professional "<span class="fs-5 font-monospace">Artificial Flower</span>" Arrangment</p>
          <div class="icon-sosmed d-flex flex-row justify-content-center" >
            <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/facebook.png" alt="" width="40px" height="40px" >
            </a>
            <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/twitter.png" alt="" width="40px" height="40px">
            </a>
            <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/linkedin.png" alt="" width="40px" height="40px">
            </a>
            <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/google-plus.png" alt="" width="40px" height="40px">
            </a>
            <a href="#" style="margin: 0 1%">
              <img src="./asset/icon/telegram.png" alt="" width="40px" height="40px">
            </a>
          </div>
          <p class="fs-6 fw-bold align-self-center">&copy;DQS</p>
        </div>
        <div class="d-flex flex-column left-content  align-items-scretch justify-content-center right-content  align-items-scretch" >
          <h1 class="fs-1 align-self-center fw-bold" style="margin-bottom: 8%;">
            WELCOME...
          </h1>
            <form action="../Homepage/index.php" method="post">
              <div class="container" style="width: 70%">
                <div class="input-group "  style="margin-bottom: 3%">
                  <span class="input-group-text" id="basic-addon1"><img src="./asset/icon/user.png" alt="" width="20px" height="20px"></span>
                  <input required type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                </div>
                <div class="input-group "  style="margin-bottom: 3%">
                  <span class="input-group-text" id="basic-addon1"><img src="./asset/icon/email.png" alt="" width="20px" height="20px"></span>
                  <input required type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email">
                </div>
                <div class="input-group "  style="margin-bottom: 3%">
                  <span class="input-group-text" id="basic-addon1"><img src="./asset/icon/lock.png" alt="" width="20px" height="20px"></span>
                  <input required type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                </div>
                <div class="d-flex flex-row justify-content-between" style="margin-bottom: 5%">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Keep me signed in
                    </label>
                  </div>
                  <p>
                    <a href="#">Forgot Password ?</a>
                  </p>
                </div>
                <div class="d-flex flex-row justify-content-center">
                  <!-- <a href="../Homepage/index.php"> -->
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 50%"><b>Sign In</b></button>
                  <!-- </a> -->
                </div>
              </div>
            </form>
            
            <br><br>

            <h6 style="margin-left:400px;">
              Don't have an account ?
            </h6>

            <br>

            <i class="bx bx-chevron-right"></i> <a style="margin-left:460px;" href="../regist/index.html">Sign Up</a>

        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>