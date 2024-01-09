<!-- /*
file name: new_task.php 
Description: This PHP script a form for adding a new task, including fields for task name, description, completion status, priority, and due date, styled with an external CSS file.. -->


<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="new_task">
    <div class="addtask">
<form action="add_task.php" method="post" class="new-task">
    <label for="task_name">Task Name:</label>
    <input type="text" id="task_name" name="task_name" required><br>

    <label for="task_description">Task Description:</label>
    <textarea id="task_description" name="task_description" required></textarea><br>

    <label for="completion_status">Completion Status:</label>
    <select id="completion_status" name="completion_status">
        <option value="0">0</option>
        <option value="1">1</option>
    </select><br>

    <label for="task_priority">Task Priority:</label>
    <select id="task_priority" name="task_priority">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
    </select><br>

    <label for="due_date">Due Date:</label>
    <input type="date" id="due_date" name="due_date" required><br>

    <input type="submit" value="Add Task">
        </div>
</form>
</body>
</html>
