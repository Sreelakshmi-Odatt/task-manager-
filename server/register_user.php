<!-- /*
file name: register_user.php 

Description: This PHP script handles user registration by inserting new user details into a database, encrypting the password, and displaying success or error messages with a redirect or back navigation.
*/ -->

<?php
session_start();
$servername = "localhost";  // database server name
$username = "root";     // database user name
$password = "rss123";     // database password
$dbname = "taskmanagerproject";   //database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_name = $conn->real_escape_string($_POST['user_name']);
$first_name = $conn->real_escape_string($_POST['first_name']);
$last_name = $conn->real_escape_string($_POST['last_name']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

// password encryption
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// insert data
$sql = "INSERT INTO users (user_name, first_name, last_name, email, password) 
        VALUES ('$user_name', '$first_name', '$last_name', '$email', '$hashed_password')";

try{
    if ($conn->query($sql) === TRUE) {
        echo "<div id='success-message' style='position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); 
          padding:15px; background-color: lightgreen; color: white; z-index: 1000;'>
            New user registered successfully
          </div>
          <script type='text/javascript'>
            setTimeout(function(){
                document.getElementById('success-message').style.display = 'none';
                window.location.href = 'index.php'; 
            }, 3000);
          </script>";
    }
}catch (mysqli_sql_exception $e) {
    echo "<div id='error-message' style='position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); 
          padding:15px; background-color: lightgreen; color: white; z-index: 1000;'>
            User registration error: Username or email might be already in use. Please check and try again.
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
