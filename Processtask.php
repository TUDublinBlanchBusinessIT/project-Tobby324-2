<?php
session_start();

include("taskClass.php");
include("config.php");

$_SESSION['taskTitle'] = $_POST['title'];
$_SESSION['taskDesc'] = $_POST['description'];
$_SESSION['taskStatus'] = $_POST['status'];
$_SESSION['taskCategory'] = $_POST['category'];

$taskObj = new Task();
$taskObj->setTaskDetails($_POST['title'], $_POST['description'], $_POST['status'], $_POST['category']);

$t = $taskObj->title;
$d = $taskObj->description;
$s = $taskObj->status;
$c = $taskObj->category;

$sql = "insert into tasks(title,description,status,category_id) values ('$t','$d','$s','$c')";

if (mysqli_query($conn, $sql)) {
  mysqli_close($conn);
  session_destroy();
  header("Location: viewTasks.php");
  exit();
} else {
  echo "Error: " . mysqli_error($conn);
  mysqli_close($conn);
}
?>