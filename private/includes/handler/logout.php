<?php 
//destroy the session and logout the user
session_start();
session_destroy();

header("Location: ../../public/index.php");
 ?>