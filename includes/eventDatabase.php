<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "eventmanagement";

try {
    $pdo2 = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
