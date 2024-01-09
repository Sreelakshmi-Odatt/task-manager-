<!-- /*
file name: task_list.php 
Description: a task manager application interface featuring navigation links, a user welcome section, 
a task search functionality, and a dynamic table for displaying tasks.
*/  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="# ">
    <link rel="stylesheet" href="css\style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Task Manager </title>
    <script type="text/javascript">
        function searchTask() {
           var searchValue = document.getElementById('searchInput').value;
            document.onload();
         window.location.href = 'fetch_tasks.php?search=' + encodeURIComponent(searchValue);
        }
    </script>
</head>

<body class="task-page">
<aside>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="register.php">New Registration</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </nav>
</aside>

<section class="welcome">
    <h1>Welcome User</h1>
</section>
<a  class="add-task"href="new_task.php">Add Task</a>
<form method="post">
    <div class="input-box">
    <i class="search-icon"></i>
    <input type="text" id="searchInput" placeholder="&#128269;" class="search">
    <input type="button" id="searchButton" value="Search" class="search">
    </div>
</form>

<section class="task-list">

    <table id="taskTable">  
        <thead class="tasks">
        <tr>
            <th width="80">Task Name</th>
            <th width="50">Task ID</th>
            <th width="50">Priority</th>
            <th width="80">Due Date</th>
            <th width="50">Status</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <!-- Task rows will be dynamically added here -->
        </tbody>
    </table>
</section>



<script>
    $(document).ready(function() {
        searchTasks();
        $('#searchButton').click(function() {
            searchTasks();
        });
    });

    function searchTasks() {
        var searchValue = $('#searchInput').val(); // obtain search value

        $.ajax({
            url: 'fetch_tasks.php?search=' + encodeURIComponent(searchValue),   
            type: 'GET',
            success: function(data) {
                $('#taskTable tbody').html(data); // update form content
            }
        });
    }
</script>

<footer>
    <p>@copyright 2023 Sreelakshmi Odatt Venu & Hanneng Deng</p>
</footer>

</body>

