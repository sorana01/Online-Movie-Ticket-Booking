<?php
    include_once 'header.php';
?>

        <section>
            <div class="main">
            <?php
                if (isset($_SESSION["userusername"])) {
                    echo "<p>Hello, " . $_SESSION["userusername"] . "</p>";
                }
            ?>
                <div class="picture">
                    <img src="./assets/images/cover1.jpg">
                </div>
                <div class="text">
                    <h2>One Ticket,<br>Unlimited Worlds</h2>
                    <p>Enter the fascinating world of cinema at just one ticket away.</p>
                </div>
                <div class="btn">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <a href="movies.html"> &nbsp Get Yours Now</a>
                </div>
            </div>
        </section>

        <!----director of the week-->
        <section>
            <div class="director">
                <div>
                    <h1 class="section-title">Director of the Week</h1>
                </div>
                <div class="content-director">
                    <div class="director-image">
                        <img src="./assets/images/antonioni1.jpg" width="300%">
                    </div>
                    <div class="director-text">
                        <div class="director-title">
                            <h2>Michelangelo Antonioni</h2>
                        </div>
                        <p>Michelangelo Antonioni (29 September 1912 – 30 July 2007) was an Italian filmmaker. He is best known for directing his "trilogy on modernity and its discontents" —L'Avventura (1960), La Notte (1961), and L'Eclisse (1962)— as well as the English-language film Blow-up (1966), all considered masterpieces of world cinema. <br> <br>
                            His films have been described as "enigmatic and intricate mood pieces" that feature elusive plots, striking visual composition, and a preoccupation with modern landscapes. His work substantially influenced subsequent art cinema. Antonioni received numerous awards and nominations throughout his career, being the only director to have won the Palme d'Or, the Golden Lion, the Golden Bear and the Golden Leopard.</p>
                        <div class="director-btn">
                            <a href="https://en.wikipedia.org/wiki/Michelangelo_Antonioni">
                                <button role="button">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!----featured movies-->
        <section>
                <div class="section1">
                        <div>
                            <h1 class="section-title">Featured Movies</h1>
                        </div>
                        <div class="content-featured">
                            <div class="col-1">
                                <a href="./movie-details.html">
                                    <figure>
                                        <img src="./assets/images/aventura.jpg">
                                    </figure>
                                </a>
                                <p>Thursday, 24th of November, 18:00</p>
                                <br>
                                <h4>L'avventura</h4>
                                <div>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <data>7.8</data>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>2 h 25 min</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        <data>5.99</data>
                                        <a href="cart.html"><button role="button">Add to Cart</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <a href="./movie-details.html">
                                    <figure class="card-banner">
                                        <img src="./assets/images/blow-up.jpg">
                                    </figure>
                                </a>
                                <p>Friday, 25th of November, 18:00</p>
                                <br>
                                <h4>Blow-Up</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <data>7.5</data>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>1 h 51 min</span>
                                </div>
                                <div>
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                    <data>5.99</data>
                                    <a href="cart.html"><button role="button">Add to Cart</button></a>                                
                                </div>
                            </div>
                            <div class="col-1">
                                <a href="./movie-details.html">
                                    <figure class="card-banner">
                                        <img src="./assets/images/noaptea.jpg">
                                    </figure>
                                </a>
                                <p>Saturday, 26th of November, 18:00</p>
                                <br>
                                <h4>La Notte</h4>
                                <div>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <data>8</data>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>2 h 2 min</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        <data>5.99</data>
                                        <a href="cart.html">
                                            <button role="button">Add to Cart</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-featured">
                            <a href="movies.html">
                                <button role="button">See All Movies</button>
                            </a>
                        </div>
                </div>
        </section>

        <!--more directors-->
        <section>
            <div class="directors-more">
                <div>
                    <h1 class="section-title">More Directors like this</h1>
                </div>
                <div class="content-featured">
                    <div class="col-1">
                        <a href="https://en.wikipedia.org/wiki/Roberto_Rossellini"><img src="./assets/images/rossellini.jpg"></a>
                        <h2>Roberto Rossellini</h2>
                    </div>
                    <div class="col-1">
                        <a href="https://en.wikipedia.org/wiki/Federico_Fellini"><img src="./assets/images/fellini.jpg"></a>
                        <h2>Federico Fellini</h2>
                    </div>
                    <div class="col-1">
                        <a href="https://en.wikipedia.org/wiki/Luchino_Visconti"><img src="./assets/images/visconti.jpg"></a>
                        <h2>Luchino Visconti</h2>
                    </div>
                </div>
            </div>
        </section>

        <!--newsletter section-->
        <section>
            <div class="newsletter">
                <form action="">
                    <i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>
                    <span class="newsletter-title">
                        Join Our Newsletter
                    </span>
                    <br><br><br>
                    <p>Be reminded whenever new movies are added.</p>
                    <br><br>
                    <div class="email-box">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <input class="e-box" type="email" name="" placeholder="Enter yout email">
                        <button class="e-btn" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </section>

<?php
    include_once 'footer.php';
?>