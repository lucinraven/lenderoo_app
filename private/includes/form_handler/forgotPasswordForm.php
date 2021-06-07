<?php

if (isset($_POST['resetpassword'])) {

    $email = strip_tags($_POST['forgot-email']); //to remove HTML tags
    $email = str_replace(" ", "", $email); //to replace space to empty

    $e_check = $con->prepare("SELECT email FROM users WHERE email=?");
    $e_check->bind_param("s", $email);
    $e_check->execute();

    $result = $e_check->get_result();

    //Count the number of rows returned
    $num_rows = $result->num_rows;

    //IF: inputted email already exists
    if ($num_rows == 1) {

        //VARIABLE: encoded token, code
        //EXPLAIN "bin2hex" = ASCII string containing the hexadecimal representation of string; and the value will double from bin"2"hex
        $tstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(32, $tstrong));
        $cstrong = True;
        $code = bin2hex(openssl_random_pseudo_bytes(3, $cstrong));

        //DATA: get users.id
        //Check if email already exists
		$e_check = $con->prepare("SELECT user_id FROM users WHERE email=?");
		$e_check->bind_param("s", $email);
		$e_check->execute();

		$result = $e_check->get_result();
        $user_id = $result->fetch_assoc();

        //DATA: insert token, code
        $query = $con->prepare("INSERT INTO password_token VALUES ('', ?, ?, ?)");
		$query->bind_param("sis", $token, $user_id, $code );
		$query->execute();

        //VARIABLE: content of message with inline-css
        $body = '<div style="width:750px; height:350px; background-color:rgb(250, 250, 250); padding:20px 40px; border-radius:50px;">
            <h1 style="text-align:center;">LENDEROO | FORGOT PASSWORD</h1>
            <div style="width:90%; height:70%; background-color:#CECECE; border-radius:50px; padding:20px 30px;">
                <p style="font-size:1.2rem;">Hey <span style="color:#752FFF; width:100%;">' . $email . '</span>,</p>
                <p style="font-size:1.2rem; width:100%;">Your Connect password can now be reset by clicking the button bellow with a code of <b>' . $code . '</b>.
                If you did not request a new password, please ignore this email.</p>
                <a style="font-size:1.3rem; border-radius:30px; width:100px; background-color:#752FFF; color:white; padding:10px 15px; text-decoration:none; margin:0 240px;" href="http://localhost/lenderoo_app/pages/change-password.php?token=' . $token . '">Reset Password</a>
            </div>
        </div>';

        //SEND EMAIL
        $mail = Mail::sendMail('Forgot Password!', $body, $email);

        if ($mail == 'Message sent') {
            //ERROR ARRAY
            array_push($error_array, "Message sent");
        } else {
            //ERROR ARRAY
            array_push($error_array, "Message could not be sent.");
        }
    } else {
        //ERROR ARRAY
        array_push($error_array, "Email doesn't exist");
    }
}
?>
