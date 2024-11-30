<?php
session_start();
if (!isset($_SESSION["adminID"])) {
    header("location: login.php");
    die();
}
$adminID = $_SESSION["adminID"];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $title = $_POST["eventName"];
   $date = $_POST["eventDate"];
   $time = $_POST["eventTime"];
   $location = $_POST["eventLocation"];
   $description = $_POST["eventDescription"];
   $imageURL = $_POST["eventImage"];
   $price = $_POST["eventPrice"];



    try{
        require_once "dbh.inc.php";
        require_once "eventModel.php";
        require_once "eventContr.php";

        if (isInputEmpty($title, $date, $time, $location, $description, $imageURL, $price)){
            header("location: ../createEvent_view.php?error=emptyinput");
            exit();
        }


        createEvent($pdo, $title, $description, $date, $location, $imageURL, $time, $adminID, $price);
        header("Location: ../displayEventList.php?error=none");
        $pdo = null;
        $stmt = null;
    }
    catch(PDOException $e){
       ;
        die("ERROR: Could not execute $sql. " . $e->getMessage());

    }
}
else{
    header("location: ../createEvent.php");
    exit();
}