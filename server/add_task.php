<!-- /*
file name: add_task.php 
Description: allows user to add task. 
The first PHP script manages the process of adding a new task to a database in a task management system, including form data validation, 
SQL query execution for insertion, and displaying success or error messages with a redirect or back navigation. 
The second script hashes a given password using the default algorithm and then prints the length of the resulting hash.
*/ -->

<?php
session_start();
$host = 'localhost'; //  
$username = 'root'; //  
$password = 'rss123'; //  
$database = 'taskmanagerproject'; // 

// establish the database connection
$conn = new mysqli($host, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// obtain form data
$task_name = $conn->real_escape_string($_POST['task_name']);
$task_description = $conn->real_escape_string($_POST['task_description']);
$completion_status = (int)$_POST['completion_status'];
$task_priority = (int)$_POST['task_priority'];
$due_date = $_POST['due_date'];
$user_id = $_SESSION['user_id'];

// SQL query
$sql = "INSERT INTO tasks (task_name, task_description, completion_status, task_priority, due_date,user_id) 
        VALUES ('$task_name', '$task_description', '$completion_status', '$task_priority', '$due_date', '$user_id')";
try{
    if ($conn->query($sql) === TRUE) {
        echo "<div id='success-message' style='position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); 
          padding:15px; background-color: lightgreen; color: white; z-index: 1000;'>
            New Task Add successfully
          </div>
          <script type='text/javascript'>
            setTimeout(function(){
                document.getElementById('success-message').style.display = 'none';
                window.location.href = 'task_list.php'; 
            }, 3000);
          </script>";
    }
}catch (mysqli_sql_exception $e){
    echo "<div id='error-message' style='position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); 
          padding:15px; background-color: lightgreen; color: white; z-index: 1000;'>
            Add Task failed. Please check and try again.
          </div>
          <script type='text/javascript'>
            setTimeout(function(){
                document.getElementById('error-message').style.display = 'none';
                window.history.back(); 
            }, 3000);
          </script>";
}


$conn->close();
?>
