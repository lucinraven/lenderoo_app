<?php

if (isset($_GET['token'])) {

    //VARIABLE: token
    $token = $_GET['token'];

    $token_check = $con->prepare("SELECT token FROM password_token WHERE token=?");
    $token_check->bind_param("s", $token);
    $token_check->execute();

    $result = $token_check->get_result();

    //Count the number of rows returned
    $num_rows = $result->num_rows;

    //IF: token matches password_token.token
    if ($num_rows == 1) {

        //DATA: get userid
        $user_check = $con->prepare("SELECT user_id FROM password_token WHERE token=?");
        $user_check->bind_param("s", $token);
        $user_check->execute();

        $result = $user_check->get_result();
        $user_id = $result->fetch_assoc();

        //IF: 'changePassword' button is pressed
        if (isset($_POST['changePassword'])) {

            //DATA: get existing password
            $oldPassword_check = $con->prepare("SELECT password FROM users WHERE user_id=?");
            $oldPassword_check->bind_param("i", $user_id);
            $oldPassword_check->execute();

            $result = $oldPassword_check->get_result();
            $oldPassword = $result->fetch_assoc();

            //VARIABLE: newpassword, retypepassword, code
            $newpassword = $_POST['newPassword'];
            $retypepassword = $_POST['retypePassword'];
            $code = $_POST['code'];

            //IF: newpassword matches the retypassword
            if ($newpassword == $retypepassword) {
                //IF: code matches the password_token.codes

                $code_check = $con->prepare("SELECT codes FROM password_token WHERE codes=?");
                $code_check->bind_param("s", $code);
                $code_check->execute();

                $result = $code_check->get_result();
                $num_rows = $result->num_rows;

                if ($num_rows == 1) {
                    //IF: newpassword does not macth the oldpassword
                    if ($newpassword != $oldPassword) {
                        //IF: inputted password has a length of 6 to 60 characters
                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
                            //IF: inputted password only consists of letters, numbers and other characters
                            if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {

                                $newpassword =  md5($newpassword);

                                //DATA: updating the password to new password
                                $update_query = $con->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                                $update_query->bind_param("si", $newpassword, $user_id);
                                $update_query->execute();

                                //DATA: delete the password_token
                                $delete_query = $con->prepare("DELETE FROM password_token WHERE token=?");
                                $delete_query->bind_param("s", $token);
                                $delete_query->execute();

                                //SCRIPT: to register.php
                                header('Location: register.php');
                            } else {
                                //ERROR ARRAY
                                array_push($error_array, "Password must contain letters and numbers only");
                            }
                        } else {
                            //ERROR ARRAY
                            array_push($error_array, "Password must be between 6 to 60 characters");
                        }
                    } else {
                        //ERROR ARRAY
                        array_push($error_array, "Password must not be the same as your old password");
                    }
                } else {
                    //ERROR ARRAY
                    array_push($error_array, "Incorrect Code");
                }
            } else {
                //ERROR ARRAY
                array_push($error_array, "Password don't match");
            }
        }
    } else {
        //EXIT: to register.php
        //EXPLANATION: if the token does not exist
        die(header('Location: authentication.php'));
    }
}
