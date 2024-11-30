<?php
session_start();
if(!isset($_SESSION["userID"])){
    header("location: ../login.php");
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userID = $_SESSION["userID"];
    $eventID = $_POST["eventID"];
    $numTickets = $_POST["numTickets"];

    try{
        require_once "dbh.inc.php";
        require_once "bookingContr.php";

        createBooking($pdo, $userID, $eventID, $numTickets);
        header("location: ../displayUserEventList.php?booking=success");
        die();
    }
    catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
}
else
{
    header("location: ../displayUserEventList.php");
    die();
}