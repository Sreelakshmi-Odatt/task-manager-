<!-- /*
file name: register.php 
Description: A user registration form with fields for username, first name, last name, email, and password (with a confirmation field), styled with an external CSS file and incorporating JavaScript for additional functionality..
*/ -->

<!DOCTYPE html>
<html>
<head>
    <title>Register New User</title>
    <link rel="stylesheet" href="css\style.css"> 
    <script src="js\script.js"></script>
</head>
<body class="register">
    <h1 class="new-user"> New User Registration </h1>
    <div class="container">
        <form action="register_user.php" method="post" class="user-registration-form"  >
            <div class="user-details-left">
                <label for="user_name" class="user-details" class="input-user">Username</label>
                <input type="text" id="user_name" class="input" name="user_name" required placeholder="Username"><br>

                <label for="first_name" class="user-details" class="input-user">First Name</label>
                <input type="text" id="first_name" class="input" name="first_name" placeholder="First Name"><br>

                <label for="last_name" class="user-details" class="input-user">Last Name</label>
                <input type="text" id="last_name"  class="input"name="last_name" placeholder="Last Name"><br>
            </div>

            <div class="user-details-right">
                <label for="email" class="user-details">Email</label>
                <input type="email" id="email" class="input" name="email" required class="input-user" placeholder="Email Address"><br>

                <label for="password" class="user-details">Password</label>
                <input type="password" id="password1"  class="input" name="password" required class="input-user" placeholder="Password"><br>

                <label for="password" class="user-details"> Confirm Password</label>
                <input type="password" id="password2" class="input" name="password" required class="input-user" placeholder=" Confirm Password"  ><br>
            </div>
            <input type="submit" value="Register" class="register-button">
        </form>
    </div>
</body>
</html>

