<?php
declare(strict_types=1);

function isInputEmpty2(string $name, string $username, string $email, string $password, string $accountType, string $phone)
{
 if (empty($name) || empty($username) || empty($email) || empty($password) || empty($accountType) || empty($phone)) {
  return true;
 } else {
  return false;
 }
}
function isEmailValid(string $email)
{
 if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  return true;
 } else {
  return false;
 }
}
function isUsernameTaken(object $pdo, string $username, string $table)
{
    if (getUsername($pdo, $username, $table)) {
        return true;
    } else {
        return false;
    }
}
function isEmailTaken(object $pdo, string $email, string $table)
    {
        if (getEmail($pdo, $email, $table)) {
            return true;
        } else {
            return false;

        }
    }
function isPhoneNumberValid(string $phone)
{
    if (preg_match("/^[0-9]{10}+$/", $phone)) {
        return true;
    } else {
        return false;
    }
}
function createUser($pdo, $name, $username, $email, $password, $phone)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, username, email, password, phone) VALUES (:name, :username, :email, :password, :phone)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
        'phone' => $phone
    ]);
}
function createAdmin($pdo, $name, $username, $email, $password, $phone) {

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (name, username, email, password, phone) VALUES (:name, :username, :email, :password, :phone)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
        'phone' => $phone
    ]);
}

