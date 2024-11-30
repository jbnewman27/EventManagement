<?php
session_start();
if (!isset($_SESSION["adminID"])) {
    header("location: login.php");
    die();
}
$adminID = $_SESSION["adminID"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
<p>Logged in as Admin ID: <?php echo htmlspecialchars($adminID); ?></p>
<form action="eventIndex.php" method="post">
    <label for="Create Event">Create Event:</label>
    <button onclick="window.location.href='eventIndex.php'">Create Event</button><br><br>
</form>
<form action="editEventForm.php" method="post">
    <label for="Edit Events">Edit Events:</label>
    <button onclick="window.location.href='editEventForm.php'">Edit Events</button><br><br>
</form>
<form action="includes/deleteEvent.php" method="post">
    <label for="Delete Events">Delete Events:</label>
    <button onclick="window.location.href='includes/deleteEvent.php'">Delete Events</button><br><br>
</form>
<button onclick="window.location.href='includes/logout.php'">Logout</button><br><br>
</body>
</html>
