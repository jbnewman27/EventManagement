<?php
function createBooking($pdo, $userID, $eventID, $numTickets, $orderTotal){
    for ($i = 0; $i < $numTickets; $i++) {
        $ticketNumber = uniqid('TICKET-', true);
        $sql = "INSERT INTO tickets (userID, eventID, ticketNumber) VALUES (:userID, :eventID, :ticketNumber)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userID' => $userID,
            'eventID' => $eventID,
            'ticketNumber' => $ticketNumber
        ]);
    }
    $sql = "INSERT INTO orderHistory (userID, eventID, orderDate, numTickets, orderTotal) VALUES (:userID, :eventID, NOW(), :numTickets, :orderTotal)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userID' => $userID,
        'eventID' => $eventID,
        'numTickets' => $numTickets,
        'orderTotal' => $orderTotal
    ]);
}

function orderHandler($pdo, $userID){
    $sql = "SELECT events.title, events.date, orderHistory.orderDate, orderhistory.numTickets, orderhistory.orderTotal FROM events JOIN orderHistory ON events.eventID = orderHistory.eventID WHERE orderHistory.userID = :userID ORDER BY orderHistory.orderDate DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addToCart($pdo, $userID, $eventID, $numTickets){
    $existingCartItem = checkCartItem($pdo, $userID, $eventID);
    if ($existingCartItem){
        $sql = "UPDATE cart SET numTickets = :numTickets WHERE cartID = :cartID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'numTickets' => $numTickets + $existingCartItem['numTickets'],
            'cartID' => $existingCartItem['cartID']
        ]);
    } else {
        $sql = "INSERT INTO cart (userID, eventID, numTickets) VALUES (:userID, :eventID, :numTickets)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userID' => $userID,
            'eventID' => $eventID,
            'numTickets' => $numTickets
        ]);
    }
}

function removeFromCart($pdo, $cartID){
    $sql = "DELETE FROM cart WHERE cartID = :cartID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cartID' => $cartID]);
}

function getCartItems($pdo, $userID){
    $sql = "SELECT cart.cartID, cart.eventID, events.title, events.date, events.price, cart.numTickets FROM cart JOIN events ON cart.eventID = events.eventID WHERE cart.userID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function clearCart($pdo, $userID){
    $sql = "DELETE FROM cart WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
}

function checkout($pdo, $userID): void {
    $cartItems = getCartItems($pdo, $userID);
    foreach ($cartItems as $item) {
        $orderTotal = $item['price'] * $item['numTickets'];
        createBooking($pdo, $userID, $item['eventID'], $item['numTickets'], $orderTotal);
    }
    clearCart($pdo, $userID);

}
