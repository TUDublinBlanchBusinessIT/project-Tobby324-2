<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task Manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 align="center">Task Manager</h2>
  <br><br>
  <form class="form-horizontal" action="processTask.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4" for="title">Task Title:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="title" placeholder="Enter Task Title" name="title">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="description">Description:</label>
      <div class="col-sm-8">          
        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="category">Category:</label>
      <div class="col-sm-8">
        <select class="form-control" id="category" name="category">
          <option value="">Select Category</option>
<?php
include("config.php");
$sql = "select * from categories";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
mysqli_close($conn);
?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="status">Status:</label>
      <div class="col-sm-8">
        <select class="form-control" id="status" name="status">
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-default">Add Task</button>
      </div>
    </div>
  </form>
  
  <div class="col-sm-12 text-center">
    <br>
    <a href="viewTasks.php">View All Tasks</a>
  </div>
</div>

</body>
</html>