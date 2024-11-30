<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/eventContr.php';
include_once 'includes/navBar.php';

session_start();
if (!isset($_SESSION["userID"])) {
    header("location: login.php");
    die();
}
$userID = $_SESSION["userID"];
$events = listAllEvents($pdo);
?><!DOCTYPE html>
<html>
<head>
    <title>Event List</title>
    <link rel="stylesheet" type="text/css" href="displayEventsStyles.css">
</head>
<body>
<div class="container">
    <h1>Events</h1>
    <button class="logout" onclick="window.location.href='includes/logout.php'">Logout</button>
    <button class="orderHistory" onclick="window.location.href='orderHistory.php'">Order History</button>
    <ul class="event-list">
        <?php if (!empty($events)): ?>
            <?php foreach ($events as $event): ?>
                <li class="event-item">
                    <img src="<?php echo htmlspecialchars($event['imageURL']); ?>" alt="Event Image" class="event-image">
                    <div class="event-info">
                        <strong><?php echo htmlspecialchars($event['title']); ?></strong> <?php echo htmlspecialchars((date('F j, Y', strtotime($event['date'])))); ?>
                        <em>Time:</em> <?php echo htmlspecialchars($event['time']); ?><br>
                        <strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?><br>
                        <strong>Description:</strong> <?php echo htmlspecialchars($event['description']); ?><br>
                        <strong>Price:</strong> $<?php echo htmlspecialchars($event['price']); ?><br>
                        <input type="hidden" name="imageURL" value="<?php echo $event['imageURL']; ?>">
                    </div>
                    <form action="includes/addtoCart.php" method="post">
                        <input type="hidden" name="eventID" value="<?php echo $event['eventID']; ?>">
                        <label for="numTickets">Number of Tickets:</label>
                        <input type="number" id="numTickets" name="numTickets" min="1" value="1" required>
                        <button type="submit" name="addToCart">Add to Cart</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No events found.</li>
        <?php endif; ?>
    </ul>
    <button onclick="window.location.href='cartDisplay.php'">View Cart</button>
</div>
</body>
</html>