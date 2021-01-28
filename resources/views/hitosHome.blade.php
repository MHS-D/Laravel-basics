<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>HITOS | Home</title>
        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="container">
                <nav>
                    {{-- {{$value=session('client')}} --}} 
                    <div class="nav-brand">
                        <a href="index.html">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>

                    <div class="menu-icons open">
                        <i class="fas fa-bars"></i>
                    </div>

                    <ul class="nav-list active">
                        <div class="menu-icons close">
                            <i class="fas fa-bars"></i>
                        </div>
                        <li class="nav-item">
                            <a href="#home" class="nav-link current">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pricing" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="#testimonials" class="nav-link">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn-main">Sign Up</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <!-- Hero -->
            <section id="home" class="hero">
                <div class="container">
                    <div class="main-message">
                        <h3>The great outdoor</h3>
                        <h1>Adventure</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, laborum id ex nulla perspiciatis itaque quia placeat deserunt atque praesentium, repellendus nostrum culpa eos eveniet qui quasi in dolorum quos?</p>
                        
                        <div class="cta">
                            <a href="#" class="btn-main">Sign Up Now</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pricing -->
            <section id="pricing" class="pricing">
                <div class="container">
                    <div class="title-heading">
                        <!-- <h3>Experience</h3> -->
                        <h1>PRICING</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="pricing-grid">
                        <!-- Grid item #1 -->
                        <div class="pricing-grid-item star-gazing">
                            <i class="star"></i>
                            <h1>Basic Plan</h1>
                            <u>
                                <li>First</li>
                                <li>First</li>
                                <li>First</li>
                            </u>
                        </div>
                        <!-- Grid item #2 -->
                        <div class="pricing-grid-item hiking">
                            <i class="compas"></i>
                            <h1>Silver Plan</h1>
                            <u>
                                <li>First</li>
                                <li>First</li>
                                <li>First</li>
                            </u>
                        </div>
                        <!-- Grid item #3 -->
                        <div class="pricing-grid-item camping">
                            <i class="bonfire"></i>
                            <h1>Golden Plan</h1>
                            <u>
                                <li>First</li>
                                <li>First</li>
                                <li>First</li>
                            </u>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section id="testimonials" class="testimonials">
                <div class="container">
                    <div class="title-heading">
                        <!-- <h3>Experience</h3> -->
                        <h1>Testimonials</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="testimonial">
                        <div class="testimonial-text-box">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius consequatur autem, rerum ipsam repellat quibusdam praesentium facilis molestias odit rem placeat, nisi voluptatibus esse recusandae culpa. Nisi optio iusto fuga!</p>
                            <i class="quote"></i>
                        </div>

                        <div class="testimonial-customer">
                            <img src="assets/img/profile_1.png" alt="">
                            <h1>Martin G.</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About -->
            <section id="about" class="begin-avdenture">
                <div class="container">
                    <div class="title-heading">
                        <h1>About Us</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="mx-5">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque eveniet, ea, corrupti repudiandae laudantium porro facilis vitae commodi rerum deserunt ratione fugiat quaerat quasi dolores inventore, quia magnam et aliquid?</p>
                    </div>

                    <a href="#" style="display: block; margin: 0 auto; width: fit-content; max-width: 150px; text-align: center;" class="btn-main">Sign Up Now</a>
                </div>
            </section>

            <!-- Steps -->
            <section id="steps" class="steps">
                <div class="container">
                    <div class="title-heading">
                        <h1>Steps</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="steps-grid">
                        <!-- Grid item #1 -->
                        <div class="steps-grid-item">
                            <img src="assets/img/avatar.svg">
                            <h1>Step 1</h1>
                        </div>
                        <!-- Grid item #2 -->
                        <div class="steps-grid-item">
                            <img src="assets/img/avatar.svg">
                            <h1>Step 2</h1>
                        </div>
                        <!-- Grid item #3 -->
                        <div class="steps-grid-item">
                            <img src="assets/img/avatar.svg">
                            <h1>Step 3</h1>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <p>&copy; 2021 HITOS. All rights reserved.</p>
        </footer>
    </body>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</html>
