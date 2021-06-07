<?php

if (isset($_POST['addItem'])) {

    //Category
    $category = $_POST['itemCategory']; //Remove html tags

    //Title
    $title = strip_tags($_POST['itemTitle']); //Remove html tags
    $title = ucfirst(strtolower($title)); //Uppercase first letter

    //Item Name
    $itemName = strip_tags($_POST['itemName']); //Remove html tags
    $itemName = ucfirst(strtolower($itemName)); //Uppercase first letter

    //Item Price
    $itemPrice = strip_tags($_POST['itemPrice']); //Remove html tags
    $itemPrice = str_replace(' ', '', $itemPrice); //remove spaces
    $itemPrice = ucfirst(strtolower($itemPrice)); //Uppercase first letter

    //Item Duration
    $itemDuration = $_POST['itemDuration']; //Remove html tags

    //Item Age
    $itemAge = strip_tags($_POST['itemAge']); //Remove html tags

    //Item Condition
    $itemCondition = strip_tags($_POST['itemCondition']); //Remove html tags

    //Item Description
    $itemDescription = strip_tags($_POST['itemDescription']); //Remove html tags
    $itemDescription = ucfirst(strtolower($itemDescription)); //Uppercase first letter

    //Item Field
    $itemField = $_POST['itemField'];
    $itemField = implode( ',', $itemField );

    $user = $_SESSION['email'];

    //Get User ID
    $e_check = $con->prepare("SELECT user_id FROM users WHERE email=?");
    $e_check->bind_param("s", $user);
    $e_check->execute();

    $result = $e_check->get_result();
    $userId = $result->fetch_assoc();

    $product_query = $con->prepare("INSERT INTO product VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, 'Available', '', ?, ?)");
    $product_query->bind_param("sssssdiiii", $title, $itemName, $itemDescription, $itemAge, $itemField, $itemPrice, $category, $itemCondition, $userId, $itemDuration);
    $product_query->execute();

    // File upload configuration 
    $targetDir = "../images/";
    $allowTypes = array('jpg', 'png', 'jpeg');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['itemImage']['name']);

    $last_id = $con->insert_id;

    if (!empty($fileNames)) {
        foreach ($_FILES['itemImage']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['itemImage']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["itemImage"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= "('" . $fileName . "', '" . $last_id . "'),";
                } else {
                    $errorUpload .= $_FILES['itemImage']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['itemImage']['name'][$key] . ' | ';
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 
            $insert = $con->query("INSERT INTO product_image (source, product_id) VALUES $insertValuesSQL");
            if ($insert) {
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
            }
        }
    }
}
