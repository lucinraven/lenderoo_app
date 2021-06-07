<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 * Date: 5/18/2021
 * Time: 12:19 PM
 */

include '../includes/header.php';

// checks if user is not logged in to access the page
if (!isset($_SESSION['email'])) {

    header("Location: ../pages/authentication.php");
}

$user_id = $_SESSION['user_id'];
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $sql = "SELECT * FROM cart WHERE user_id = ? AND is_active = 1 LIMIT 1;";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $cartRes = $stmt->get_result();
    if ($cartRes->num_rows == 0) { //There is no active cart. so will insert a new cart
        $sql = "INSERT INTO cart VALUES ('', ? ,'1');";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $sql = "SELECT LAST_INSERT_ID() as 'cart_id';";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $cartRes = $stmt->get_result();
    }

    $cartRows = $cartRes->fetch_assoc();
    $cart_id = $cartRows['cart_id'];

    $sql = "SELECT cp.id FROM cart_products cp INNER JOIN cart c ON c.cart_id = cp.cart_id WHERE cp.product_id = ? AND c.user_id = ? AND cp.cart_id = $cart_id LIMIT 1 ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $product_id, $user_id);
    $stmt->execute();
    $cartProdRes = $stmt->get_result();

    if ($cartProdRes->num_rows > 0) { //existing product item in cart
        $cartProdRows = $cartProdRes->fetch_assoc();
        $cartProdId = $cartProdRows['id'];
        $sql = "UPDATE cart_products
        SET quantity = quantity + 1 WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $cartProdId);
        $stmt->execute();
        $stmt->get_result();
    } else {
        // Inserts a product in cart_products if there is no existing same product being added. if there is, add quantity + 1.
        $sql = "INSERT INTO cart_products (product_id, cart_id) VALUES( ? , ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $product_id, $cart_id);
        $stmt->execute();
    }
}
?>

<!-- Cart page -->
<div class="add-cart-page">
    <div class="container-lg">

        <div class="row">
            <div class="col-md-9">
                <!-- Cart list header -->
                <div class="cart-list-header">
                    <h1>Item Cart</h1>
                </div>

                <?php
                $sql = "SELECT * FROM cart_products cp INNER JOIN product p ON cp.product_id = p.product_id INNER JOIN cart c ON c.cart_id = cp.cart_id WHERE c.is_active = 1 AND c.user_id = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();

                $productInCartRes = $stmt->get_result();
                while ($productInCartRows = $productInCartRes->fetch_assoc()) {

                    $imageQuery = $con->prepare("SELECT * FROM product_image WHERE product_id=?");
                    $imageQuery->bind_param("i", $productInCartRows['product_id']);
                    $imageQuery->execute();

                    $imageResult = $imageQuery->get_result();
                    $imageRow = $imageResult->fetch_assoc();

                    if (isset($_POST['inputDuration'])) {

                        $duration = $_POST['itemDuration'];

                        $update_query = $con->prepare("UPDATE cart_products SET duration=? WHERE product_id=? AND cart_id=?");
                        $update_query->bind_param("iii", $duration, $productInCartRows['product_id'], $productInCartRows['cart_id']);
                        $update_query->execute();

                        header("refresh: 1;");
                    }

                    echo '
                    <!-- Cart list body container-->
                    <div class="cart-list">
                        <!-- Cart item -->
                        <div class="cart-item row">
                                <div class="left-content col-md-4">
                                    <img src="../images/' . $imageRow['source'] . '" alt="' . $imageRow['source'] . '"  />
                                </div>
        
                                <div class="right-content col-md-8">
                                    <div class="left-body">
                                        <h2>' . $productInCartRows['product_title'] . '</h2>

                                        <p>' . $productInCartRows['price'] . ' AED/Day</p>
                                    </div>

                                    <div class="right-body">
                                        <form method="post">
                                            <div class="row">
                                            <label for="brand">Leasing Duraiton</label>
                                            <input class="add-input-styling" type="number" id="itemDuration" name="itemDuration" min="1" max="30" value="' . $productInCartRows['duration'] . '">
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="inputDuration">Submit</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>';
                }
                ?>

            </div>

            <div class="col-md-3">
                <div class="summary-content">
                    <h1>Summary</h1>

                    <p>Subtotal</p>
                    <?php
                    $sql = "SELECT * FROM cart_products cp INNER JOIN product p ON cp.product_id = p.product_id INNER JOIN cart c ON c.cart_id = cp.cart_id WHERE c.is_active = 1 AND c.user_id = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();

                    $productInCartRes = $stmt->get_result();
                    while ($productInCartRows = $productInCartRes->fetch_assoc()) {

                        $sum = $productInCartRows['price'] * $productInCartRows['duration'];
                        echo '<p>'.$sum.' AED</p>';
                    }
                    ?>
                    
                </div>
                <div class="summary-footer">
                    <a href="../pages/review-checkout.php"><button class="btn">Lease All Item</button></a>

                </div>
            </div>

        </div>
    </div>
</div>

<?php

include '../includes/footer.php';

?>