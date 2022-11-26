<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cinema Aventura</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
        <style>
        <?php include './assets/css/style.css'; 
        ?>
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="head">
                    <img src="./assets/images/Cinema.png" width="200px">
                    <nav class="nav-header">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="movies.php">Movies</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <?php 
                                if (isset($_SESSION["userusername"])) {
                                    if ($_SESSION["admincheck"]==1) {
                                    echo "<li><a href='create-product.php'>Add a Movie</a></li>";
                                    echo "<li><a href='includes/log-out.inc.php'>Log Out</a></li>";
                                    }
                                    else {
                                        echo "<li><a href='includes/log-out.inc.php'>Log Out</a></li>";
                                        echo "<li><a href='cart.php'><img src='./assets/images/cart5.png' width='30px' height='30px'></a></li>";
                                    }
                                }
                                else {
                                    echo "<li><a href='log-in.php'>Log In</a></li>";
                                    echo "<li><a href='cart.php'><img src='./assets/images/cart5.png' width='30px' height='30px'></a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>