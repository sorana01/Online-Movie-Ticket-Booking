<?php
    include_once 'header.php';

    require_once './includes/dbh.inc.php';
    require_once './includes/functions.inc.php';

    $user = $_SESSION['userusername'];
    $users_id = searchUserId($conn, $user);
    $grand_total = 0;
    $sql = "SELECT * FROM cart INNER JOIN products 
        ON cart.productsId = products.productsId
        WHERE usersId = $users_id";
    $all_product = $conn->query($sql);

?>

<section>
    <div>
        <h1 class="section-title">Shopping Cart</h1>
    </div>
    <form action="includes/purchase.inc.php" method="post">
    <div class="shopping-cart">
        <table>
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($all_product)) {

            
                ?>
                    <tr>
                        <td><img src="./assets/images/<?php echo $row["productsImage"]; ?>" height="220"></td>
                        <td><?php echo $row["productsTitle"]; ?></td>
                        <td><?php echo $row["productsPrice"]; ?>/-</td>
                            <td>
                                    <input type="hidden" name="cart_id" value="<?php echo $row["cartId"]; ?>">
                                    <input type="hidden" name="users_id" value="<?php echo $row["usersId"]; ?>">
                                    <input type="hidden" name="product_qty" value="<?php echo $row["productsId"]; ?>">
                                    <input type="number" min="1" name="cart_quantity" color="black" value="<?php echo $row["cartQty"]; ?>" style="width: 100px; 
                                background: black">
                                    <input type="submit" name="update_cart" value="update" class="option-btn" style="width: 70px; 
                                background: green">
                                    <input type="hidden" name="product_id" value="<?php echo $row["productsId"];  ?>">
                                    <input type="hidden" name="cart_id" value="<?php echo $row["cartId"];  ?>">
                                
                            </td>
                            <td>$<?php echo $sub_total = ($row["productsPrice"] * $row["cartQty"]); ?>/-</td>
                            <td><button type="submit" name="delete_product">Remove</button></td>
                    </tr>            
                

                <?php
                    $grand_total += $sub_total;
                    };
                ?>

                    <tr class="table-bottom">
                            <td colspan="4">GRAND TOTAL: </td>
                            <td><?php echo $grand_total; ?>/-</td>
                            
                                <td><button type="submit" name="delete_all">Delete All</button></td>
                            
                    </tr>   

            </tbody>
        </table>

    <br><br><br>
   
    <button type="submit" class="purchase-btn" name="submit-buy">Finish Order</button>
    </div>

    
    
    </form>
    
   

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