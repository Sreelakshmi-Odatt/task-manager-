<!-- /*
file name: fetch_task.php 
Description: This PHP script connects to a database to retrieve and display tasks for a logged-in user, with an optional search feature to filter tasks by name.
*/ -->

<?php
session_start();
$servername = "localhost";  
$username = "root";     
$password = "rss123";     
$dbname = "taskmanagerproject";   

 
$conn = new mysqli($servername, $username, $password, $dbname);


 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['search'])) {
    $search_name = $_GET['search'];
}

if(strlen($search_name)) {
    $search_like = "%" .$search_name . "%";
    $sql = "SELECT * FROM tasks where user_id = ? and task_name like ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $_SESSION['user_id'], $search_like);
}else{
    $sql = "SELECT * FROM tasks where user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']);
}

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // output every row of data
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["task_name"] . "</td><td>" . $row["task_id"] . "</td>" .
            "<td>" . $row["task_priority"] . "</td><td>" . $row["due_date"] . "</td>" .
            "<td>" . $row["completion_status"] . "</td>".
            "<td><a href='task_detail.php?task_id=" . $row["task_id"] . "'>View</a> <a href='task_edit.php?task_id=" . $row["task_id"] . "'>Edit</a> <a href='task_delete.php?task_id=" . $row["task_id"] . "'>Delete</a> " ."</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>No tasks found</td></tr>";
}

$conn->close();
?>
