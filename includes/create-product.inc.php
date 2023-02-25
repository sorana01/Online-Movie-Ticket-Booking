<?php

if (isset($_POST["submit-product"])) {
    $title = $_POST["title"]; 
    $director = $_POST["director"];
    $price = $_POST["price"]; 
    $quantity = $_POST["quantity"];
    $image1 = $_FILES["image"]["name"];
    $dst = "WAD\Online-Movie-Ticket-Booking\product_image".$image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $dst);
    $description = $_POST["description"];
    $date = $_POST["date"];
    $duration = $_POST["duration"]; 
    $rate = $_POST["rate"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputCreateProd($title, $director, $date, $duration, $rate) !==false) {
        header("location: ../create-product.php?error=emptyinput");
        exit();
    }

    if (dateExists($conn, $date) !==false) {
        header("location: ../create-product.php?error=dateexists");
        exit();
    }

    if (productExists($conn, $title, $director) !== false) {
        header("location: ../create-product.php?error=productexists");
        exit();
    }

    createProduct($conn, $title, $director, 6, $image1, 150, $description, $date, $duration, $rate);
}
else {
    header("location: ../create-product.php");
    exit();
}
