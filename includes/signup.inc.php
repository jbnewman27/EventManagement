<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    try{
        require_once "dbh.inc.php";
        require_once "signup_model.php";
        require_once "signup_contr.php";

        if (isInputEmpty($name, $username, $email, $password, $role)){
            header("location: ../signup_view.php?error=emptyinput");
            exit();
        }
        if(isEmailInvalid($email)){
            header("location: ../signup_view.php?error=invalidemail");
            exit();
        }
        if(isUsernameTaken($pdo, $username)){
            header("location: ../signup_view.php?error=usernametaken");
            exit();
        }
        if (isEmailTaken($pdo, $email)){
            header("location: ../signup_view.php?error=emailtaken");
            exit();
        }

        createAdmin($pdo, $name, $username, $email, $password, $role);
        header("Location: ../index.php?error=none");
        $pdo = null;
        $stmt = null;

    }
    catch(PDOException $e){
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
}
else{
    header("location: ../signup_view.php");
    exit();
}
