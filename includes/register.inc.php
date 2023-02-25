<?php
 
if (isset($_POST["submit-register"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"]; 
    $email = $_POST["email"];
    $username = $_POST["user"];
    $pwd = $_POST["pwd"];
    $pwd_confirm = $_POST["pwd_confirm"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwd_confirm) !==false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !==false) {
        header("location: ../register.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !==false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwd_confirm) !==false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    if (usernameExists($conn, $username, $email) !==false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fname, $lname, $email, $username, $pwd);
}
else {
    header("location: ../register.php");
    exit();
}
