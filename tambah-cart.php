<?php 
    include "config.php";
    // var_dump($id);
    $query_user = mysqli_query($db, "SELECT * FROM db_user"); //nanti diganti session
    $row_user = mysqli_fetch_assoc($query_user);
    $user = $row_user['ID_USER'];
    $cek_query = mysqli_query($db, "SELECT * FROM CART");
    $row_cek = mysqli_fetch_assoc($cek_query);
    if (isset($_POST['beli_barang'])) {
        $id = $_GET['id'];
        if($row_cek['status'] == null){
            mysqli_query($db, "INSERT INTO cart VALUES(3001, '$user', '', '', '', '', 'berjalan')");
        }elseif($row_cek['status'] == "berjalan"){
            $query_berjalan_awal = mysqli_query($db, "SELECT b.NAME, b.PRICE, b.DISCOUNT, b.QUANTITY 
            FROM cart_item d 
            JOIN product b ON d.ID_PRODUCT = b.ID_PRODUCT 
            JOIN cart c ON d.ID_CART = c.ID_CART 
            JOIN db_user a ON c.ID_USER = a.ID_USER WHERE b.ID_PRODUCT = '$id'");
            $row_berjalan_awal = mysqli_fetch_assoc($query_berjalan_awal);
            $price = $row_berjalan_awal['PRICE'];
            echo "PRICE = " . $price;
            // <br>
            $banyak = $row_berjalan_awal['QUANTITY'];
            echo "<br> BANYAK = " . $banyak;
            // <br>
            
            $query_berjalan_akhir = mysqli_query($db, "SELECT c.ID_CART c.PRICE, c.DELIVERY_CHARGE, c.GRAND_TOTAL 
            FROM cart_item d 
            JOIN product b ON d.ID_PRODUCT = b.ID_PRODUCT 
            JOIN cart c ON d.ID_CART = c.ID_CART 
            JOIN db_user a ON c.ID_USER = a.ID_USER WHERE b.ID_PRODUCT = '$id'");
            $row_berjalan_akhir = mysqli_fetch_assoc($query_berjalan_akhir);
            $id_cart = $row_berjalan_akhir['ID_CART'];
    
            $total_harga = $price * $banyak;
            echo "<br> TOTAL BAYAR = " . $total_harga;
            // <br>
            $ongkir = $total_harga/0.01;
            echo "<br> BIAYA ONGKIR = " . $ongkir;
            mysqli_query($db, "UPDATE cart SET PROMO = 'kaliajaberuntung', PRICE = '$price', `DELIVERY_CHARGE` = '123', `GRAND_TOTAL` = '$total_harga' WHERE `cart`.`ID_CART` = '$id_cart'");
    
        }
        $query_cek_cart_item = mysqli_query($db, "SELECT * cart_item WHERE ID_PRODUCT = '$id'");
        $row_cek_cart_item = mysqli_fetch_assoc($query_cek_cart_item);
        if ($row_cek_cart_item != null){
            mysqli_query($db, "INSERT INTO cart_item VALUES(5001, '$id_cart', '$id', '$price', '', '')");
            // INSERT ID_CART_ITEM
        }
    }


?>