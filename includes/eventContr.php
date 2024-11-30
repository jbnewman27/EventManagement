<?php
declare(strict_types=1);

function isInputEmpty(string $title, string $date, string $location, string $description, string $image, string $time, string $price ): bool
{
    if(empty($title) || empty($date) || empty($location) || empty($description) || empty($image) || empty($time) || empty($price)){
        return true;
    }
    else{
        return false;
    }
}
function isLocationUnavailableAtTime(){
    //code
}

function createEvent($pdo, $title, $description, $date, $location, $imageURL, $time, $adminID, $price) {
    $sql = "INSERT INTO events (title, description, date, location, imageURL, time, adminID, price) VALUES (:title, :description, :date, :location, :imageURL, :time, :adminID, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'title' => $title,
        'description' => $description,
        'date' => $date,
        'location' => $location,
        'imageURL' => $imageURL,
        'time' => $time,
        'adminID' => $_SESSION['adminID'],
        'price' => $price
    ]);
}
function editEvent($pdo, $title, $description, $date, $location, $imageURL, $time, $eventID, $price){
    $sql = "UPDATE events SET title = :title, description = :description, date = :date, location = :location, imageURL = :imageURL, time = :time, price = :price WHERE eventID = :eventID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'title' => $title,
        'description' => $description,
        'date' => $date,
        'location' => $location,
        'imageURL' => $imageURL,
        'time' => $time,
        'eventID' => $eventID,
        'price' => $price

    ]);
}
function selectEvent($pdo, $eventID){
    $sql = "SELECT * FROM events WHERE eventID = :eventID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'eventID' => $eventID
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function deleteEvent($pdo, $eventID){
    $sql = "DELETE FROM events WHERE eventID = :eventID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'eventID' => $eventID
    ]);
}

function listEvents($pdo, $adminID){
    $sql = "SELECT * FROM events WHERE adminID = :adminID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'adminID' => $adminID
    ]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function listAllEvents($pdo){
    $sql = "SELECT * FROM events";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
