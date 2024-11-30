<?php
session_start();
if (!isset($_SESSION["adminID"])) {
    header("location: login.php");
    die();
}
$adminID = $_SESSION["adminID"];
include_once 'includes/navBar.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/eventContr.php';
$events = listEvents($pdo, $adminID);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <h1>Welcome to the Dashboard</h1>
    <a class="dashboard-boxes">
        <a href="displayEventList.php" class="box half-width">
            <h2>Manage Events</h2>
        </a>
        <div class="box half-width">
            <h2>Event List</h2>
            <ul>
                <?php if (!empty($events)): ?>
                    <?php foreach (array_slice($events, 0, 5) as $event): ?>
                        <li><?php echo htmlspecialchars($event['title']); ?> - <?php echo htmlspecialchars((date('F j, Y', strtotime($event['date'])))); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No events found.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <a href="revenue.php" class="box half-width">
        <h2>Revenue</h2>
        <p>Total Revenue: $<?php echo number_format(getTotalRevenue($pdo, $adminID), 2); ?></p>
    </a>
    <button onclick="window.location.href='includes/logout.php'">Logout</button>
</div>
</body>
</html>