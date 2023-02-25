<?php
    include_once 'header.php';
    require_once './includes/dbh.inc.php';

    $sql = "SELECT * FROM products";
    $all_product = $conn->query($sql);

?>

<section>
    <div>
        <h1 class="section-title">Movies</h1>
    </div>
    <div class="content-featured">
    <div class="col-1">
        <?php
            while($row = mysqli_fetch_assoc($all_product)) {

        
        ?>
            
            
                <form action="includes/add-to-cart.inc.php" class="box" method="post">
                    <a href="./movie-details.html">
                        <figure>
                            <img src="./assets/images/<?php echo $row["productsImage"]; ?>">
                        </figure> 
                    </a>
                    <p><?php echo $row["productsDate"];  ?></p>
                    <br>
                    <h4><?php echo $row["productsTitle"];  ?></h4>
                    <input type="hidden" name="product_title" value="<?php echo $row["productsTitle"];  ?>">
                    <div>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <data><?php echo $row["productsRate"];  ?></data>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span><?php echo $row["productsDuration"];  ?></span>
                        </div>
                        <div>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                            <data><?php echo $row["productsPrice"];  ?></data>
                            <input type="number" min="1" name="products_qty" value="1" style="width: 50px; 
                            background: black">
                        </div>
                            <button type="submit" class="add-to-cart-btn" name="submit-cart">Add To Cart</button>
                    </div>
                </form>


        <?php

        }
        ?>
        </div>
    </div>

    <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong. Try again!</p>";
                }
                else if ($_GET["error"] == "invalidqty") {
                    echo "<p>The quantity you entered is not in stock!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>Product added to cart!</p>";
                }
            }
    ?>
</section>














<?php
    include_once 'footer.php';
?>