<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 *       Zaira Mundo <zairajune@gmail.com>
 * Date: 5/9/2021
 * Time: 11:36 PM
 */

include '../includes/header.php';

$user_id = $_SESSION['user_id'];

include '../../private/includes/form_handler/accountForm.php';
include '../../private/includes/form_handler/addItems.php';

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

                    </ul>
                </div>

                <?php

                $query_check = $con->prepare("SELECT * FROM users WHERE user_id=?");
                $query_check->bind_param("i", $user_id);
                $query_check->execute();

                $result = $query_check->get_result();
                $row = $result->fetch_assoc();

                if ($row['lender'] == 1) {
                    echo '<!-- Lender Central tab views-->
                    <div class="row-2">
                        <h1>Lender Central</h1>
                        <ul>
                            <li><a class="tab-btn" data-mdb-toggle="modal" href="#addItem" role="button">Add Item</a></li>
                            <li><button class="tab-btn tablink" onclick="openTab(event, \'lendInventory\')">Inventory</button></li>
                        </ul>
                    </div>';
                } ?>
            </div>

            <!-- Tab view contents -->
            <div class="col-md-9">
                <div id="accInfo" class="accInfo acc-tabs">

                    <?php
                    $detail_check = $con->prepare("SELECT * FROM users WHERE user_id=?");
                    $detail_check->bind_param("i", $user_id);
                    $detail_check->execute();

                    $result = $detail_check->get_result();
                    $row = $result->fetch_assoc();

                    ?>
                    <h1>Account Information</h1>
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post">
                                <div class="form-header">
                                    <button type="submit" name="accountEdit"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="row">
                                    <label for="itemName">First Name</label>
                                    <input type="text" name="accountFirst" value="<?php echo $row['firstName']; ?>">
                                </div>
                                <div class="row">
                                    <label for="itemName">Last Name</label>
                                    <input type="text" name="accountLast" value="<?php echo $row['lastName']; ?>">
                                </div>
                                <div class="row">
                                    <label for="itemName">Email</label>
                                    <input type="text" name="accountEmail" value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="row">
                                    <label for="itemName">Mobile Number</label>
                                    <input type="text" name="accountContact" value="<?php echo $row['contact']; ?>">
                                </div>
                                <div class="row">
                                    <label for="itemName">Address</label>
                                    <input type="text" name="accountAddress" value="<?php echo $row['address']; ?>">
                                </div>
                                <div class="row">
                                    <label for="itemName">Password</label>
                                    <input type="password" name="accountPassword" value="">
                                </div>
                                <div class="row">
                                    <label for="itemName">Confirm Password</label>
                                    <input type="password" name="accountConfirm" value="">
                                </div>
                            </form>

                            <form method='post'>
                                <h3>Do you want to be come a lender?</h3>
                                <p>Click this button to earn extra income by renting your item for a price! Lender Central will be available to you and start adding your items to be posted on the website.</p>
                                <button class="btn btn-primary" type='submit' name='becomeLender'>Become a Lender</button>
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
                        $sql = "SELECT o.order_id, o.created_at, o.delivery_date, o.return_date, o.status, o.total_price FROM orders o INNER JOIN cart ON cart.cart_id = o.cart_id WHERE cart.user_id = ?"; //remove product_title, and add product_names in DB
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('i', $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            $dateDiff = date_diff(date_create($row['delivery_date']), date_create($row['return_date']));

                            echo
                            '<a class="card-item" href="view-information-order.php">
                                <div class="left-content">
                                    <img src="" alt="">
                                </div>

                                <div class="right-content">
                                    <div class="right-header">
                                        <h3>Order #' . $row['order_id'] . '</h3>
                                        <p>' . $row['status'] . '</p>
                                    </div>
                                    <div class="right-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Date Ordered:</label>
                                                <p>' . $row['created_at'] . '</p>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Date of Return:</label>
                                                <p>' . $row['return_date'] . '</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Leasing Duration:</label>
                                                <p>' . $dateDiff->format("%a days") . '</p>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Pricing:</label>
                                                <p>' . $row['total_price'] . ' Dhs / Day</p>
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

                <!-- Lender Central Inventory -->
                <div id="lendInventory" class="lendInventory acc-tabs" style="display: none;">
                    <div class="content-header">
                        <h1>Inventory</h1>
                    </div>

                    <div class="content-body">
                        <?php
                        $user_id = $_SESSION['user_id'];

                        $sql = "SELECT * FROM `product` WHERE lender_id = $user_id"; //remove product_title, and add product_names in DB
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {

                            $query = $con->prepare("SELECT * FROM product_image WHERE product_id=?");
                            $query->bind_param("i", $row['product_id']);
                            $query->execute();

                            $imageResult = $query->get_result();
                            $imageRow = $imageResult->fetch_assoc();
                            
                            echo
                            '<a class="card-item" href="view-items.php">
                                <div class="left-content">
                                    <img src="../images/'.$imageRow['source'].'" alt="'.$imageRow['source'].'">
                                </div>

                                <div class="right-content">
                                    <div class="right-header">
                                        <h3>' . $row['product_title'] . ' </h3>
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
                                                <p>' . $row['price'] . ' dhs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>';
                        };
                        ?>
                    </div>
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
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-3" id="addItems" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="addItemsTitle" data-mdb-toggle="tab" href="#addItems-title" role="tab" aria-controls="addItems-title" aria-selected="true">Product Title</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="addItemsDetail" data-mdb-toggle="tab" href="#addItems-detail" role="tab" aria-controls="addItems-detail" aria-selected="false">Product Details</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="addItemsSpec" data-mdb-toggle="tab" href="#addItems-spec" role="tab" aria-controls="addItems-spec" aria-selected="false">Product Technical Description</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="addItemsConfirm" data-mdb-toggle="tab" href="#addItems-confirm" role="tab" aria-controls="addItems-confirm" aria-selected="false">Submit</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                            <form action="user-account.php" method="post" enctype="multipart/form-data">
                                <!-- Tabs content -->
                                <div class="tab-content" id="addItems-content">
                                    <div class="tab-pane fade show active" id="addItems-title" role="tabpanel" aria-labelledby="addItemsTitle">
                                        <!-- Adding Title description -->
                                        <div class="modal-body">
                                            <h1>First, enter a short title to describe your listing</h1>
                                            <p>Make your title informative and attractive.</p>
                                            <input type="text" name="itemTitle" placeholder="e.g. 6 person Tent for Rent">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="addItems-detail" role="tabpanel" aria-labelledby="addItemsDetail">
                                        <!-- Adding Item Information and Description-->
                                        <h1>You're almost there!</h1>
                                        <p>Please include much details and picture as possible, and set the right pricing per day and leasing duration.</p>
                                        <!-- Start code for adding description form-->
                                        <div class="row">
                                            <label for="itemName">Item Name</label>
                                            <input type="text" name="itemName">
                                        </div>

                                        <div class="row">
                                            <label for="cagetory">Category</label>
                                            <select name="itemCategory">
                                                <option value="1">Camping</option>
                                                <option value="2">Outdoor</option>
                                                <option value="3">Indoor</option>
                                                <option value="4">Fishing</option>
                                                <option value="5">Hardware</option>
                                                <option value="6">Hiking</option>
                                                <option value="7">Sailing</option>
                                                <option value="8">Boating</option>
                                                <option value="9">Cooking</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <label for="itemName">Upload Picture</label>
                                            <input type="file" name="itemImage[]" multiple>
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
                                                <option value="Brand New">Brand New</option>
                                                <option value="0-1 month">0-1 month</option>
                                                <option value="1-6 months">1-6 months</option>
                                                <option value="6-12 months">6-12 months</option>
                                                <option value="1-2 years">1-2 years</option>
                                                <option value="2-5 years">2-5 years</option>
                                                <option value="5+ years">5+ years</option>
                                                <option value="10+ years">10+ years</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <label for="condition">Condition</label>
                                            <select name="itemCondition" id="condition">
                                                <option value="2">Never Used</option>
                                                <option value="3">Excellent Condition</option>
                                                <option value="4">Good Condition</option>
                                                <option value="5">Fair Condition</option>
                                                <option value="6">Poor Condition</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <label for="description">Description</label>
                                            <textarea name="itemDescription" rows="10" cols="30">Enter Description</textarea>
                                        </div>
                                        <!-- End code for adding description form-->
                                    </div>
                                    <div class="tab-pane fade" id="addItems-spec" role="tabpanel" aria-labelledby="addItemsSpec">
                                        <!-- Start code for adding technical specification form-->
                                        <div class="modal-body">
                                            <h1>You're almost there!</h1>
                                            <p>Please include much details and picture as possible, and set the right pricing per day and leasing duration.</p>

                                            <div class="row" id="table-spec">
                                                <div>
                                                    <div class="col-md-6"><input type="text" class="form-control" name="itemField[]" placeholder="e.g. Weight: 1.3kg"></div>
                                                    <div class="col-md-6"><input type="button" class="btn btn-warning" name="add" id="add" value="Add"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of code for adding technical specification form-->
                                    </div>
                                    <div class="tab-pane fade" id="addItems-confirm" role="tabpanel" aria-labelledby="addItemsConfirm">
                                        <h1>The Item will be approve by the admin.</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At mollitia molestias a amet, accusamus
                                            corrupti id velit facilis consequuntur, suscipit omnis deserunt dignissimos? Asperiores provident a
                                            autem iusto veniam velit!</p>
                                        <p>Eligendi repudiandae porro nam quisquam enim culpa similique labore sequi deserunt id architecto
                                            consectetur sapiente dolores, laudantium corrupti eaque fugiat possimus a ex, obcaecati minus eos
                                            debitis facilis vitae. Aliquam.</p>
                                        <p>Odio beatae minima vitae magnam earum minus fugit aliquid magni atque ducimus cumque quos dolores
                                            repellendus veniam ipsum, ab obcaecati alias quisquam quasi repudiandae temporibus quo. Eos
                                            accusantium dolorem fugit.</p>
                                        <input type="submit" name="addItem" value="Submit">
                                    </div>
                                    <!-- Tabs content -->
                                </div>

                            </form>
                        </div>
                        <!-- End of Code Category Icons -->

                    </div>
                </div>
            </div>
            <!-- End of first modal dialog -->

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var html = '<div class="removeDiv"><div class="col-md-6"><input type="text" class="form-control" name="itemField[]" placeholder="e.g. Weight: 1.3kg"></div><div class="col-md-6"><input type="button" class="btn btn-warning" name="remove" id="remove" value="Remove"></div></div>';

        var x = 1;
        var max = 5;

        $("#add").click(function() {
            if (x <= max) {
                $("#table-spec").append(html);
                x++;
            }
        });

        $("#table-spec").on('click', '#remove', function() {
            $(this).closest('.removeDiv').remove();
            x--;
        });
    });
</script>
<?php

include '../includes/footer.php';


?>