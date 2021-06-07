<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com>  
 *  
 * Date: 5/21/2021
 * Time: 12:01 am
 */
include '../includes/header.php';

$sql = "SELECT delivery_date, payment_method, return_date, created_at FROM orders";
    $stmt = $con->prepare($sql);
    $stmt->execute();
?>

<!-- View more order information -->
<div class="view-order-page">
    <div class="container-lg">
        <!-- View more order details -->
        <div class="order-details row">
            <div class="col-md-8">
                <div class="left-column">
                    <div class="content-header">
                        <h1>Order Details</h1>
                    </div>

                    <div class="content-body">
                        <?php 

                        $user_id = $_SESSION['user_id'];

                        $sql = "SELECT * FROM cart INNER JOIN cart_products ON cart.id = cart_products.cart_id";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while($row = $result->fetch_assoc()){
                            echo ' 
                            
                            <div class="left-content">
                                <p>Ordered Date: '.$row['created_at'].' ?> </p>
                                <p>Return Date: ' . $row['return_date'] . ' </p>
                                <p>Delivery Method: ' . $row['payment_method'] . ' </p>
                            </div>

                            <div class="right-content">
                                <p>Delivery Date: '.$row['delivery_date'].' </p>
                            </div>';
                        }    
                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-column">
                    <div class="content-header">
                        <h1>Lender Information</h1>
                    </div>

                    <div class="content-body">
                        <p>Name</p>
                        <p>User ID</p>
                        <p>Mobile</p>
                        <p>Email</p>
                        <p>Address</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ordered item details -->
        <div class="ordered-item row">
            <div class="ordered-card-item">
                <div class="content-header">
                    <h1>Ordered Items</h1>
                </div>
                <div class="content-body">
                    <?php
                    $user_id = $_SESSION['user_id'];

                    $sql = "SELECT * FROM cart INNER JOIN cart_products ON cart.id = cart_products.cart_id";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    while ($row = $result->fetch_assoc()) {
                        echo '
                                    <div class="listed-cards row">
                                        <div class="left-content col-md-4">
                                            <img src="" alt="">
                                        </div>

                                        <div class="right-content col-md-8">
                                            <div class="right-header">
                                                <h2>' . $row['product_title'] . '</h2>
                                            </div>

                                            <div class="right-body">
                                                <p>' . $row['quantity'] . ' Qty</p>
                                                <p>' . $row['price'] . ' AED/Day</p>
                                            </div>
                                        </div>
                                    </div>
                            ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include '../includes/footer.php';

?>