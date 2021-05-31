<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com>  
 *  
 * Date: 5/21/2021
 * Time: 12:01 am
 */
include '../includes/header.php';
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
                        <div class="left-content">
                            <p>Leased Duration</p>
                            <p>Date Ordered</p>
                            <p>Return Date</p>
                        </div>

                        <div class="right-content">
                            <p>Delivered Date</p>
                        </div>
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
                    <!-- item information table -->
                    <table class="product-information-table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>More Information</th>
                                <th>Quantity</th>
                                <th>Duration</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>030303</td>
                                <td>Tool</td>
                                <td>03/15/21</td>
                                <td>03/25/21</td>
                                <td>10 Aed</td>
                                <td>10 Days</td>
                            <tr>
                        </tbody>
                    </table>
                    <!-- end of table -->
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include '../includes/footer.php';

?>