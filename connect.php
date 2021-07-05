<?php
session_start();
$servername = "localhost";
$username = "id8804355_chat_room_user";
$password = "L5dK1vpC|LoU&3u!";
$dbname = "id8804355_chat_room";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>