<?php

declare(strict_types=1);
function getAdmin($pdo, $username)
{
    $query = "SELECT * FROM admins WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getUser($pdo, $username)
{
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getAccount($pdo, string $username, string $accountType)
{
    if($accountType == "user"){
        return getUser($pdo, $username);
    }
    else{
        return getAdmin($pdo, $username);
    }
}