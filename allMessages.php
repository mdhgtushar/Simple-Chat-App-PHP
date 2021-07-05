<?php
include"connect.php";


$sql = "SELECT * FROM tbl_chat LIMIT 200";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
       $user = $row["userId"];
       echo '<div class="p-10 b-1 msg"><p>'.$row["message"].'</p><hr><small>';
             
  $sqls = "SELECT * FROM tbl_users WHERE id=1" ;
$results = $conn->query($sqls);
if ($results->num_rows > 0) {
  while($rows = $results->fetch_assoc()) {
echo $rows["name"];
  }} 
  echo ' || ';
  $currentDateTime = $row["createDate"];
echo $newDateTime = date('d:m:Y h:i A', strtotime($currentDateTime));
  
  echo '</small></div>';
  }
} else {
  echo "Start chating";
}

?>