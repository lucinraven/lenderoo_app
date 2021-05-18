<?php

/** 
 * User: Zaira Mundo <zairajune@gmail.com>
 * Date: 4/23/2021
 * Time: 11:07 PM
 */

use app\core\Application;
use app\models\User;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/mainStylesheet.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <!-- MDBootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />
    <!-- Normalize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>

    <!---JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <title><?php echo $this->title ?></title>
</head>

<body>
    <!-- NAVIGATION BAR-->
    <header class="main-header dark-theme">
        <ul class="header-options">
            <div class="nav-left">
                <li class="title">
                    <a class="navbar-brand" href="/">
                        <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="30" alt="" loading="lazy" />
                    </a>
                </li>
                <li class="option"> <a href="/browser">Browse by Product</a></li>
                <li class="option"> Lorem </li>
            </div>

            <div class="nav-center">
                <div class="form-outline text-white">
                    <input type="search" id="form1" class="form-control" />
                    <label class="form-label" for="form1">Search</label>
                </div>

                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <div class="nav-right">
                <li class="option"><a href="/account-tabs"><i class="fas fa-bell"></i></a></li>
                <li class="option"><a href="/account-tabs"><i class="fas fa-bookmark"></i></a></li>
                <li class="option"><a href="/inbox-messenger"><i class="fas fa-inbox"></i></a></li>
                <li class="option"><a href="/add-cart"><i class="fas fa-shopping-cart"></i></a></li>
                <?php if (Application::isGuest()) : ?>
                    <li class="option"><a href="/entry">Sign In</a></li>
                <?php else : ?>

                    <li class="option"><a href="/user-account">User Account</a></li>
                    <li class="option"><a href="/logout"><?php echo (new User)->getDisplayName() ?>(Logout)</a></li>
                <?php endif; ?>
            </div>
        </ul>
    </header>

    <div class="main-body-ctn">
        <?php if (Application::$app->session->getFlash('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?php echo Application::$app->session->getFlash('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        {{content}}
    </div>

    <!-- FOOTER -->
    <footer class="bg-custom text-center text-white">
        <!-- Grid container -->
        <!-- Section: Form -->
        <div class="box_form">
            <form action="">
                <!--Grid row-->
                <div class="row justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="subscribe-input">
                            <input type="email" id="form5Example2" class="form-control" placeholder="Enter Email"> 
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-light">
                            Subscribe
                        </button>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </div>

        <!-- Section: Form -->
        <div class="container p-4">
            <!-- Section: Links -->

            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Company</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">About Us</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Advertising</a>
                            </li>
                            <li>
                                <a href="/lender/terms-and-condition" class="text-white">Terms of Use</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Rent with Us</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Your Account</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Your Order</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Your Adresses</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Your Lists</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Language</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">English</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Arabic</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Support</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Help</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>

            <!-- Section: Social media -->
            <section class="mb-4 soc_med_loc">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>

            <!-- Section: Social media -->
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(41,41,41);">
            © 2021 Copyright:
            <a class="text-white" href="#">Lenderoo.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>

<script type="module" src="/js/main.js"></script>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</html>