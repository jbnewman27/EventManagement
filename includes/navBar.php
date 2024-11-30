<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="topnav">
    <a href="displayUserEventList.php">Home</a>
    <a href="orderHistory.php">Activity</a>
    <?php if (isset($_SESSION["userID"])): ?>
        <a href="includes/logout.php">Logout</a>
    <?php elseif (isset($_SESSION["adminID"])): ?>
        <a href="includes/logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="index2.php">Sign Up</a>
    <?php endif; ?>
</div>
</body>
</html>
