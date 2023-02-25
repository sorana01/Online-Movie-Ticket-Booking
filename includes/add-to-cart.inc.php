<?php


session_start();


if (isset($_POST["submit-cart"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $user = $_SESSION["userusername"];
    $users_id = searchUserId($conn, $user);
    $title = $_POST["product_title"];
    $products_id = searchProductsId($conn, $title);
    $quantity = $_POST["products_qty"];


    /*if (invalidQty($conn, $quantity) !== false) {
        header("location: ../movies.php?error=invalidqty");
        exit();
    }*/

    addToCart($conn, $users_id, $products_id, $quantity);

}
else {
    header("location: ../movies.php");
    exit();
}