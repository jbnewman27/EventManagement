<?php

declare(strict_types=1);

function isInputEmpty(string $username, string $password): bool
{
    if(empty($username) || empty($password)){
        return true;
    }
    else{
        return false;
    }
}

function isUsernameWrong(bool|array $result){
    if(!$result){
        return true;
    }
    else{
        return false;
    }
}
function isPasswordCorrect(string $password, string $hashedPassword): bool
{
    return password_verify($password, $hashedPassword);
}