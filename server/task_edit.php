<!-- /*
file name: task_edit.php 
Description: provides an interface for editing an existing task, identified by its task ID, with fields for task name, description, completion status, priority,
 and due date, and includes validation for the date format and success/error messaging, styled with an external CSS file.
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

 
$task_id = isset($_GET['task_id']) ? (int)$_GET['task_id'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $completion_status = $_POST['completion_status'];
    $task_priority = $_POST['task_priority'];
    $due_date = $_POST['due_date'];


    if (!DateTime::createFromFormat('Y-m-d', $due_date)) {
        echo "Invalid date format. Please use YYYY-MM-DD.<br>";
    } else{
        $stmt = $conn->prepare("UPDATE tasks SET task_name=?, task_description=?, completion_status=?, task_priority=?, due_date=? WHERE task_id=?");
        $stmt->bind_param("ssiisi", $task_name, $task_description, $completion_status, $task_priority, $due_date, $task_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div id='success-message' style='position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); 
          padding:15px; background-color: lightgreen; color: white; z-index: 1000;'>
            Update Task  successfully
          </div>
          <script type='text/javascript'>
            setTimeout(function(){
                document.getElementById('success-message').style.display = 'none';
                window.location.href = 'task_list.php'; // 登录页面的 URL
            }, 3000);
          </script>";
        } else {
            echo "No changes made or error occurred.<br>";
        }

        $stmt->close();
    }

}

// get task details
$stmt = $conn->prepare("SELECT task_id, task_name, task_description, completion_status, task_priority, due_date FROM tasks WHERE task_id = ?");
$stmt->bind_param("i", $task_id);
$stmt->execute();
$result = $stmt->get_result();

$task = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="edit-task">
<form action="" method="post">
    <div class="edit-tasks">
    Task ID: <?php echo $task['task_id']; ?><br>
    <input type="hidden" name="task_id" value="<?php echo $task['task_id']; ?>">

    <label for="task_name">Task Name:</label>
    <input type="text" id="task_name" name="task_name" value="<?php echo $task['task_name']; ?>" required><br>

    <label for="task_description">Task Description:</label>
    <textarea id="task_description" name="task_description" required><?php echo $task['task_description']; ?></textarea><br>

    <label for="completion_status">Completion Status:</label>
    <select id="completion_status" name="completion_status">
        <option value="0" <?php if ($task['completion_status'] == 0) echo 'selected'; ?>>0</option>
        <option value="1" <?php if ($task['completion_status'] == 1) echo 'selected'; ?>>1</option>
    </select><br>

    <label for="task_priority">Task Priority:</label>
    <select id="task_priority" name="task_priority">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <option value="<?php echo $i; ?>" <?php if ($task['task_priority'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
        <?php endfor; ?>
    </select><br>

    <label for="due_date">Due Date:</label>

    <input type="date" id="due_date" name="due_date"  value="<?php echo $task['due_date']; ?>" required><br>
   
    <input type="submit" value="Submit" class="edit-submit">
   
</form>

<form action="task_list.php" method="get">
    <input type="submit" value="Cancel" class="edit-cancel">
 
</form>
</body>
</html>
