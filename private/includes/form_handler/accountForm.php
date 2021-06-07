<?php

$error_array = array(); //Holds error messages

//to login the user from register.php
if (isset($_POST['becomeLender'])) {

    $query = $con->prepare("UPDATE users SET lender=1");
    $query->execute();
}

if (isset($_POST['accountEdit'])) {

    //First Name
    $accountFirst = strip_tags($_POST['accountFirst']); //Remove html tags
    $accountFirst = str_replace(' ', '', $accountFirst); //remove spaces
    $accountFirst = ucfirst(strtolower($accountFirst)); //Uppercase first letter

    //Last Name
    $accountLast = strip_tags($_POST['accountLast']); //Remove html tags
    $accountLast = str_replace(' ', '', $accountLast); //remove spaces
    $accountLast = ucfirst(strtolower($accountLast)); //Uppercase first letter

    //Email
    $accountEmail = strip_tags($_POST['accountEmail']); //Remove html tags
    $accountEmail = str_replace(' ', '', $accountEmail); //remove spaces

    //Contact
    $accountContact = strip_tags($_POST['accountContact']); //Remove html tags
    $accountContact = str_replace(' ', '', $accountContact); //remove spaces

    //Contact
    $accountAddress = strip_tags($_POST['accountAddress']); //Remove html tags
    $accountAddress = str_replace(' ', '', $accountAddress); //remove spaces

    //Password
    $accountPassword = strip_tags($_POST['accountPassword']); //Remove html tags
    $accountPassword = str_replace(' ', '', $accountPassword); //remove spaces

    //Confirm Password
    $accountConfirm = strip_tags($_POST['accountConfirm']); //Remove html tags
    $accountConfirm = str_replace(' ', '', $accountConfirm); //remove spaces

    if ($accountConfirm != $accountPassword) {
        array_push($error_array, "Invalid email format<br>");
    }

    if ($accountPassword != NULL) {

        $accountPassword =  md5($accountPassword);

        //DATA: updating the password to new password
        $update_query = $con->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $update_query->bind_param("si", $accountPassword, $user_id);
        $update_query->execute();
        
    }

    if (empty($error_array)) {

        $query = $con->prepare("UPDATE users SET firstName=?, lastName=?, email=?, contact=?, address=? WHERE user_id=?");
        $query->bind_param("sssssi", $accountFirst, $accountLast, $accountEmail, $accountContact, $accountAddress, $user_id);
        $query->execute();
    }
}
