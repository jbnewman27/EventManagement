<?php
declare(strict_types=1);
function isInputEmpty(string $name,string $username, string $email, string $password, string $role): bool
{
    if(empty($name) || empty($username) || empty($email) || empty($password) || empty($role)){
       return true;
    }
    else{
        return false;
    }
}

function isEmailInvalid(string $email): bool
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}
function isUsernameTaken(object $pdo, string $username): bool
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}
function isEmailTaken(object $pdo, string $email): bool
{
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
function createAdmin($pdo, $name, $username, $email, $password, $role) {
    if (!in_array($role, ['admin', 'event_manager'])) {
        throw new InvalidArgumentException('Invalid role value');
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (name, username, email, password, role) VALUES (:name, :username, :email, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
        'role' => $role
    ]);
}