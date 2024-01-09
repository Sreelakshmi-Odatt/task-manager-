<!-- /*
file name: index.php 
 name: Sreelakshmi Odatt Venu
Description:  A login page of a Task Manager web application, containing a form with fields for username and password, and buttons for login and registration.
*/ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css\style.css"> 
    <script src="js\script.js"></script>
</head>
<body class="index-page">
<h1> Task  Manager Web Application</h2>

 
<form action="login.php" method="post" id="login">
    <div class="form-container">
    <h2>Login</h2>
        <label for="user_name">Username</label>
        <input type="text" id="user_name" class="input" name="user_name" required placeholder="Username">
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="input" required placeholder="Password">
    </div>
    <div class="button">
        <button type="submit" class="login-button" onclick="login()">Login</button> 
   <button onclick="location.href='register.php'">Register Here</button>
</div>
</div>
</form>
</body>
</html>
