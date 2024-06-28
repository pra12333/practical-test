<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    
</head>
<body>
    <h2>Todo List Application</h2>
    <form method="post" action="index.php" class="input_form">
        <input type="text" name="task" class="task_input" placeholder="Enter a new task">
        <button type="submit" name="submit" id="add_btn" class="add_btn">Add task</button>
        <?php if (isset($errors)) { ?>
            <p class="error"><?php echo $errors; ?></p>
        <?php } ?>
    </form>

<?php
// Database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "todos";

// Creating the connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Insert the query
if (isset($_POST['submit'])) {
    if (empty($_POST['task'])) {
        $errors = "Please enter the task"; // Set error message
    } else {
        $task = mysqli_real_escape_string($conn, $_POST['task']); // Sanitize input
        $sql = "INSERT INTO task (task) VALUES ('$task')"; // Ensure the table name matches 'task'

        if (mysqli_query($conn, $sql)) {
            // Redirect to prevent form resubmission
            header('Location: index.php');
            exit(); // Important to stop further script execution after redirect
        } else {
            echo "ERROR: Could not execute query: " . mysqli_error($conn);
        }
    }
}


// Fetch the tasks
$task = mysqli_query($conn, "SELECT * FROM task ");

?>

<div class="task-list">
    <h3>Task List</h3>
    <?php 
    $i = 1; 
    while ($row = mysqli_fetch_array($task)) { 
    ?>
        <div class="task-item">
            <?php echo $i; ?>. <?php echo htmlspecialchars($row['task']); ?>
            <span class="delete">
                <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
            </span>
        </div>
    <?php 
        $i++; 
    } 
    ?>
</div>
<?php
if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];

        mysqli_query($conn, "DELETE FROM task WHERE id=".$id);
        header('location: index.php');
}

?>





<?php
// Close connection
mysqli_close($conn);
?>

</body>
</html>
