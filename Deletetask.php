<?php
include("config.php");

$id = $_GET['id'];

$sql = "delete from tasks where id=$id";

if (mysqli_query($conn, $sql)) {
  mysqli_close($conn);
  header("Location: viewTasks.php");
  exit();
} else {
  echo "Error deleting task";
  mysqli_close($conn);
}
?>