<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 * Date: 5/15/2021
 * Time: 12:05 PM
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
    echo $cart_id;
    $sql = "SELECT cp.id FROM cart_products cp INNER JOIN cart c ON c.cart_id = cp.cart_id WHERE cp.product_id = ? AND c.user_id = ? AND cp.cart_id = $cart_id LIMIT 1 ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $product_id, $user_id);
    $stmt->execute();
    $cartProdRes = $stmt->get_result();
    echo $cartProdRes->num_rows;
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

<!-- start of account tabs page -->
<div class="account-tabs">
    <!-- container -->
    <div class="container-sm">
        <div class="tab-view-pages">
            <!-- Tab pages button -->
            <ul class="nav nav-tabs" id="myTab0" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab0" data-mdb-toggle="tab" data-mdb-target="#profile0" type="button" role="tab" aria-controls="profile" aria-selected="true">
                        Favorites
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab0" data-mdb-toggle="tab" data-mdb-target="#contact0" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        Searches
                    </button>
                </li>
            </ul>

            <!-- Tab pages content -->
            <div class="tab-content" id="myTabContent0">

                <!-- Favorites Tab pane -->
                <div class="tab-pane fade show active" id="profile0" role="tabpanel" aria-labelledby="profile-tab0">
                    <!-- Tab view page body -->
                    <div class="tab-header">
                        <h1>Favorites</h1>
                    </div>

                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="notification-item row">
                            <div class="left-content col-md-1">
                                <img src="" alt="">
                            </div>

                            <div class="right-content col-md-10">
                                <h2>Heading</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                            </div>

                            <div class="delete-btn col-md-1">
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="contact0" role="tabpanel" aria-labelledby="contact-tab0">
                    <div class="tab-header">
                        <h1>Search</h1>
                    </div>
                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="notification-item row">
                            <div class="left-content col-md-1">
                                <img src="" alt="">
                            </div>

                            <div class="right-content col-md-10">
                                <h2>Heading</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                            </div>

                            <div class="delete-btn col-md-1">
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- end of container -->
</div>
<!-- end of page container -->

<?php

include '../includes/footer.php';

?>