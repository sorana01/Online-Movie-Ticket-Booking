<?php
    include_once 'header.php';
?>
 
        <section>
            <div class="form-container product-form">
                <h1 class="register-title">Add a Movie</h1>
                <form action="includes/create-product.inc.php" method="post" enctype="multipart/form-data">
                        <div class="login-credentials product-form">
                            <div class="input-field">
                                <label for="title">Name</label><br>
                                <input type="text" name="title"><br>
                            </div>
                            <div class="input-field">
                                <label for="price">Director</label><br>
                                <input type="text" name="director"><br>
                            </div>
                            <div class="input-field">
                                <label for="description">Description</label><br>
                                <input type="text" name="description" style="height:140px"><br>
                            </div>
                            <div class="input-field">
                                <label for="date">Streaming Date</label><br>
                                <input type="datetime-local" name="date"><br>
                            </div>
                            <div class="input-field">
                                <label for="image">Poster</label><br>
                                <input type="file" name="image"><br>
                            </div>
                            <div class="input-field">
                                <label for="duration">Duration</label><br>
                                <input type="time" name="duration"><br>
                            </div>
                            <div class="input-field">
                                <label for="rate">Rate</label><br>
                                <input type="number" step="0.1" name="rate"><br>
                            </div>
                        </div>
                    
                        <button type="submit" class="register-btn" name="submit-product">ADD MOVIE</button>
                </form>
            </div>
            
            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "dateexists") {
                    echo "<p>A movie is already streaming at that date and time!</p>";
                }
                else if ($_GET["error"] == "productexists") {
                    echo "<p>This movie already exists!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong. Try again!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>New movie successfully registered!</p>";
                }
            }
            ?>
        </section>


<?php
    include_once 'footer.php';
?>