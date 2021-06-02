<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 *       Zaira Mundo <zairajune@gmail.com>
 * Date: 5/9/2021
 * Time: 11:36 PM
 */

include '../includes/header.php';

include '../../private/includes/form_handler/accountForm.php';
include '../../private/includes/form_handler/addItems.php';
include '../../private/includes/handler/accountHandler.php';

?>

<div class="account-pg-ctn">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-3">
                <!-- Side Bar Navigation Tab Views-->
                <!-- My Account tab views-->
                <div class="row-1">
                    <h1>My Account</h1>
                    <ul>
                        <li><button class="tab-btn tablink" onclick="openTab(event, 'accInfo')">Account Information</button></li>
                        <li><button class="tab-btn tablink" onclick="openTab(event, 'accOrdrs')">Your Orders</button></li>
                        <li><button class="tab-btn tablink" onclick="openTab(event, 'accLend')">Become a Lender</button></li>
                    </ul>
                </div>

                <?php if ($lender == 1) {
                    echo '<!-- Lender Central tab views-->
                    <div class="row-2">
                        <h1>Lender Central</h1>
                        <ul>
                            <li><a class="tab-btn" data-mdb-toggle="modal" href="#addItem" role="button">Add Item</a></li>
                            <li><button class="tab-btn tablink" onclick="openTab(event, \'lendInventory\')">Inventory</button></li>
                            <li><button class="tab-btn tablink" onclick="openTab(event, \'lendOutgoing\')">Outgoing Items</button></li>
                            <li><button class="tab-btn tablink" onclick="openTab(event, \'lendTerms\')">Terms & Condition</button></li>
                        </ul>
                    </div>';
                } ?>
            </div>

            <!-- Tab view contents -->
            <div class="col-md-9">
                <div id="accInfo" class="accInfo acc-tabs">
                    <h1>Account Information</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="">
                                <div class="form-header">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="row">
                                    <label for="itemName">First Name</label>
                                    <input type="text" value=" ">
                                </div>
                                <div class="row">
                                    <label for="itemName">Last Name</label>
                                    <input type="text" value=" ">
                                </div>
                                <div class="row">
                                    <label for="itemName">Email</label>
                                    <input type="text" value=" ">
                                </div>
                                <div class="row">
                                    <label for="itemName">Mobile Number</label>
                                    <input type="text" value=" ">
                                </div>
                                <div class="row">
                                    <label for="itemName">Password</label>
                                    <input type="text" value=" ">
                                </div>
                                <div class="row">
                                    <label for="itemName">Confirm Password</label>
                                    <input type="text" value=" ">
                                </div>
                            </form>

                            <form method='post'>
                                <button type='submit' name='becomeLender'>Become a Lender</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="accOrdrs" class="accOrdrs acc-tabs" style="display: none;">
                    <div class="content-header">
                        <h1>Your Orders</h1>
                    </div>

                    <div class="content-body">
                        <?php
                        $sql = "SELECT * FROM `product`"; //remove product_title, and add product_names in DB
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo
                            '<a class="card-item" href="view-information-order.php">
                                <div class="left-content">
                                    <img src="" alt="">
                                </div>

                                <div class="right-content">
                                    <div class="right-header">
                                        <h3>Heading</h3>
                                        <p>Status</p>
                                    </div>
                                    <div class="right-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Date Ordered:</label>
                                                <p>30/21/21</p>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Date of Return:</label>
                                                <p>30/21/21</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Leasing Duration:</label>
                                                <p>10 Days</p>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Pricing:</label>
                                                <p>10 Dhs / Day</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>';
                        };
                        ?>
                    </div>

                    <div class="pagination-footer ">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination justify-content-center ">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div id="accLender" class="accLender acc-tabs" style="display: none;">
                    <h1>Testing 4</h1>
                </div>

                <!-- Lender Central Inventory -->
                <div id="lendInventory" class="lendInventory acc-tabs" style="display: none;">
                    <h1>Inventory</h1>
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Item Image</th>
                                <th>Product Id</th>
                                <th>Name</th>
                                <th>Date Ordered</th>
                                <th>Date of Return</th>
                                <th>Price/Day</th>
                                <th>Duration</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='clickable-row' data-href='view-items.php'>
                                <td></td>
                                <td>030303</td>
                                <td>Tool</td>
                                <td>03/15/21</td>
                                <td>03/25/21</td>
                                <td>10 Aed</td>
                                <td>10 Days</td>
                                <td>Delivered</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Lender Central Outgoing -->
                <div id="lendOutgoing" class="lendOutgoing acc-tabs" style="display: none;">
                    <h1>Outgoing</h1>
                    <table class="outgoing-table">
                        <thead>
                            <tr class='clickable-row' data-href='view-items.php'>
                                <th>Item Image</th>
                                <th>Order Id</th>
                                <th>Name</th>
                                <th>Date Leased</th>
                                <th>Return Date</th>
                                <th>Leased By</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>030303</td>
                                <td>Tool</td>
                                <td>03/15/21</td>
                                <td>03/25/21</td>
                                <td>John Dale</td>
                                <td>055-232322</td>
                                <td>johndale@gmai.com</td>
                                <td>Delivered</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="lendTerms" class="lendTerm acc-tabs" style="display: none;">
                    <h1>Terms & Condition</h1>
                </div>
            </div>

            <!-- First modal dialog -->
            <div class="addItem modal fade" id="addItem" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Adding Category Icons -->
                        <div class="modal-body">
                            <form action="user-account.php" method="post">
                                <h1>What Item Category will you put on leasing?</h1>
                                <div class="row add-category">
                                    <div class="col-md-3">
                                        <input type="button" name="catOutegory" value="Outdoor" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="category" value="Camping" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="category" value="Fishing" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="catHardegory" value="Hardware & Tools" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="category" value="Sailing" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="category" value="Boating" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="category" value="Hiking" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="button" name="category" value="Cooking" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">
                                    </div>
                                </div>
                        </div>
                        <!-- End of Code Category Icons -->
                        <!-- <div class="modal-footer">
                            <button class="btn btn-primary" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal">Continue</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- End of first modal dialog -->

            <!-- Second modal dialog -->
            <div class="addTitle modal fade" id="addTitle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="left-arrow" data-mdb-target="#addItem" data-mdb-toggle="modal" data-mdb-dismiss="modal"><i class="fas fa-chevron-left"></i></button>

                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Adding Title description -->
                        <div class="modal-body">
                            <h1>First, enter a short title to describe your listing</h1>
                            <p>Make your title informative and attractive.</p>
                            <input type="text" name="title" placeholder="e.g. 6 person Tent for Rent">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-mdb-target="#addDscrpt" data-mdb-toggle="modal" data-mdb-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of second modal dialog -->

            <!-- Third modal dialog -->
            <div class="addDscrpt modal fade" id="addDscrpt" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="left-arrow" data-mdb-target="#addTitle" data-mdb-toggle="modal" data-mdb-dismiss="modal"><i class="fas fa-chevron-left"></i></button>

                            <button type="button" data-mdb-target="#addTitle" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Adding Item Information and Description-->
                        <div class="modal-body">
                            <h1>You're almost there!</h1>
                            <p>Please include much details and picture as possible, and set the right pricing per day and leasing duration.</p>
                            <!-- Start code for adding description form-->
                            <div class="row">
                                <label for="itemName">Item Name</label>
                                <input type="text" name="itemName">
                            </div>

                            <div class="row">
                                <label for="itemName">Upload Picture</label>
                                <input type="file" name="itemImage">
                            </div>

                            <div class="row">
                                <label for="itemName">Pricing/Day</label>
                                <input type="text" name="itemPrice">
                            </div>

                            <div class="row">
                                <label for="brand">Leasing Duraiton</label>
                                <input type="number" id="itemDuration" name="itemDuration" min="1" max="30">
                            </div>

                            <div class="row">
                                <label for="age">Age</label>
                                <select name="itemAge" id="age">
                                    <option value="1">Brand New</option>
                                    <option value="2">0-1 month</option>
                                    <option value="3">1-6 months</option>
                                    <option value="4">6-12 months</option>
                                    <option value="5">1-2 years</option>
                                    <option value="6">2-5 years</option>
                                    <option value="7">5+ years</option>
                                    <option value="8">10+ years</option>
                                </select>
                            </div>

                            <div class="row">
                                <label for="condition">Condition</label>
                                <select name="itemCondition" id="condition">
                                    <option value="">Never Used</option>
                                    <option value="">Excellent Condition</option>
                                    <option value="">Good Condition</option>
                                    <option value="">Fair Condition</option>
                                    <option value="">Poor Condition</option>
                                </select>
                            </div>

                            <div class="row">
                                <label for="description">Description</label>
                                <textarea name="itemDescription" rows="10" cols="30">Enter Description</textarea>
                            </div>
                            <!-- End code for adding description form-->
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" data-mdb-target="#addSpec" data-mdb-toggle="modal" data-mdb-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of third modal dialog -->

            <!-- Fourth modal dialog -->
            <div class="addSpec modal fade" id="addSpec" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="left-arrow" data-mdb-target="#addDscrpt" data-mdb-toggle="modal" data-mdb-dismiss="modal"><i class="fas fa-chevron-left"></i></button>

                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Start code for adding technical specification form-->
                        <div class="modal-body">
                            <h1>You're almost there!</h1>
                            <p>Please include much details and picture as possible, and set the right pricing per day and leasing duration.</p>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><input type="text" value=" " placeholder="Weight"></div>
                                <div class="col-md-6"><input type="text" value=" " placeholder="36kg"></div>
                            </div>
                        </div>
                        <!-- End of code for adding technical specification form-->

                        <div class="modal-footer">
                            <button class="btn btn-primary" data-mdb-target="#confirmItem" data-mdb-toggle="modal" data-mdb-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of fourth modal dialog -->

            <!-- Fifth modal dialog -->
            <div class="addConfirm modal fade" id="confirmItem" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="left-arrow" data-mdb-target="#addSpec" data-mdb-toggle="modal" data-mdb-dismiss="modal"><i class="fas fa-chevron-left"></i></button>

                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1>The Item will be approve by the admin.</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At mollitia molestias a amet, accusamus corrupti id velit facilis consequuntur, suscipit omnis deserunt dignissimos? Asperiores provident a autem iusto veniam velit!</p>
                            <p>Eligendi repudiandae porro nam quisquam enim culpa similique labore sequi deserunt id architecto consectetur sapiente dolores, laudantium corrupti eaque fugiat possimus a ex, obcaecati minus eos debitis facilis vitae. Aliquam.</p>
                            <p>Odio beatae minima vitae magnam earum minus fugit aliquid magni atque ducimus cumque quos dolores repellendus veniam ipsum, ab obcaecati alias quisquam quasi repudiandae temporibus quo. Eos accusantium dolorem fugit.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" name="addItem" data-mdb-target="#itemSpec" data-mdb-toggle="modal" data-mdb-dismiss="modal">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of fifth modal dialog -->

        </div>
    </div>
</div>


<?php

include '../includes/footer.php';


?>