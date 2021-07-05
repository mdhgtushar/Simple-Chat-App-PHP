<?php

include"connect.php";



if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
       
         $_SESSION['logedInUserId'] =  $row['id'];
               echo '<script>window.location.href = "chat.php";</script>';
  }
} else {
  echo  "Something wrong";
}
}


?>