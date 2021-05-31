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
                    <div class="content-body">
                        <div class="content">
                            <h1>Shipping Address</h1>
                            <p>John Doe</p>
                            <p>King Faisal, Buhaira</p>
                            <p>Decken Bldg, Flat 305</p>
                            <p>Dubai, Jumeirah Lake Tower</p>
                            <p>055-3232-3232</p>
                        </div>
                        <div class="content">
                            <h1>Payment Method</h1>
                            <p>Cash on delivery</p>
                        </div>
                        <div class="content">
                            <h1>Delivery Method</h1>
                            <select name="delivery-method" id="delivery-method">
                                <option value="volvo">Pick up from lender</option>
                                <option value="saab">Delivered by lender</option>
                            </select>
                        </div>


                    </div>
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
                            <div class="col-md-2">
                                <img src="" alt="">
                            </div>

                            <div class="col-md-8">
                                <h4>Heading</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum enim sed sapiente aut dolor dolore? Nostrum enim debitis quae tenetur unde nulla dolorem soluta laboriosam. Ducimus veniam sunt unde perferendis!</p>
                            </div>
                            <div class="col-md-2">
                                <p>Aed/Day</p>

                            </div>
                        </div>

                         <div class="listed-cards-item row">
                            <div class="col-md-2">
                                <img src="" alt="">
                            </div>

                            <div class="col-md-8">
                                <h4>Heading</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum enim sed sapiente aut dolor dolore? Nostrum enim debitis quae tenetur unde nulla dolorem soluta laboriosam. Ducimus veniam sunt unde perferendis!</p>
                            </div>
                            <div class="col-md-2">
                                <p>Aed/Day</p>

                            </div>
                        </div>

                        <div class="listed-cards-item row">
                            <div class="col-md-2">
                                <img src="" alt="">
                            </div>

                            <div class="col-md-8">
                                <h4>Heading</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum enim sed sapiente aut dolor dolore? Nostrum enim debitis quae tenetur unde nulla dolorem soluta laboriosam. Ducimus veniam sunt unde perferendis!</p>
                            </div>
                            <div class="col-md-2">
                                <p>Aed/Day</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="right-content-row">
                    <div class="summary-content">
                        <p>Item Name</p>
                        <p>Number of items</p>
                        <p>Amount</p>
                        <p>Deliver fee</p>
                        <p>Total</p>
                    </div>
                    <div class="summary-footer">
                        <button class="btn">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include '../includes/footer.php';


?>