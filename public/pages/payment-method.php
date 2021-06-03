<?php

/** 
 * User: 
 *       Zaira Mundo <zairajune@gmail.com>
 * Date: 5/19/2021
 * Time: 11:30 am
 */
include '../includes/header.php';
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
                    <form action="">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">First Name</label>
                                <input type="text">

                                <label for="">Last Name</label>
                                <input type="text">

                                <label for="">Mobile</label>
                                <input type="text">
                            </div>
                            <div class="col-md-5">
                                <label for="">Address</label>
                                <input type="text">

                                <label for="">Emirates</label>
                                <input type="text">

                                <label for="">Area</label>
                                <input type="text">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="summary-footer">
            <button class="btn">Continue</button>
        </div>

    </div>
</div>
</div>

<?php
include '../includes/footer.php'
?>