<?php
    include_once 'header.php';
?>

        <section>
            <div class="form-container">
                <h1 class="register-title">Register</h1>
                <form action="includes/register.inc.php" method="post">
                    <div class="login-credentials">
                        <div class="input-field">
                            <label for="fname">First Name</label><br>
                            <input type="text" name="fname"><br>
                        </div>
                        <div class="input-field">
                            <label for="lname">Last Name</label><br>
                            <input type="text" name="lname"><br>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label><br>
                            <input type="email" name="email"><br>
                        </div>
                        <div class="input-field">
                            <label for="username">Username</label><br>
                            <input type="text" name="user"><br>
                        </div>
                        <div class="input-field">
                            <label for="password">Password</label><br>
                            <input type="password" name="pwd"><br>
                        </div>
                        <div class="input-field">
                            <label for="password-confirm">Confirm Password</label><br>
                            <input type="password" name="pwd_confirm"><br>
                        </div>
                    </div>
                    
                        <button type="submit" class="register-btn" name="submit-register">CREATE ACCOUNT</button>
                </form>
                </div>
            </div>
            
            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidusername") {
                    echo "<p>Choose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Choose a proper email!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords don't match!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong. Try again!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already taken!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>New account successfully registered!</p>";
                }
            }
            ?>
        </section>


<?php
    include_once 'footer.php';
?>