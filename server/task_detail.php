<!-- /*
file name: details.php 
Description: This PHP and HTML script retrieves and displays the details of a specific task from a database based on a task ID obtained from the URL, 
and includes a button to return to the task list, all styled with an external CSS file.
*/ -->


<?php
session_start();
$host = 'localhost';  
$username = 'root';  
$password = 'rss123';  
$database = 'taskmanagerproject';  

 
$conn = new mysqli($host, $username, $password, $database);

 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get task_id from url
$task_id = isset($_GET['task_id']) ? (int)$_GET['task_id'] : 0;

$stmt = $conn->prepare("SELECT task_id, task_name, task_description, completion_status, task_priority, due_date FROM tasks WHERE task_id = ?");
$stmt->bind_param("i", $task_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Task ID: " . $row["task_id"]. "<br>";
        echo "Task Name: " . $row["task_name"]. "<br>";
        echo "Description: " . $row["task_description"]. "<br>";
        echo "Completion Status: " . ($row["completion_status"] ? 'Completed' : 'Not Completed') . "<br>";
        echo "Priority: " . $row["task_priority"]. "<br>";
        echo "Due Date: " . $row["due_date"]. "<br>";
    }
} else {
    echo "0 results";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="task-details">
    <div class="task-detail">
<form action="task_list.php" method="get">
    <input type="submit" value="OK" class="ok-button">
</div>
</form>
</body>
</html>
