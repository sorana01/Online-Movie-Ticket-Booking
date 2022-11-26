<?php

if (isset($_POST["submit"])) {
    $username = $_POST["user"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !==false) {
        header("location: ../log-in.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../log-in.php");
    exit();
}