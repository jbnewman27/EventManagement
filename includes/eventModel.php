<?php

function get_location(object $pdo, string $location)
{
    $query = "SELECT location FROM events WHERE location = :location";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":location", $location);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_time(object $pdo, string $time)
{
    $query = "SELECT time FROM events WHERE time = :time";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":time", $time);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}