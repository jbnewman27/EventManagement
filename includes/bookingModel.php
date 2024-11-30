<?php

function checkCartItem($pdo, $userID, $eventID){
    $sql = "SELECT * FROM cart WHERE userID = :userID AND eventID = :eventID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userID' => $userID,
        'eventID' => $eventID
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}