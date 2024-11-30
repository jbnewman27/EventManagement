<?php
session_start();
if (!isset($_SESSION["userID"])) {
    header("location: ../login.php");
    die();
}
$userID = $_SESSION["userID"];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addToCart'])) {
    require_once 'dbh.inc.php';
    require_once 'bookingContr.php';
    require_once 'bookingModel.php';

    $eventID = $_POST['eventID'];
    $numTickets = $_POST['numTickets'];

    addToCart($pdo, $userID, $eventID, $numTickets);

    header("location: ../displayUserEventList.php");
    die();
} else {
    header("location: ../displayUserEventList.php");
    die();
}