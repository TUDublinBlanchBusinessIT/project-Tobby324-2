<?php
session_start();

$_SESSION['taskTitle'] = $_POST['title'];
$_SESSION['taskDesc'] = $_POST['description'];
$_SESSION['taskStatus'] = $_POST['status'];

include("config.php");

$t = $_SESSION['taskTitle'];
$d = $_SESSION['taskDesc'];
$s = $_SESSION['taskStatus'];

$sql = "insert into tasks(title,description,status) values ";
$sql .= "('$t','$d','$s')";

if (mysqli_query($conn, $sql)) {
  echo "Task added successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
session_destroy();

?>
<br><br>
<a href="taskForm.html">Add Another Task</a> | <a href="viewTasks.php">View All Tasks</a>