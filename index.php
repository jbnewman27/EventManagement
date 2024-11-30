<?php
require_once "includes/signup_view.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
</head>
<body>
<form action="includes/signup.inc.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter your username" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>

    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="admin">Admin</option>
        <option value="event_manager">Event Manager</option>
    </select><br><br>

    <input type="submit" name="submit" value="Submit">

    <button onclick="window.location.href='login.php'">Go to Login</button>
</form>
</body>
</html>