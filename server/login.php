<!-- /*
file name: login.php 
 name: Sreelakshmi Odatt Venu
Description: manages user login by validating credentials against a database, initiating a session on successful login, and displaying an alert for invalid credentials.
*/ -->

<?php
// Start the session
session_start();

// Handle login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    // Database connection parameters
    $host = 'localhost'; // or your host
    $dbUsername = 'root';
    $dbPassword = 'rss123';
    $dbName = 'taskmanagerproject';

    // Create a new database connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to check user existence and password match
    $sql = "SELECT * FROM users WHERE user_name = ?";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_name);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        // Check if the password matches
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['loggedin'] = true;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_id'] = $user['user_id'];

            // Redirect to another page
            header('Location: task_list.php');
            exit;
        } else {
            echo '<script src="js\script.js"></script>';
        echo '<script>showAlert("Invalid username or password", "index.php");</script>';
    
            
        }
    } else {
        echo '<script src="js\script.js"></script>';
        echo '<script>showAlert("Invalid username or password", "index.php");</script>';
    
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Login form (omitted)...
?>
