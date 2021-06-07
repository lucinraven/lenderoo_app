<?php
//VARIABLE: error array
$error_array = array();

//INCLUDE: config(database)
require '../../private/config/config.php';
require '../../private/includes/form_handler/changePasswordForm.php';
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
    <div class="mainContainer">
        <!--DIV: Main Change-Password Container-->
        <div class="changeContainer">
            <div class="container">
                <div class="form2">
                    <div class="cheaderContainer">
                        <div class="logoContainer">
                            <img class="logo" src="assets/img/others/logo.png">
                            <h1>CONNECT</h1>
                        </div>
                    </div>
                    <!--FORM: changing password-->
                    <form action="<?php echo 'change-password.php?token=' . $token . ''; ?>" method="post">
                        <h1>Change Password</h1>
                        <div class="input-group">
                            <input value="" type="password" name="newPassword" onkeyup="this.setAttribute('value', this.value);" required>
                            <label>New Password</label>
                            <!--ERROR ARRAY-->
                            <?php if (in_array("Password must be between 6 to 60 characters", $error_array)) {
                                echo "<div class='error'> <i class='fas fa-exclamation-circle fa-fw'></i>
                            <p>Password must be between 6 to 60 characters</p> </div>";
                            } else if (in_array("Password must not be the same as your old password", $error_array)) {
                                echo "<div class='error'> <i class='fas fa-exclamation-circle fa-fw'></i>
                            <p>Password must not be the same as your old password</p> </div>";
                            } ?>
                        </div>
                        <div class="input-group">
                            <input value="" type="password" name="retypePassword" onkeyup="this.setAttribute('value', this.value);" required>
                            <label>Retype Password</label>
                            <!--ERROR ARRAY-->
                            <?php if (in_array("Password don't match", $error_array)) {
                                echo "<div class='error'> <i class='fas fa-exclamation-circle fa-fw'></i>
                            <p>Password don't match</p> </div>";
                            } else if (in_array("Password must contain letters and numbers only", $error_array)) {
                                echo "<div class='error'> <i class='fas fa-exclamation-circle fa-fw'></i>
                            <p>Password must contain letters and numbers only</p> </div>";
                            }; ?>
                        </div>
                        <div class="input-group">
                            <input value="" type="text" name="code" onkeyup="this.setAttribute('value', this.value);" required>
                            <label>Code</label>
                            <!--ERROR ARRAY-->
                            <?php if (in_array("Incorrect Code", $error_array)) {
                                echo "<div class='error'> <i class='fas fa-exclamation-circle fa-fw'></i>
                            <p>Incorrect Code</p> </div>";
                            } ?>
                        </div>
                        <input type="submit" name="changePassword" value="Submit" class="forgot-submit">
                        <div class="btnContainer">
                        <!--BUTTON: to cancel the change password-->
                            <button name="cancelChange"><i class="fas fa-chevron-left"></i><span>Back</span></button>
                        </div>
                    </form>
                </div>
                <figure>
                    <img src="assets/img/others/forgotPassword.png">
                </figure>
            </div>
        </div>
    </div>
</body>

</html>