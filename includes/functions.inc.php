<?php

//  LOGIN AND REGISTER PART

function emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwd_confirm) {
    $result = 0;
    if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwd_confirm)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function  invalidUsername($username){
    $result = 0;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result = 0;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwd_confirm) {
    $result = 0;
    if ($pwd !== $pwd_confirm) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function usernameExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersUsername, usersPwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();

}

function emptyInputLogin($username, $pwd) {
    $result = 0;
    if (empty($username) || empty($pwd))
    {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $username, $pwd) {
    $usernameExists = usernameExists($conn, $username, $username);

    if ($usernameExists === false) {
        header("location: ../log-in.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $usernameExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../log-in.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersId"];
        $_SESSION["userusername"] = $usernameExists["usersUsername"];
        $_SESSION["admincheck"] = $usernameExists["usersAdmin"];
        header("location: ../index.php");
        exit();
    }
}

//  CREATE A PRODUCT PART

function createProduct($conn, $title, $price, $image, $quantity, $description, $date, $duration, $rate) {
    $sql = "INSERT INTO products (productsTitle, productsPrice, productsImage, productsQuantity, productsDescription, productsDate, productsDuration, productsRate)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-product.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssssssss", $title, $price, $image, $quantity, $description, $date, $duration, $rate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../create-product.php?error=none");
    exit();
}

function emptyInputCreateProd($title, $price, $quantity, $date, $duration, $rate) {
    $result = 0;
    if (empty($title) || empty($price) || empty($quantity) || empty($date) || empty($duration) || empty($rate))
    {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function productExists($conn, $title, $date) {
    $sql = "SELECT * FROM products WHERE productsTitle = ? AND productsDate = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-product.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $title, $date);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function dateExists($conn, $date) {
    $sql = "SELECT * FROM products WHERE productsDate = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-product.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}