<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $eventID = $_GET["eventID"];
    require_once "dbh.inc.php";
    require_once "eventContr.php";
    deleteEvent($pdo, $eventID);
    header("Location: ../displayEventList.php?error=none");
    $pdo = null;
    $stmt = null;
}
else{
    header("location: ../eventIndex.php");
    exit();
}