<?php

/** 
 * User: Zaira Mundo <zairajune@gmail.com>
 * Date: 4/23/2021
 * Time: 11:07 PM
 */
require '../../private/config/config.php'
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
                <li><a href="../pages/browser.php">Browse by Product</a></li>
            </div>

            <form class="nav-center"  action="../pages/browser.php" method="POST">
                <div class="form-outline text-white">
                    <input type="search" id="form1" name="searchStr" class="form-control" />
                    <label class="form-label" for="form1">Search</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="nav-right">
                <li class="option"><a href="../pages/account-tabs.php"><i class="fas fa-bookmark"></i></a></li>
                <li class="option"><a href="../pages/inbox-messenger.php"><i class="fas fa-inbox"></i></a></li>
                <li class="option"><a href="../pages/add-cart.php"><i class="fas fa-shopping-cart"></i></a></li>

                <?php if (isset($_SESSION['email'])) {
                    echo '
                    <div class="dropdown">
                    <button class="btn drop-btn">' . $_SESSION["email"] . '</button>
                    <div class="dropdown-content">
                        <a href="user-account.php">My Account</a>
                        <a href="../includes/logout.php">Logout</a>
                    </div>
                </div>';
                } else {
                    echo '<a href="authentication.php" class="btn btn-primary">Login</a>';
                }
                ?>
            </div>
        </ul>
    </header>