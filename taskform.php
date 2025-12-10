<?php include("header.php"); ?>

<h2 align="center">Add New Task</h2>
<br>

<form class="form-horizontal" action="processTask.php" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-4" for="title">Task Title:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="title" placeholder="Enter Task Title" name="title" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-4" for="description">Description:</label>
    <div class="col-sm-8">          
      <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-4" for="category">Category:</label>
    <div class="col-sm-8">
      <select class="form-control" id="category" name="category" required>
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
      <button type="submit" class="btn btn-primary">Add Task</button>
    </div>
  </div>
</form>

</div>

</body>
</html>