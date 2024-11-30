<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

session_set_cookie_params(
    [
        'lifetime' => 1500,
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
    ]
);
session_start();

$interval = 60 * 25;
if (isset($_SESSION["adminID"])) {

    if (!isset($_SESSION["last_active"]) || time() - $_SESSION["last_active"] >= $interval) {
        regenerateSessionID();
    }
} else {
    if (!isset($_SESSION["last_active"]) || time() - $_SESSION["last_active"] >= $interval) {
        regenerateSessionID();
    }
}

function regenerateSessionID()
{
    session_regenerate_id(true);
    $_SESSION["last_active"] = time();
}