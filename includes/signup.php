<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $accountType = $_POST["accountType"];
    $phone = $_POST["phone"];
    if ($accountType == "user") {
        $table = "users";
    } elseif ($accountType == "eventManager") {
        $table = "admins";
    }

    try {
        require_once "dbh.inc.php";
        require_once "signupModel.php";
        require_once "signupController.php";

        if (isInputEmpty2($name, $username, $email, $password, $accountType, $phone)) {
            header("location: ../signup_view.php?error=emptyinput");
            exit();
        }
        if(!isEmailValid($email)){
            header("location: ../signupView.php?error=invalidemail");
            exit();
        }
        if(isUsernameTaken($pdo, $username, $table)){
            header("location: ../signupView.php?error=usernametaken");
            exit();
        }
        if (isEmailTaken($pdo, $email, $table)) {
            header("location: ../signupView.php?error=emailtaken");
            exit();
        }
        if (!isPhoneNumberValid($phone)) {
            header("location: ../signupView.php?error=invalidphonenumber");
            exit();
        }
        if ($accountType == "user") {
            createUser($pdo, $name, $username, $email, $password, $phone);
            header("location: ../displayUserEventList.php?error=none");
        } elseif ($accountType == "eventManager") {
            createAdmin($pdo, $name, $username, $email, $password, $phone);
            header("location: ../login.php?error=none");
        } else {
            header("location: ../signupView.php?error=invalidaccounttype");
            die();
        }

    }
    catch (PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
} else {
    header("location: ../signupView.php");
    exit();
}

