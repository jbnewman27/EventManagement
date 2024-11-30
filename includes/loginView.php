<?php

if ($_GET["error"]=="emptyinput"){
    echo "<p>Fill in all fields!</p>";
}
else if ($_GET["error"] == "wrongLogin"){
    echo "<p>Incorrect login information!</p>";
}
else if ($_GET["error"] == "wrongPassword"){
    echo "<p>Incorrect password!</p>";
}
else if ($_GET["error"] == "none"){
    echo "<p>You have logged in!</p>";
}
