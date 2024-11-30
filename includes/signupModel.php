<?php
declare(strict_types=1);
function getUsername(object $pdo, string $username, string $table)
{
    $query = "SELECT username FROM $table WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getEmail(object $pdo, string $email, string $table)
{
    $query = "SELECT email FROM $table WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}