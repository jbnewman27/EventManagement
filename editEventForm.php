<?php
$eventID = $_GET['eventID'];
require_once "includes/dbh.inc.php";
require_once "includes/eventContr.php";
$event = selectEvent($pdo, $eventID);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" type="text/css" href="eventFormStyles.css">
</head>
<body>
<h1>Edit Event</h1>
<form action="includes/editEvent.php" method="post">
    <input type="hidden" name="eventID" value="<?php echo $event['eventID']; ?>">
    <label for="eventName">Event Name:</label>
    <input type="text" id="eventName" name="eventName" value="<?php echo $event['title']?>" required><br><br>
    <label for="eventDate">Event Date:</label>
    <input type="date" id="eventDate" name="eventDate" value="<?php echo $event['date']?>" required><br><br>

    <label for="eventTime">Event Time:</label>
    <input type="time" id="eventTime" name="eventTime" value="<?php echo $event['time']?>" required><br><br>

    <label for="eventLocation">Event Location:</label>
    <input type="text" id="eventLocation" name="eventLocation" value="<?php echo $event['location']?>" required><br><br>

    <label for="eventDescription">Event Description:</label>
    <textarea id="eventDescription" name="eventDescription" required><?php echo $event['description']?></textarea><br><br>

    <label for="eventPrice">Event Price:</label>
    <input type="number" id="eventPrice" name="eventPrice" value="<?php echo $event['price']?>" required><br><br>

    <label for="eventImage">Event Image URL:</label>
    <input type="text" id="eventImage" name="eventImage" value="<?php echo $event['imageURL']?>" ><br><br>

    <input type="submit" name="submit" value="Edit Event">
</form>
</body>
</html>