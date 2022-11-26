<?php
    include_once 'header.php';
?>

        <section>
            <div class="form-container">
                <h1 class="login-title">Login</h1>
                <form action="includes/log-in.inc.php" method="post">
                    <div class="login-credentials">
                        <div class="input-field">
                            <label for="username">Username/Email</label><br>
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <input type="text" name="user" placeholder="Enter your username or email"><br>
                        </div>
                        <br><br>
                        <div class="input-field">
                            <label for="password">Password</label><br>
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input type="password" name="pwd" placeholder="Enter your password"><br>
                            <a class="fp-button" href="">Forgot password?</a><br>
                        </div>
                    </div>

                    <button type="submit" class="account-btn" name="submit">LOGIN</button>
                    <p>Or Sign Up Using</p>
                    <a class="register-link" href="register.php">Register</a>
                </form>
                </div>
            </div>

            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Incorrect login information!</p>";
                }
            }

            ?>
        </section>
        

<?php
    include_once 'footer.php';
?>