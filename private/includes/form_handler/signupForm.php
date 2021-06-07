<?php
//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$email = ""; //email
$password = ""; //password
$contact = ""; //contact
$error_array = array(); //Holds error messages

if (isset($_POST['signupBtn'])) {

	//Registration form values

	//First name
	$fname = strip_tags($_POST['signup_firstName']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter

	//Last name
	$lname = strip_tags($_POST['signup_lastName']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter

	//email
	$email = strip_tags($_POST['signup_email']); //Remove html tags
	$email = str_replace(' ', '', $email); //remove spaces

    //email
	$contact = strip_tags($_POST['signup_contact']); //Remove html tags
	$contact = str_replace(' ', '', $contact); //remove spaces

	//Password
	$password = strip_tags($_POST['signup_password']); //Remove html tags

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$email = filter_var($email, FILTER_VALIDATE_EMAIL);

		//Check if email already exists
		$e_check = $con->prepare("SELECT email FROM users WHERE email=?");
		$e_check->bind_param("s", $email);
		$e_check->execute();

		$result = $e_check->get_result();

		//Count the number of rows returned
		$num_rows = $result->num_rows;

		if ($num_rows > 0) {
			array_push($error_array, "Email already in use<br>");
		}
	} else {
		array_push($error_array, "Invalid email format<br>");
	}


	if (strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if (strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if (preg_match('/[^A-Za-z0-9]/', $password)) {
		array_push($error_array, "Your password can only contain english characters or numbers<br>");
	}

	if (strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be between 5 and 30 characters<br>");
	}


	if (empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		$query = $con->prepare("INSERT INTO users VALUES ('', ?, ?, ?, ?, ?, '', 0, 0, NOW())");
		$query->bind_param("sssss", $fname, $lname, $email, $password, $contact);
		$query->execute();

		$_SESSION['email'] = $email;

		$user_check = $con->prepare("SELECT user_id FROM users WHERE email=?");
		$user_check->bind_param("s", $email);
		$user_check->execute();

		$result = $user_check->get_result();
		$row = $result->fetch_assoc();
		$user_id = $row['user_id'];
		
		$_SESSION['user_id'] = $user_id;

		header("Location: index.php");
		exit();
	}
}

?>