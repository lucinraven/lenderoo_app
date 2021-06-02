<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com>  
 *       Zaira Mundo <zairajune@gmail.com>
 * Date: 5/9/2021
 * Time: 12:54 AM
 */
include '../includes/header.php';

// Number of times the product with a specific id is clicked and updates the click counter database column in mysql.
if (isset($_GET['prod_id'])) {
    $sql = "UPDATE product SET click_counter = click_counter + 1 WHERE product_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $_GET['prod_id']);
    $stmt->execute();
}

$sql = "SELECT * FROM `product` p LEFT JOIN users u ON p.lender_id = u.user_id WHERE product_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $_GET['prod_id']);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc()
?>
<div class="view-item-page">
    <!-- View item header -->
    <div class="view-item-head">
        <div class="overlay">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-3">
                        <div class="left-info-top row">
                            <div class="left-header">
                                <h1><?php echo $row['product_title']; ?></h1>
                            </div>

                            <div class="left-body">
                                <ul>
                                    <li>
                                        <p>Overview:</p>
                                    </li>
                                    <li>
                                        <p>Brand: <?php echo $row['brand']; ?></p>
                                    </li>
                                    <li>
                                        <p>Age: <?php echo $row['age']; ?></p>
                                    </li>
                                    <li>
                                        <p>Condition: <?php echo $row['pr_condition']; ?></p>
                                    </li>
                                    <li>
                                        <p>Review:</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="left-bottom">


                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="img-main-ctn">
                            <img src="../images/daddy.jpg" alt="" class="main-img">
                        </div>
                        <div class="img-showcase-ctn row">
                            <div class="image-card">
                                <img src="" alt="">
                            </div>
                            <div class="image-card">
                                <img src="" alt="">
                            </div>
                            <div class="image-card">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="right-info-top row">
                            <div class="right-header">
                                <h1>5 PHP / Day</h1>
                            </div>
                            <div class="right-body">
                                <ul>
                                    <li>
                                        <p>Leaser Information: <?php echo $row['firstName'] . " " . $row['lastName']; ?></p>
                                    </li>
                                    <li>
                                        <p>Company: Bahay ng poks</p>
                                    </li>
                                    <li>
                                        <p>Address: <?php echo $row['address'] ?></p>
                                    </li>
                                    <li>
                                        <p>City: Iloilo</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="right-bottom">
                                <a class="btn btn-primary" href="inbox-messenger.php">Inquire Lender</a>

                                <form action="add-cart.php" method="POST">
                                    <input class="btn btn-primary" type="submit" name="add-cart" value="Add Cart">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
                                </form>
                               
                                <a class="btn btn-primary" href="payment-method.php">Rent now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-lg">
        <!-- View item body -->
        <div class="view-item-body">
            <div class="desc-scrip-ctn">
                <div class="description">
                    <h1>Description</h1>
                    <p><?php echo $row['description']; ?></p>
                </div>

                <div class="spec-table">
                    <h1>Technical Specification</h1>
                    <table class="table">
                        <thead>
                            <th>Test</th>
                            <th>Test</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="customer-review-ctn">
                <h1>Customer Review</h1>
                <div class="post-review">
                    <h5>John Doe</p>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Heading</p>
                            </div>
                            <div class="col-md-4">
                                <p>stars starts stars</p>
                            </div>
                        </div>
                        <p class="comment">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, dolorem doloribus? Nulla aut error consequuntur non nisi odit accusantium veniam, cumque ad. Unde cum quisquam provident quos dolor et optio.</p>
                </div>

                <div class="post-review">
                    <h5>John Doe</p>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Heading</p>
                            </div>
                            <div class="col-md-4">
                                <p>stars starts stars</p>
                            </div>
                        </div>
                        <p class="comment">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, dolorem doloribus? Nulla aut error consequuntur non nisi odit accusantium veniam, cumque ad. Unde cum quisquam provident quos dolor et optio.</p>
                </div>

                <div class="post-review">
                    <h5>John Doe</p>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Heading</p>
                            </div>
                            <div class="col-md-4">
                                <p>stars starts stars</p>
                            </div>
                        </div>
                        <p class="comment">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, dolorem doloribus? Nulla aut error consequuntur non nisi odit accusantium veniam, cumque ad. Unde cum quisquam provident quos dolor et optio.</p>
                </div>

                <div class="post-review">
                    <h5>John Doe</p>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Heading</p>
                            </div>
                            <div class="col-md-4">
                                <p>stars starts stars</p>
                            </div>
                        </div>
                        <p class="comment">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, dolorem doloribus? Nulla aut error consequuntur non nisi odit accusantium veniam, cumque ad. Unde cum quisquam provident quos dolor et optio.</p>
                </div>

                <div class="post-review-ctn">
                    <h1>Write a review</h1>
                    <form action="">
                        <textarea name="post-review" id="" cols="30" rows="10"></textarea>

                        <input class="btn" type="button" value="Post">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include '../includes/footer.php';

?>