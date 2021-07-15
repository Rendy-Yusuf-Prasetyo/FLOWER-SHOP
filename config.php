<?php 
$db = mysqli_connect("localhost", "root", "", "toko_bunga"); (!$db) ? "Erorr di " . mysqli_connect_error() : null;

// function login($data){
//     global $db;
//     if (isset($_POST['submit'])) {
//       $username = $data['username'];
//       $email = $data['email'];
//       $password = $data['password'];
      
//       var_dump($username);
//       var_dump($email);
//       var_dump($password);
  
//       $query = mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$email'");
//       $row = mysqli_fetch_assoc($query);
//       // var_dump($email);
  
//       $query_user = mysqli_query($db, "SELECT * FROM db_user");
//       // $row = mysqli_fetch_assoc($query_user);
//       while ($row_user = mysqli_fetch_assoc($query_user)) {
//         if($email != $row_user['EMAIL']) {
//           echo "
//             <script>
//                 alert('Email salah');
//             </script>
//           ";
//           header("Location: login.php");
//         }
  
//         if($username == $row_user['FIRST_NAME'] && $password == $row_user['PASSWORD']){
//           header("Location: Homepage/index.php");
//         }else{
//           echo "
//             <script>
//                 alert('Username/Password salah');
//             </script>
//           ";
//           header("Location: login.php");
//         }
//       }
//     }
    
//     $query = mysqli_query($db, "SELECT * FROM db_user WHERE EMAIL = '$email'");
//     $row = mysqli_fetch_assoc($query);
// }
?>