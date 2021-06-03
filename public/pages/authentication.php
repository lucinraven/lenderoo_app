<?php

/** 
 * User: Jester Robin <>
 *       Zaira Mundo <zairajune@gmail.com> 
 * Date: 4/23/2021
 * Time: 11:36 PM
 */

/**
 * TODO: Forgot Password
 * TODO: Change Password
 * TODO: Add Cookie
 */

require '../../private/config/config.php';
require '../../private/includes/form_handler/signinForm.php';
require '../../private/includes/form_handler/signupForm.php';
require '../../private/includes/form_handler/forgotPasswordForm.php';
require '../../private/includes/form_handler/changePasswordForm.php';

if (isset($_POST['signupBtn'])) {
    echo "
    <script type='text/javascript'>
        $(document).ready(function () {
        
            $('#slideBox').animate({
                'marginLeft': '0'
            });
            $('.topLayer').animate({
                'marginLeft': '100%'
            });
            document.title = 'Sign Up | Lenderoo'; 
            });

        });
      
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/mainStylesheet.css" />
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

    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
</head>

<body>
    <!-- NAVIGATION BAR-->
    <header class="main-header dark-theme">
        <ul class="header-options">
            <div class="nav-left">
                <li class="title">
                    <a class="navbar-brand" href="../pages/index.php">
                        <b>Lenderoo</b>
                    </a>
                </li>
                <li class="option"><a href="../pages/browser.php">Browse by Product</a></li>
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
                <li class="option"><a href="../pages/account-tabs.php"><i class="fas fa-bell"></i></a></li>
                <li class="option"><a href="../pages/account-tabs.php"><i class="fas fa-bookmark"></i></a></li>
                <li class="option"><a href="../pages/inbox-messenger.php"><i class="fas fa-inbox"></i></a></li>
                <li class="option"><a href="../pages/add-cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<li class="option"><a href="../pages/user-account.php">User Account</a></li>';
                } else {
                    echo '<li class="option"><a href="../pages/authentication.php">Login</a></li>';
                }
                ?>
            </div>
        </ul>
    </header>

    <div class="authentication-page">
        <div id="back">
            <div class="backRight"></div>
            <div class="backLeft"></div>
        </div>

        <div id="slideBox">
            <div class="topLayer">
                <!-- SIGN UP FORM -->
                <div class="left">
                    <div class="content">
                        <h2 class="left-heading">Sign Up</h2>

                        <div class="form-container">
                            <form method='post' action='authentication.php'>
                                <!-- FirstName input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="signup_firstName" class="form-control" />
                                    <label class="form-label">First Name</label>
                                </div>

                                <!-- FirstName input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="signup_lastName" class="form-control" />
                                    <label class="form-label">Last Name</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="signup_email" class="form-control" />
                                    <label class="form-label">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="signup_password" class="form-control" />
                                    <label class="form-label">Password</label>
                                </div>

                                <!-- Contact input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="signup_contact" class="form-control" />
                                    <label class="form-label">Contact</label>
                                </div>
                                <!-- Submit button -->
                                <input type="submit" name="signupBtn" class="btn btn-primary btn-block" value="Sign Up">
                            </form>
                        </div>

                        <button id="goLeft" class="off">Have an account? Sign in</button>
                    </div>
                </div>
                <!-- END OF SIGN UP FORM -->

                <!-- SIGN IN FORM -->
                <div class="right">
                    <div class="content">
                        <h2 class="right-heading">Sign In</h2>

                        <div class="form-container">
                            <form method='post'>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="signin_email" class="form-control" />
                                    <label class="form-label">Email address</label>
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="signin_password" class="form-control" />
                                    <label class="form-label">Password</label>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" name="signinBtn" class="btn btn-primary btn-block" value="Signin">Sign in</button>
                            </form>
                        </div>

                        <div class="forgot-password-ctn">
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal"> Forgot Password </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                        </div>
                                        <div class="modal-body">Please enter the email address for your account. A verication code will be sent to you. Once you have recieved
                                            the verification code. You will be able to choose a new password for your password.</div>
                                        <form method='post'>
                                            <div class="form-outline mb-4">
                                                <input type="text" class="form-control" />
                                                <label class="form-label">Email Address</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close </button>
                                                <button type="button" class="btn btn-primary">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button id="goRight" class="off">Not registered yet? Sign up</button>
                        </div>

                    </div>
                </div>
                <!-- END OF SIGN IN FORM -->
            </div>
        </div>
    </div>

</body>

<script type="text/javascript" src="../js/entry.js"></script>
<script type="module" src="../../js/main.js"></script>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</html>