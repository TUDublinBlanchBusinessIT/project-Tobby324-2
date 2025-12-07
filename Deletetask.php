<?php
include("config.php");

$id = $_GET['id'];

$sql = "delete from tasks where id=$id";

if (mysqli_query($conn, $sql)) {
  echo "Task deleted successfully<br><br>";
} else {
  echo "Error deleting task<br><br>";
}

mysqli_close($conn);
?>

<a href="viewTasks.php">Back to Tasks</a>