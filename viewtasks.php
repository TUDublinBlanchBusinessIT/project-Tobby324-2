<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Tasks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">All Tasks</h2>
  <br>
  
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Description</th>
      <th>Status</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
    
<?php
include("config.php");

$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td><a href='editTask.php?id=" . $row['id'] . "'>Edit</a> | <a href='deleteTask.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No tasks found</td></tr>";
}

mysqli_close($conn);
?>
  </table>
  
  <div class="text-center">
    <a href="taskForm.html" class="btn btn-primary">Add New Task</a>
  </div>
</div>


</body>
</html>