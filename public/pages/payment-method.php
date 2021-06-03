<?php

/** 
 * User: 
 *       Zaira Mundo <zairajune@gmail.com>
 * Date: 5/19/2021
 * Time: 11:30 am
 */
include '../includes/header.php';

// checks if user is not logged in to access the page
if (!isset($_SESSION['email'])) {
    header("Location: ../pages/authentication.php");
}
?>

<!-- Payment method page -->
<div class="payment-method-page">
    <div class="container-lg">
        <div class="payment-content">
            <!-- list of method payments -->
            <h1>Select Payment Method</h1>
            <!-- payment method items -->
            <div class="payment-card-item">
                <!-- card header -->
                <div class="card-header">
                    <h3>Cash on delivery</h3>
                </div>

                <div class="card-body">
                    <form action="review-checkout.php">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">Delivery Address</label>
                                <input type="text">

                                <label for="">Emirates</label>
                                <input type="text">

                                <label for="">Area</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="summary-footer">
                            <button class="btn" type="submit">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php'
?>