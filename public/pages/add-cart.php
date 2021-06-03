<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 * Date: 5/18/2021
 * Time: 12:19 PM
 */

include '../includes/header.php';

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

    $sql = "SELECT cp.id FROM cart_products cp INNER JOIN cart c ON c.cart_id = cp.cart_id WHERE cp.product_id = ? AND c.user_id = ? LIMIT 1 ";
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
        $sql = "INSERT INTO cart_products (product_id, cart_id, quantity) VALUES( ? , ? , '1')";
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
                    echo '
                    <!-- Cart list body container-->
                    <div class="cart-list">
                        <!-- Cart item -->
                        <div class="cart-item row">
                            <div class="left-content col-md-4">
                                <img src="" alt="">
                            </div>
    
                            <div class="right-content col-md-8">
                                <div class="right-header">
                                    <h2>' . $productInCartRows['product_title'] . '</h2>
                                </div>

                                <div class="right-body">
                                    <p>' . $productInCartRows['quantity'] . ' Qty</p>
                                    <p>' . $productInCartRows['price'] . ' AED/Day</p>
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
                    <p>Aed/Day</p>
                </div>
                <div class="summary-footer">
                    <a href="../pages/payment-method.php"><button class="btn">Lease All Item</button></a>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

include '../includes/footer.php';

?>