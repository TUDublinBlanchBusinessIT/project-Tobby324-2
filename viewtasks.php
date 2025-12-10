<?php include("header.php"); ?>

  <h2 class="text-center">All Tasks</h2>
  <br>
  
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Description</th>
      <th>Category</th>
      <th>Status</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
    
<?php
include("config.php");

$sql = "SELECT tasks.*, categories.name as category_name FROM tasks LEFT JOIN categories ON tasks.category_id = categories.id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td><a href='editTask.php?id=" . $row['id'] . "'>Edit</a> | <a href='deleteTask.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No tasks found</td></tr>";
}

mysqli_close($conn);
?>
  </table>

</div>

</body>
</html>