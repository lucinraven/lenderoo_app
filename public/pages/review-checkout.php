<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com>  
 *  
 * Date: 5/19/2021
 * Time: 4:32 pm
 */
include '../includes/header.php';




?>

<!-- review-checkout-page -->
<div class="review-checkout-page">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-9">
                <!-- left-content-row-1 -->
                <div class="left-content-row-1">
                    <div class="content-header">
                        <h1>Review Item</h1>
                    </div>
                    <form action="confirm-order.php" class="content-body row" id="placeOrder" method="POST">
                        <div class="content col-md-3">
                            <h1>Shipping Address</h1>
                            <p>John Doe</p>
                            <p>King Faisal, Buhaira</p>
                            <p>Decken Bldg, Flat 305</p>
                            <p>Dubai, Jumeirah Lake Tower</p>
                            <p>055-3232-3232</p>
                        </div>
                        <div class="content col-md-3">
                            <h1>Payment Method</h1>
                            <p>Cash on delivery</p>
                        </div>

                        <div class="content col-md-3">
                            <h1>Delivery Method</h1>
                            <select name="delivery-method" id="delivery-method">
                                <option value="volvo">Pick up from lender</option>
                                <option value="saab">Delivered by lender</option>
                            </select>
                        </div>

                        <div class="content col-md-3">
                            <h1>Select Delivery Date</h1>
                            <input class="pull-right" type="text" name="daterange" value="01/15/2020 - 02/15/2010">
                        </div>
                    </form>
                </div>

                <!-- left-content-row-2 -->
                <div class="left-content-row-2">
                    <div class="content-header">
                        <h1>Listed Items</h1>
                    </div>
                    <!-- card-items list -->
                    <div class="content-body">
                        <!-- card-items -->
                        <div class="listed-cards-item row">
                            <?php
                            $user_id = $_SESSION['user_id'];

                            $sql = "SELECT * FROM cart_products cp INNER JOIN product p ON cp.product_id = p.product_id INNER JOIN cart c ON c.cart_id = cp.cart_id WHERE c.is_active = 1 AND c.user_id = ?";
                            $stmt = $con->prepare($sql);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();

                            $productInCartRes = $stmt->get_result();
                            while ($row = $productInCartRes->fetch_assoc()) {
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

            <div class="col-md-3">
                <div class="right-content-row">
                    <div class="summary-content">
                        <p>Number of items</p>
                        <p>Amount</p>
                        <p>Deliver fee</p>
                        <p>Total</p>
                    </div>
                    <div class="summary-footer">
                        <button class="btn" onclick="document.getElementById('placeOrder').submit()">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javacript CDN Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

<!-- Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<?php
include '../includes/footer.php';
?>