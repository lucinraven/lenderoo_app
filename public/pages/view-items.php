<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com>  
 *       Zaira Mundo <zairajune@gmail.com>
 * Date: 5/9/2021
 * Time: 12:54 AM
 */
include '../includes/header.php';

if(isset($_POST['post-review'])){
    $sql = "INSERT INTO product_reviews VALUES ('', ? , ? , ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sii",$_POST['post-review'], $_SESSION['user_id'], $_GET['prod_id']);
    $stmt->execute();
}

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
$row = $result->fetch_assoc();
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
                                <h1><?php echo $row['price']; ?> AED / Day</h1>
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
<<<<<<< HEAD
                            
                                <!-- <form action="input-messenger.php" method="POST">
                                    <input class="btn btn-primary" type="submit" name="add-cart" value="Not working">
                                    <input type="hidden" name="product_id" value="<?php echo $row['lender_id'] ?>">
                                </form> -->
=======

                                <form action="inbox-messenger.php" method="POST">
                                    <input class="btn btn-primary" type="submit" name="add-cart" value="Inquire Information">
                                    <input type="hidden" name="lender_id" value="<?php echo $row['lender_id'] ?>">
                                </form>
>>>>>>> 6cb0ace2be4c27c0d6aa42c022c2b842d3c3bcb6

                                <?php
                                $bookmark_check = $con->prepare("SELECT fav_id FROM fav WHERE product_id=? AND user_id=?");
                                $bookmark_check->bind_param("ii", $row['product_id'], $_SESSION['user_id']);
                                $bookmark_check->execute();

                                $result = $bookmark_check->get_result();

                                //Count the number of rows returned
                                $num_rows = $result->num_rows;

                                if ($num_rows == 1) {
                                    echo '
                                    <form action="" method="POST">
                                        <input class="btn btn-primary" type="submit" name="remove-bookmark" value="Remove Bookmark">
                                    </form>';

                                    if (isset($_POST['remove-bookmark'])) {

                                        $query = $con->prepare("DELETE FROM fav WHERE product_id=? AND user_id=?");
                                        $query->bind_param("ii", $row['product_id'], $_SESSION['user_id']);
                                        $query->execute();

                                        header("refresh: 1;");
                                    }
                                } else {
                                    echo '
                                    <form action="" method="POST">
                                        <input class="btn btn-primary" type="submit" name="add-bookmark" value="Bookmark">
                                    </form>';

                                    if (isset($_POST['add-bookmark'])) {

                                        $query = $con->prepare("INSERT INTO fav VALUES('', ?, ?, NOW())");
                                        $query->bind_param("ii", $row['product_id'], $_SESSION['user_id']);
                                        $query->execute();

                                        header("refresh: 1;");
                                    }
                                };
                                ?>

                                <form action="add-cart.php" method="POST">
                                    <input class="btn btn-primary" type="submit" name="add-cart" value="Cart">
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

                            foreach ($pieces as $value) {
                                echo '<tr>' . $value . '</tr> </br>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="customer-review-ctn">
                <h1>Customer Review</h1>

                <?php
                $sql = "SELECT u.user_id, u.firstName, u.lastName, pr.review FROM product_reviews pr LEFT JOIN users u ON pr.user_id = u.user_id INNER JOIN product p ON pr.product_id = p.product_id WHERE pr.product_id = ? GROUP BY pr.id";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $_GET['prod_id']);
                $stmt->execute();

                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    echo '<div class="post-review">
                        <h5>'; echo ($row['user_id'] != null ) ? $row['firstName'].' '.$row['lastName'] : "Guest"; echo '</p>
                            <p class="comment">'.$row['review'].'</p>
                    </div>';
                }

                
                
                ?>
                


                <div class="post-review-ctn">
                    <h1>Write a review</h1>
                    <form method="POST" action="./view-items.php?prod_id=<?php echo $_GET['prod_id']; ?>">
                        <textarea name="post-review" id="" cols="30" rows="10"></textarea>
                        <input class="btn" type="submit" value="Post">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include '../includes/footer.php';

?>