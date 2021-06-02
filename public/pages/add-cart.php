<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 * Date: 5/18/2021
 * Time: 12:19 PM
 */

include '../includes/header.php';


if(isset($_POST['product_id'])){

    $sql = "SELECT * FROM `cart` WHERE user_id = ? AND is_active = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt->store_result();
   
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

                <!-- Cart list body container-->
                <div class="cart-list">
                    <!-- Cart item -->
                    <div class="cart-item row">
                        <div class="left-content col-md-3">
                            <img src="" alt="">
                        </div>

                        <div class="middle-content col-md-7">
                            <h2>Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem dolore cumque vitae deleniti, nesciunt suscipit molestias quod!</p>
                        </div>

                        <div class="right-content col-md-2">
                            <p>AED/Day</p>
                        </div>
                    </div>
                </div>
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