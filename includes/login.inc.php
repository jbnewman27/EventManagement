<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST["name"];
    $pwd = $_POST["password"];
    try {
        require_once "dbh.inc.php";
        require_once "loginModel.php";
        require_once "loginContr.php";

        if (isInputEmpty($username, $pwd)) {
            header("location: ../login.php?error=emptyinput");
            die();
        }
        $result = getAdmin($pdo, $username);

        if (isUsernameWrong($result, $username)) {
            header("location: ../login.php?error=wronglogin");
            die();
        }
        if (!isPasswordCorrect($pwd, $result['password'])) {
            header("location: ../login.php?error=wrongpassword");
            die();
        }

        $_SESSION["adminID"] = $result["adminID"];
        header("location: ../dashboard.php?error=none");
        $pdo = null;
        die();
    }
   catch (PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
}
else {
    header("location: ../login.php");
    die();
}