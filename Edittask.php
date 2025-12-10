<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 align="center">Edit Task</h2>
  <br>

<?php
include("config.php");

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    
    $sql = "update tasks set title='$title', description='$description', category_id='$category', status='$status' where id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Task updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating task</div>";
    }
}

$sql = "select * from tasks where id=$id";
$result = mysqli_query($conn, $sql);
$task = mysqli_fetch_assoc($result);
?>

  <form class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4" for="title">Task Title:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $task['title']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="description">Description:</label>
      <div class="col-sm-8">          
        <textarea class="form-control" id="description" name="description" rows="4"><?php echo $task['description']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="category">Category:</label>
      <div class="col-sm-8">
        <select class="form-control" id="category" name="category">
          <option value="">Select Category</option>
<?php
$sql2 = "select * from categories";
$result2 = mysqli_query($conn, $sql2);
while($cat = mysqli_fetch_assoc($result2)) {
    $selected = ($cat['id'] == $task['category_id']) ? 'selected' : '';
    echo "<option value='" . $cat['id'] . "' $selected>" . $cat['name'] . "</option>";
}
?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="status">Status:</label>
      <div class="col-sm-8">
        <select class="form-control" id="status" name="status">
          <option value="pending" <?php if($task['status']=='pending') echo 'selected'; ?>>Pending</option>
          <option value="in_progress" <?php if($task['status']=='in_progress') echo 'selected'; ?>>In Progress</option>
          <option value="completed" <?php if($task['status']=='completed') echo 'selected'; ?>>Completed</option>
        </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="viewTasks.php" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>