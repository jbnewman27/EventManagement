<?php
require_once "includes/eventView.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <link rel="stylesheet" type="text/css" href="eventFormStyles.css">
</head>
<body>
<h1>Create Event</h1>
<form action="includes/createEvent.php" method="post">
    <label for="eventName">Event Name:</label>
    <input type="text" id="eventName" name="eventName" required><br><br>

    <label for="eventDate">Event Date:</label>
    <input type="date" id="eventDate" name="eventDate" required><br><br>

    <label for="eventTime">Event Time:</label>
    <input type="time" id="eventTime" name="eventTime" required><br><br>

    <label for="eventLocation">Event Location:</label>
    <input type="text" id="eventLocation" name="eventLocation" required><br><br>

    <label for="eventDescription">Event Description:</label>
    <textarea id="eventDescription" name="eventDescription" required></textarea><br><br>

    <label for="eventPrice">Event Price:</label>
    <input type="number" id="eventPrice" name="eventPrice" placeholder="$0.00" required><br><br>

    <label for="eventImage">Event Image URL:</label>
    <input type="text" id="eventImage" name="eventImage"><br><br>

    <input type="submit" name="submit" value="Create Event">
</form>
</body>
</html>