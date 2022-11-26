<?php

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $price = $_POST["price"]; 
    $quantity = $_POST["quantity"];
    $image = $_POST["image"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $duration = $_POST["duration"];
    $rate = $_POST["rate"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputCreateProd($title, $price, $quantity, $description, $date, $duration, $rate) !==false) {
        header("location: ../create-product?error=emptyinput");
        exit();
    }

    if (dateExists($conn, $date) !==false) {
        header("location: ../create-product?error=dateexists");
        exit();
    }

    if (productExists($conn, $title, $date) !== false) {
        header("location: ../create-product?error=productexists");
        exit();
    }

    createProduct($conn, $title, $price, $quantity, $image, $description, $date, $duration, $rate);
}
else {
    header("location: ../create-product");
    exit();
}
