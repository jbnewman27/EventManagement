<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["eventName"];
    $date = $_POST["eventDate"];
    $time = $_POST["eventTime"];
    $location = $_POST["eventLocation"];
    $description = $_POST["eventDescription"];
    $imageURL = $_POST["eventImage"];
    $price = $_POST["eventPrice"];
    $eventID = $_POST["eventID"];



    try{
        require_once "dbh.inc.php";
        require_once "eventModel.php";
        require_once "eventContr.php";

        if (isInputEmpty($title, $date, $time, $location, $description, $imageURL, $price)){
            header("location: ../createEvent_view.php?error=emptyinput");
            exit();
        }


        editEvent($pdo, $title, $description, $date, $location, $imageURL, $time, $eventID, $price);
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