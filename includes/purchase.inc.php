<?php


session_start();


if (isset($_POST["update_cart"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $cart_id = $_POST["cart_id"];
    $new_quantity = $_POST["cart_quantity"];


    updateQty($conn, $cart_id, $new_quantity);

}

else if (isset($_POST["delete_product"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $cart_id = $_POST["cart_id"];


    deleteProduct($conn, $cart_id);

}


else if (isset($_POST["delete_all"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $users_id = $_POST["users_id"];

    deleteAllProducts($conn, $users_id);

}



else if (isset($_POST["submit-buy"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $users_id = $_POST["users_id"];
    $product_qty = $_POST["product_qty"];
    $cart_qty = $_POST["cart_quantity"];


    placeOrder($conn, $users_id);
    //subtractProduct($conn, $product_qty, $cart_qty, $users_id);
    deleteAllProducts($conn, $users_id);
    

}

else {
    header("location: ../cart.php");
    exit();
}
