<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/eventContr.php';
include_once 'includes/navBar.php';

session_start();
if (!isset($_SESSION["adminID"])) {
    header("location: login.php");
    die();
}
$adminID = $_SESSION["adminID"];

$events = listEvents($pdo, $adminID);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Events</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
<h1>My Events</h1>
<button class="logout" onclick="window.location.href='includes/logout.php'">Logout</button>
<button onclick="window.location.href='eventIndex.php'">Add Event</button>
<ul class="event-list">
    <?php if (!empty($events)): ?>
        <?php foreach ($events as $event): ?>
            <li>
                <strong><?php echo htmlspecialchars($event['title']); ?></strong> <?php echo htmlspecialchars((date('F j, Y', strtotime($event['date'])))); ?>
                <div class="info">
                    <em>Time:</em> <?php echo htmlspecialchars($event['time']); ?><br>
                    <strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?><br>
                    <strong>Description:</strong> <?php echo htmlspecialchars($event['description']); ?><br>
                    <strong>Image URL:</strong> <?php echo htmlspecialchars($event['imageURL']); ?><br>
                    <button onclick="window.location.href='editEventForm.php?eventID=<?php echo $event['eventID']; ?>'">Edit</button>
                    <button onclick="window.location.href='includes/deleteEvent.php?eventID=<?php echo $event['eventID']; ?>'">Delete</button>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No events found.</li>
    <?php endif; ?>
</ul>
</body>
</html>