<?php
require_once "includes/loginView.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<form action="includes/login.php" method="post">
    <label for="accountType">Account Type:</label>
    <select id="accountType" name="accountType" required>
        <option value="user">User</option>
        <option value="eventManager">Event Manager</option>
    </select><br><br>
    <label for="name">Username:</label>
    <input type="text" id="name" name="name" placeholder="Enter your username" required><br><br
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>
    <br><br><button>Login</button>
    <button onclick="window.location.href='index.php'">Go to Signup</button>

</form>
</body>
</html>

