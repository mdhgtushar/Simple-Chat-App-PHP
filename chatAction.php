<?php
include"connect.php";
if(isset($_POST['msg'])){
    $user = $_SESSION['logedInUserId'];
$msg= $_POST['msg'];
$sql = "INSERT INTO tbl_chat (message, userId)
VALUES ('$msg', $user)";

if ($conn->query($sql) === TRUE) { } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>