<!-- /*
file name: task_delete.php 
Description: This PHP and HTML script provides functionality to delete a specific task from a database, 
identified by its task ID, with options for the user to confirm or cancel the deletion, styled with an external CSS file.
*/ -->

<?php
$host = 'localhost'; 
$username = 'root'; 
$password = 'rss123'; 
$database = 'taskmanagerproject'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if task_id is received
if (isset($_GET['task_id'])) {
    $task_id = (int)$_GET['task_id'];
} else {
    // if not go back to tasklist page
    header("Location: task_list.php");
    exit;
}

// if confirms deletion
if (isset($_POST['confirm_delete'])) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE task_id = ?");
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $stmt->close();

    // return to tasklist after deletion
    header("Location: task_list.php");
    exit;
}

// if cancles deletion
if (isset($_POST['cancel_delete'])) {
    header("Location: task_list.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Task</title>
    <link rel="stylesheet" href="css\style.css">
 </head>
<body class="delete-task">
<h2>Are you sure you want to delete this task?</h2>
<form method="post" class="delete-tasks">
    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
    <input type="submit" name="confirm_delete" value="Confirm" class="input-button">
    <input type="submit" name="cancel_delete" value="Cancel" class="input-button">
</form>
</body>
</html>
