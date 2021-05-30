<?php
//to login the user from register.php
if (isset($_POST['becomeLender'])) {

    $query = $con->prepare("UPDATE users SET lender=1");
    $query->execute();

}
