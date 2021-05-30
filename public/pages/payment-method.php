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
        <div class="row">
            <!-- list of method payments -->
            <div class="col-md-9">
                <h1>Select Payment Method</h1>
                <!-- payment method items -->
                <div class="payment-card-item">
                    <!-- card header -->
                    <div class="card-header" data-mdb-toggle="collapse" data-mdb-target="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <label for=""><input type="radio"> Cash on Delivery</label>
                    </div>

                    <!-- show and unhide card body -->
                    <div class="collapse" id="collapseExample">
                        <div class="card-body">
                        <form action="">
                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">First Name</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Last Name</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">Mobile</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Address</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">Emirates</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Area</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- payment method items -->
                <div class="payment-card-item">
                    <!-- card header -->
                    <div class="card-header" data-mdb-toggle="collapse" data-mdb-target="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                        <label for=""><input type="radio"> Credit/Debit Card </label>
                    </div>

                    <!-- show and unhide card body -->
                    <div class="collapse" id="collapseExample2">
                        <div class="card-body">
                        <form action="">
                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">First Name</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Last Name</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">Mobile</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Address</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">Emirates</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Area</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- payment method items -->
                <div class="payment-card-item">
                    <!-- card header -->
                    <div class="card-header" data-mdb-toggle="collapse" data-mdb-target="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                        <label for=""><input type="radio"> Paypal</label>
                    </div>

                    <!-- show and unhide card body -->
                    <div class="collapse" id="collapseExample3">
                        <div class="card-body">
                            <form action="">
                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">First Name</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Last Name</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">Mobile</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Address</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="input row">
                                    <div class="col-2">
                                        <label for="">Emirates</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text">
                                    </div>

                                    <div class="col-2">
                                        <label for="">Area</label>
                                    </div>
                                    <div class="col-4"> 
                                        <input type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="summary-content">
                    <p>Number of items:</p>

                    <p>Amount:</p>

                    <p>Total:</p>

                    <div class="summary-footer">
                        <button class="btn">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
include '../pages/includes/footer.php'
?>