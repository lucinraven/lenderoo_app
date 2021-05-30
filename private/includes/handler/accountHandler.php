<?php

$email = $_SESSION['email'];

//Check if email already exists
$e_check = $con->prepare("SELECT * FROM users WHERE email=?");
$e_check->bind_param("s", $email);
$e_check->execute();

$result = $e_check->get_result();
$row = $result -> fetch_assoc();

$lender = $row['lender'];

?>