<?php
session_start();
if (!isset($_SESSION["userID"])) {
    header("location: login.php");
    die();
}
$userID = $_SESSION["userID"];

require_once 'includes/dbh.inc.php';
require_once 'includes/bookingContr.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['remove'])){
        removeFromCart($pdo, $_POST['cartID']);
    }
    elseif (isset($_POST['checkout'])){
        checkout($pdo, $userID);
        header("location: orderHistory.php");
        die();
    }
}
$cartItems = getCartItems($pdo, $userID);
$orderTotal = 0;
foreach ($cartItems as $item){
    $orderTotal += $item['price'] * $item['numTickets'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Your Cart</h1>
    <ul class="cart-list">
        <?php if (!empty($cartItems)): ?>
            <?php foreach ($cartItems as $item): ?>
                <li>
                    <strong><?php echo htmlspecialchars($item['title']); ?></strong> <?php echo htmlspecialchars((date('F j, Y', strtotime($item['date'])))); ?>
                    <span>Tickets: <?php echo htmlspecialchars($item['numTickets']); ?></span>
                    <form method="post">
                        <input type="hidden" name="cartID" value="<?php echo $item['cartID']; ?>">
                        <button type="submit" name="remove">Remove</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No items in cart.</li>
        <?php endif; ?>
    </ul>
    <?php if (!empty($cartItems)): ?>
        <p>Total: $<?php echo htmlspecialchars($orderTotal); ?></p>
        <form method="post">
            <button type="submit" name="checkout">Checkout</button>
        </form>
    <?php endif; ?>
    <button onclick="window.location.href='displayUserEventList.php'">Back to Events</button>
    <button onclick="window.location.href='includes/logout.php'">Logout</button>
</div>
</body>
</html>