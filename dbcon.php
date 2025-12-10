<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "task_manager";
$port = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>