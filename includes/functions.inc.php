<?php
 
//  LOGIN AND REGISTER PART

function emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwd_confirm) {
    $result = 0;
    if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($pwd) || empty($pwd_confirm)) {
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
    //user not found in db
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

function createProduct($conn, $title, $director, $price, $image, $quantity, $description, $date, $duration, $rate) {
    $sql = "INSERT INTO products (productsTitle, productsDirector, productsPrice, productsImage, productsQuantity, productsDescription, productsDate, productsDuration, productsRate)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-product.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssssssss", $title, $director, $price, $image, $quantity, $description, $date, $duration, $rate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../create-product.php?error=none");
    exit();
}

function emptyInputCreateProd($title, $director, $date, $duration, $rate) {
    $result = 0;
    if (empty($title) || empty($director) || empty($date) || empty($duration) || empty($rate))
    {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function productExists($conn, $title, $director) {
    $sql = "SELECT * FROM products WHERE productsTitle = ? AND productsDirector = ?;";
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



// SHOPPING CART

function invalidQty($conn, $quantity) {

}

function addToCart($conn, $users_id, $products_id, $quantity) {
    $sql = "INSERT INTO cart (usersId, productsId, cartQty)
             VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-product.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sss", $users_id, $products_id, $quantity);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../movies.php?error=none");
    exit();
}

function searchUserId($conn, $user) {

    $sql = "SELECT usersId FROM users WHERE usersUsername = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../movies.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row["usersId"];
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function searchProductsId($conn, $title) {
    $sql = "SELECT productsId FROM products WHERE productsTitle = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../movies.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $title);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row["productsId"];
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function updateQty($conn, $cart_id, $new_quantity) {
    $sql = "UPDATE cart SET cartQty=? WHERE cartId=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $new_quantity, $cart_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function deleteProduct($conn, $cart_id) {
    $sql = "DELETE FROM cart WHERE cartId=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cart_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function deleteAllProducts($conn, $users_id) {
    $sql = "DELETE FROM cart WHERE usersId=? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    
    }
   
    mysqli_stmt_bind_param($stmt, "s", $users_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// ORDER

function placeOrder($conn, $user_id) {
    $sql = "INSERT INTO orders(usersId, productsId, cartQty) SELECT usersId, productsId, cartQty FROM cart WHERE usersId = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function subtractProduct($conn, $product_qty, $cart_qty, $user_id) {
    $result = $product_qty - $cart_qty;
    $sql = "UPDATE products INNER JOIN cart ON products.productsId = cart.productsId SET products.productsQuantity =  ?   WHERE usersId=? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cart.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $result, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}