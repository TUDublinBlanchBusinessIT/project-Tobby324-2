<?php
include 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    
    $sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', '$status')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Task added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
            background-color: #f0f0f0;
        }
        
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
        }
        
        h2 {
            text-align: center;
            color: #333;
        }
        
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
        }
        
        button {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        .message {
            padding: 10px;
            background-color: lightgreen;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Task Manager</h2>
        
        <?php
        if ($message != '') {
            echo "<div class='message'>" . $message . "</div>";
        }
        ?>
        
        <form method="POST" action="">
            <label>Task Title:</label>
            <input type="text" name="title" required>
            
            <label>Description:</label>
            <textarea name="description" rows="4"></textarea>
            
            <label>Status:</label>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            
            <button type="submit">Add Task</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>