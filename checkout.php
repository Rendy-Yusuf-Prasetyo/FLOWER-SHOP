<?php 
include "config.php";

$id = $_GET['id_cart'];
$query = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM CART WHERE ID_CART = '$id'"));
// echo "HARGA". $query['PRICE'];
  if (isset($_POST['submit'])) {
      $tambah_uang = mysqli_fetch_assoc(mysqli_query($db, "SELECT sum(tmp_price) 'BANYAK' FROM cart_item WHERE ID_CART = '$id'"));
      $uang = $tambah_uang['BANYAK'];
      $tambah_proses = mysqli_query($db, "UPDATE cart SET GRAND_TOTAL = '$uang' WHERE ID_CART = '$id'");

  }else{
    header("Location: Keranjang/index.php");
  }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="bootstrap/plugin/css/datepicker.css"/>
    <script src="bootstrap/js/jquery-3.4.1.js"></script>
    <script src="bootstrap/plugin/js/bootstrap-datepicker.js"></script>
    <title>Checkout example for Bootstrap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>

  <body class="bg-light">
      <div class="container">
        <div class="py-5 text-center">
          <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <h2>Checkout form</h2>
          <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="row">
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
            </h4>
            <ul class="list-group mb-3">
            
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Biaya Ongkir</h6>
                </div>
                <span class="text-muted">Rp.<?= $query['DELIVERY_CHARGE'] ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Total Harga</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">Rp .<?= $query['GRAND_TOTAL'] ?></span>  
              </li>
              <?php 
                $total = $query['GRAND_TOTAL'] + $query['DELIVERY_CHARGE'];
              ?>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (Rupiah)</span>
                <strong><?= $total ?></strong>
              </li>
            </ul>
          </div>
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">Nama</label>
                  <input type="text" class="form-control" name="nama" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
                    <!-- <small class="text-muted">Full name as displayed on card</small> -->
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Indonesia" name="country" required>
                      <!-- <small class="text-muted">Full name as displayed on card</small> -->
                    <div class="invalid-feedback">
                      Country name is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="zip">Zip Code</label>
                    <input type="text" class="form-control" id="zip" placeholder="60153" name="zip" required>
                      <!-- <small class="text-muted">Full name as displayed on card</small> -->
                    <div class="invalid-feedback">
                      Zip is required
                    </div>
                </div>
              </div>

              <h4 class="mb-3">Payment</h4>

              <label class="form-label">Payment</label>
                <select class="form-select mb-3" aria-label="Default select example" name="payment">
                  <option selected>Choose payment method</option>
                  <option value="credit">Credit Card</option>
                  <option value="debit">Debit Card</option>
                  <option value="paypal">Paypal</option>
                  
                </select>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input type="text" class="form-control" name="name_card" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" name="card_number" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3 mt-2">
                <label class="form-label" style="margin-bottom: 20px;">Berlaku Sampai</label>
                  <input type="text" class="form-control datepicker" name="expire" style="margin-top: -18px;" required>
                          <script type="text/javascript">
                              $(function(){
                                  $(".datepicker").datepicker({
                                      format: 'yyyy-mm-yy',
                                      autoclose: true,
                                      todayHighLight: true,
                                  });
                              });
                          </script>
                </div>
                <div class="col-md-3 mb-3 mt-2">
                  <label for="cc-expiration">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" name="cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Continue to checkout</button>
            </form>
          </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
          <p class="mb-1">&copy; 2017-2018 Company Name</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
          </ul>
        </footer>
      </div>
  </body>
</html>
