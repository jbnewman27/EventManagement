<?php

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else {
    echo "<p> Event created successfully!</p>";
    }
}