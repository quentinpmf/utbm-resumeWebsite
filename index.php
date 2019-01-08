<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Magic resume</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/index/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="index.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="assets/index/css/responsive.css" rel="stylesheet">
    <?php session_start(); ?>
</head>

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="colorlib-load"></div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header_area animated">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Menu Area Start -->
            <div class="col-12 col-lg-10">
                <div class="menu_area">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!-- Logo -->
                        <a class="navbar-brand" href="#">Mr.</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Menu Area -->
                        <div class="collapse navbar-collapse" id="ca-navbar">
                            <ul class="navbar-nav ml-auto" id="nav">
                                <li class="nav-item active"><a class="nav-link" href="#home">Accueil</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about">A propos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#features">Fonctionnalités</a></li>
                                <li class="nav-item"><a class="nav-link" href="#team">L'équipe</a></li>
                                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Signup btn -->
            <div class="col-12 col-lg-2">
                <div class="sing-up-button d-none d-lg-block">
                    <?php
                        if(isset($_SESSION['UserEmail']))
                        {
                            echo('<a href="login/logout.php">Déconnexion de '.$_SESSION["UserNom"].'</a>');
                        }
                        else
                        {
                            echo('<a href="login/login.php">Connexion</a>');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Wellcome Area Start ***** -->
<section class="wellcome_area clearfix" id="home">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                <div class="wellcome-heading">
                    <h2>Magic Resume</h2>
                    <h3>M</h3>
                    <p>Tout ce dont vous avez besoin pour créer votre CV facilement.</p>
                </div>
                <div class="get-start-area">
                    <!-- Signup btn -->
                    <div class="col-12 col-lg-2">
                        <div class="to-editor-button">
                            <?php
                            if(isset($_SESSION['UserEmail']))
                            {
                                echo('<a href="editor.html">Accèder à l\'éditeur</a>');
                            }
                            else
                            {
                                echo('<a href="login/register.php">Se lancer</a>');
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome thumb -->
    <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
        <img src="assets/index/img/main_img.png" alt="">
    </div>
</section>
<!-- ***** Wellcome Area End ***** -->

<!-- ***** Special Area Start ***** -->
<section class="special-area bg-white section_padding_100" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading Area -->
                <div class="section-heading text-center">
                    <h2>Pourquoi c'est spécial</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Special Area -->
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="single-icon">
                        <i class="ti-mobile" aria-hidden="true"></i>
                    </div>
                    <h4>Facile d'utilisation</h4>
                    <p>Nous proposons un outil à la portée de tous permettant de réaliser les tâches complexes que l'on voudrait éviter en créant son CV</p>
                </div>
            </div>
            <!-- Single Special Area -->
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-icon">
                        <i class="ti-ruler-pencil" aria-hidden="true"></i>
                    </div>
                    <h4>Puissant design</h4>
                    <p>Nous avons construit un outils complexes regroupant toutes les fonctionnalités dont vous avez besoin lors de la création de votre CV</p>
                </div>
            </div>
            <!-- Single Special Area -->
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                    <div class="single-icon">
                        <i class="ti-settings" aria-hidden="true"></i>
                    </div>
                    <h4>Personnalisation</h4>
                    <p>Le principe de ce site étant de permettre à l'utilisateur personnaliser son CV comme il le souhaite, il pourra déplacer les différents blocs librement et facilement</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Special Description Area -->
    <div class="special_description_area mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="assets/index/img/bg-img/special.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>Nos propositions de designs</h2>
                        <p>Nous vous proposons un certain nombre de modèles pour débuter la création de votre CV. Avec ces modèles, le design sera déja fait et vous pourrez insérer vos données à l'intérieur et si besoin, personnaliser encore plus ce design</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Special Area End ***** -->

<!-- ***** Awesome Features Start ***** -->
<section class="awesome-feature-area bg-white section_padding_0_50 clearfix" id="features">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Heading Text -->
                <div class="section-heading text-center">
                    <h2>Des fonctionnalités extraordinaires</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class="ti-pulse" aria-hidden="true"></i>
                    <h5>Simple et rapide</h5>
                    <p>Notre outil permet de créer votre CV simplement et rapidement grâce a nos modèles de designs.</p>
                </div>
            </div>
            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class="ti-palette" aria-hidden="true"></i>
                    <h5>Perfect Design</h5>
                    <p>Notre outil propose les blocs disponbiles dans un volet à gauche, la personnalisation de style des blocs à droite et au milieu la prévisualisation en direct au centre.</p>
                </div>
            </div>
            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class="ti-user" aria-hidden="true"></i>
                    <h5>Recommandations</h5>
                    <p>Pour vous aider à utiliser le bon lexique et avoir des recommandations de blocs, notre chatbot vous aidera dans l'élaboration de votre CV.</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ***** Awesome Features End ***** -->

<!-- ***** App Screenshots Area Start ***** -->
<section class="app-screenshots-area section_padding_100_70 clearfix" id="screenshot">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>App Screenshots</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- App Screenshots Slides  -->
                <div class="app_screenshots_slides owl-carousel">
                    <div class="single-shot">
                        <img src="assets/index/img/scr-img/app-1.jpg" alt="">
                    </div>
                    <div class="single-shot">
                        <img src="assets/index/img/scr-img/app-2.jpg" alt="">
                    </div>
                    <div class="single-shot">
                        <img src="assets/index/img/scr-img/app-3.jpg" alt="">
                    </div>
                    <div class="single-shot">
                        <img src="assets/index/img/scr-img/app-4.jpg" alt="">
                    </div>
                    <div class="single-shot">
                        <img src="assets/index/img/scr-img/app-5.jpg" alt="">
                    </div>
                    <div class="single-shot">
                        <img src="assets/index/img/scr-img/app-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** App Screenshots Area End *****====== -->

<!-- ***** Client Feedback Area Start ***** -->
<section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="slider slider-for">
                    <!-- Client Feedback Text  -->
                    <div class="client-feedback-text text-center">
                        <div class="client">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <div class="client-description text-center">
                            <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                        </div>
                        <div class="star-icon text-center">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <div class="client-name text-center">
                            <h5>Aigars Silkalns</h5>
                            <p>Ceo Colorlib</p>
                        </div>
                    </div>
                    <!-- Client Feedback Text  -->
                    <div class="client-feedback-text text-center">
                        <div class="client">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <div class="client-description text-center">
                            <p>“ I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                        </div>
                        <div class="star-icon text-center">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <div class="client-name text-center">
                            <h5>Jennifer</h5>
                            <p>Developer</p>
                        </div>
                    </div>
                    <!-- Client Feedback Text  -->
                    <div class="client-feedback-text text-center">
                        <div class="client">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <div class="client-description text-center">
                            <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job.”</p>
                        </div>
                        <div class="star-icon text-center">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <div class="client-name text-center">
                            <h5>Helen</h5>
                            <p>Marketer</p>
                        </div>
                    </div>
                    <!-- Client Feedback Text  -->
                    <div class="client-feedback-text text-center">
                        <div class="client">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <div class="client-description text-center">
                            <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                        </div>
                        <div class="star-icon text-center">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <div class="client-name text-center">
                            <h5>Henry smith</h5>
                            <p>Developer</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Client Thumbnail Area -->
            <div class="col-12 col-md-6 col-lg-5">
                <div class="slider slider-nav">
                    <div class="client-thumbnail">
                        <img src="assets/index/img/bg-img/client-3.jpg" alt="">
                    </div>
                    <div class="client-thumbnail">
                        <img src="assets/index/img/bg-img/client-2.jpg" alt="">
                    </div>
                    <div class="client-thumbnail">
                        <img src="assets/index/img/bg-img/client-1.jpg" alt="">
                    </div>
                    <div class="client-thumbnail">
                        <img src="assets/index/img/bg-img/client-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Client Feedback Area End ***** -->

<!-- ***** CTA Area Start ***** -->
<section class="our-monthly-membership section_padding_50 clearfix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="membership-description">
                    <h2>Notre offre est entièrement gratuite</h2>
                    <p>N'hésitez pas a tester notre outil pour un gain de temps considérable</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                    <a href="#">Se lancer</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** CTA Area End ***** -->

<!-- ***** Our Team Area Start ***** -->
<section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Notre équipe</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-3 col-12 col-md-6 col-lg-3">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="assets/index/img/team-img/team-1.jpg" alt="">
                        <div class="team-hover-effects">
                            <div class="team-social-icon">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-text">
                        <h4>Quentin BOUDINOT</h4>
                        <p>Développeur web</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="assets/index/img/team-img/team-2.jpg" alt="">
                        <div class="team-hover-effects">
                            <div class="team-social-icon">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-text">
                        <h4>Adrien Delcourt</h4>
                        <p>Développeur web</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Our Team Area End ***** -->

<!-- ***** Contact Us Area Start ***** -->
<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Restez en contact avec nous!</h2>
                    <div class="line-shape"></div>
                </div>
                <div class="footer-text">
                    <p>Nous vous enverrons des nouveautés à propos du site, le compte rendu des nouvelles fonctionnalités ainsi que des newsletters, gratuitement!</p>
                </div>
                <div class="address-text">
                    <p><span>Adresse:</span> 12 Rue Thierry Mieg 90000 BELFORT</p>
                </div>
                <div class="phone-text">
                    <p><span>Téléphone:</span> +33-3-22-32-02-58</p>
                </div>
                <div class="email-text">
                    <p><span>Email:</span> info@magic-resume.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Start-->
                <div class="contact_from">
                    <form action="#" method="post">
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <div class="row">
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Your Message *" required></textarea>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <button type="submit" class="btn submit-btn">Envoyer</button>
                                </div>
                            </div>
                        </div>
                        <!-- Message Input Area End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Contact Us Area End ***** -->

<!-- ***** Footer Area Start ***** -->
<footer class="footer-social-icon text-center section_padding_70 clearfix">
    <!-- footer logo -->
    <div class="footer-text">
        <h2>Mr.</h2>
    </div>
    <!-- social icon-->
    <div class="footer-social-icon">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div>
    <div class="footer-menu">
        <nav>
            <ul>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Termes &amp; Conditions</a></li>
                <li><a href="#">Politique</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>
    <!-- Foooter Text-->
    <div class="copyright-text">
        <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
        <p>Copyright ©2017 Ca. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
    </div>
</footer>
<!-- ***** Footer Area Start ***** -->

<!-- Jquery-2.2.4 JS -->
<script src="assets/index/js/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="assets/index/js/popper.min.js"></script>
<!-- Bootstrap-4 Beta JS -->
<script src="assets/index/js/bootstrap.min.js"></script>
<!-- All Plugins JS -->
<script src="assets/index/js/plugins.js"></script>
<!-- Slick Slider Js-->
<script src="assets/index/js/slick.min.js"></script>
<!-- Footer Reveal JS -->
<script src="assets/index/js/footer-reveal.min.js"></script>
<!-- Active JS -->
<script src="assets/index/js/active.js"></script>
</body>

</html>