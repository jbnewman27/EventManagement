<?php
session_start();
if(!isset($_SESSION["userID"])){
    header("location: ../login.php");
    die();
}
$userID = $_SESSION["userID"];

require_once 'includes/dbh.inc.php';
require_once 'includes/bookingContr.php';
require_once 'includes/navBar.php';
try {
    $orderHistory = orderHandler($pdo, $userID);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
<h1>Your Order History</h1>

<ul class="orders">
    <?php if (!empty($orderHistory)): ?>
        <?php foreach ($orderHistory as $order): ?>
            <li>
                <strong><?php echo htmlspecialchars($order['title']); ?></strong>
                <span class="date" <?php echo htmlspecialchars((date('F j, Y', strtotime($order['date'])))); ?> </span>
                (Ordered on: <?php echo htmlspecialchars((date('F j, Y, g:i a', strtotime($order['orderDate'])))); ?>)
                <div class="info">
                    <strong>Number of Tickets:</strong> <?php echo htmlspecialchars($order['numTickets']); ?>
                    <strong>Total:</strong> $<?php echo htmlspecialchars($order['orderTotal']); ?>
            </li>

        <?php endforeach; ?>
    <?php else: ?>
        <li>No orders found.</li>
    <?php endif; ?>
</ul>
<button onclick="window.location.href='displayUserEventList.php'">Back to Events</button>
<button onclick="window.location.href='includes/logout.php'">Logout</button>
</body>
</html>