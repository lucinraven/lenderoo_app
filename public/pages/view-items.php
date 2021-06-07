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
                                        <p>Age: <?php echo $row['age']; ?></p>
                                    </li>
                                    <li>
                                        <?php
                                        $query = $con->prepare("SELECT condition_name FROM product_condition WHERE id=?");
                                        $query->bind_param("i", $row['condition_id']);
                                        $query->execute();

                                        $conditionResult = $query->get_result();
                                        $conditionRow = $conditionResult->fetch_assoc();
                                        ?>
                                        <p>Condition: <?php echo $conditionRow['condition_name']; ?></p>
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
                        <?php
                        $imageQuery = $con->prepare("SELECT * FROM product_image WHERE product_id=?");
                        $imageQuery->bind_param("i", $row['product_id']);
                        $imageQuery->execute();

                        $imageResult = $imageQuery->get_result();
                        $imageRow = $imageResult->fetch_assoc();

                        ?>
                        <div class="img-main-ctn">
                            <img src="../images/<?php echo $imageRow['source']; ?>" alt="<?php echo $imageRow['source']; ?>" class="main-img" id="mainImage" />
                        </div>
                        <div class="img-showcase-ctn row">

                            <?php
                            foreach ($imageResult as $rowImage) {
                                echo '<div class="image-card">
                                <img style="height:100%; width:auto;" src="../images/' . $rowImage['source'] . '" alt="' . $rowImage['source'] . '" onclick="imageFunction(this)">
                                </div>';
                            }
                            ?>
                        </div>
                        <script>
                            function imageFunction(images) {
                                var fullImg = document.getElementById('mainImage');
                                fullImg.src = images.src;
                            }
                        </script>
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
                                        <p>Address: <?php echo $row['address'] ?></p>
                                    </li>
                                </ul>
                            </div>

                            <div class="right-bottom">
                                <a class="btn btn-primary" href="inbox-messenger.php">Inquire Lender</a>

                                <form action="account-tabs.php" method="POST">
                                    <input class="btn btn-primary" type="submit" name="add-bookmark" value="Bookmark">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                                </form>

                                <form action="add-cart.php" method="POST">
                                    <input class="btn btn-primary" type="submit" name="add-bookmark" value="Bookmark">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                                </form>
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
                        <tbody>
                            <?php
                            $tech = $row['technicalDesc'];
                            $pieces = explode(",", $tech);

                            foreach ($pieces as $value){
                                echo'<tr>'.$value.'</tr> </br>';
                            }
                            ?>
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