<?php

if (isset($_POST['addItem'])) {

    //Category
    $category = strip_tags($_POST['category']); //Remove html tags
    $category = str_replace(' ', '', $category); //remove spaces
    $category = ucfirst(strtolower($category)); //Uppercase first letter

    //Title
    $title = strip_tags($_POST['title']); //Remove html tags
    $title = ucfirst(strtolower($title)); //Uppercase first letter

    //Item Name
    $itemName = strip_tags($_POST['itemName']); //Remove html tags
    $itemName = ucfirst(strtolower($itemName)); //Uppercase first letter

    //Item Price
    $itemPrice = strip_tags($_POST['itemPrice']); //Remove html tags
    $itemPrice = str_replace(' ', '', $itemPrice); //remove spaces
    $itemPrice = ucfirst(strtolower($itemPrice)); //Uppercase first letter

    //Item Duration
    $itemDuration = strip_tags($_POST['itemDuration']); //Remove html tags
    $itemDuration = str_replace(' ', '', $itemDuration); //remove spaces
    $itemDuration = ucfirst(strtolower($itemDuration)); //Uppercase first letter

    //Item Age
    $itemAge = strip_tags($_POST['itemAge']); //Remove html tags
    $itemAge = ucfirst(strtolower($itemAge)); //Uppercase first letter

    //Item Condition
    $itemCondition = strip_tags($_POST['itemCondition']); //Remove html tags
    $itemCondition = ucfirst(strtolower($itemCondition)); //Uppercase first letter

    //Item Description
    $itemDescription = strip_tags($_POST['itemDescription']); //Remove html tags
    $itemDescription = ucfirst(strtolower($itemDescription)); //Uppercase first letter

    $user = $_SESSION['email'];

    //Get User ID
    $e_check = $con->prepare("SELECT id FROM users WHERE email=?");
    $e_check->bind_param("s", $user);
    $e_check->execute();

    $result = $e_check->get_result();
    $userId = $result->fetch_assoc();

    $query = $con->prepare("INSERT INTO product VALUES ('', ?, ?, ?, '', ?, ?, '', ?, ?, ?, 'Available')");
    $query->bind_param("sssssdis", $itemName, $itemDescription, $itemDuration, $itemAge, $itemCondition, $itemPrice, $userId, $category);
    $query->execute();
}
