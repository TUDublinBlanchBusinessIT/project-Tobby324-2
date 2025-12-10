<?php
session_start();

include("taskClass.php");

$_SESSION['taskTitle'] = $_POST['title'];
$_SESSION['taskDesc'] = $_POST['description'];
$_SESSION['taskStatus'] = $_POST['status'];
$_SESSION['taskCategory'] = $_POST['category'];

$taskObj = new Task();
$taskObj->setTaskDetails($_POST['title'], $_POST['description'], $_POST['status'], $_POST['category']);

include("config.php");

$t = $taskObj->title;
$d = $taskObj->description;
$s = $taskObj->status;
$c = $taskObj->category;

$sql = "insert into tasks(title,description,status,category_id) values ";
$sql .= "('$t','$d','$s','$c')";

if (mysqli_query($conn, $sql)) {
  echo "Task added successfully<br>";
  echo $taskObj->getTaskInfo();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
session_destroy();

?>
<br><br>
<a href="taskForm.php">Add Another Task</a> | <a href="viewTasks.php">View All Tasks</a>