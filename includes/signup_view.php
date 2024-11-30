<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
    }
    else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
    }
    else if ($_GET["error"] == "emailtaken") {
        echo "<p>Email already taken!</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
    }



}