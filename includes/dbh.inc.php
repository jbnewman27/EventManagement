<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "eventmanagement";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
