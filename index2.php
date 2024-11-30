<?php
include_once 'includes/signupView.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
</head>
<body>
<form action="includes/signup.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter your username" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>

    <label for="phoneNumber">Phone Number:</label>
    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required><br><br>

    <label for="accountType">Account Type:</label>
    <select id="accountType" name="accountType" required>
        <option value="user">User</option>
        <option value="eventManager">Event Manager</option>
    </select><br><br>

    <input type="submit" name="submit" value="Submit">

    <button onclick="window.location.href='login.php'">Go to Login</button>
</form>
</body>
</html>