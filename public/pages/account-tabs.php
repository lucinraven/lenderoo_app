<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 * Date: 5/15/2021
 * Time: 12:05 PM
 */
include '../includes/header.php';

// checks if user is not logged in to access the page
if (!isset($_SESSION['email'])) {
    header("Location: ../pages/authentication.php");
}

$query = $con->prepare("SELECT * FROM fav WHERE user_id=?");
$query->bind_param("i", $_SESSION['user_id']);
$query->execute();

$result = $query->get_result();

?>

<!-- start of account tabs page -->
<div class="account-tabs">
    <!-- container -->
    <div class="container-sm">
        <div class="tab-view-pages">
            <!-- Tab pages button -->
            <ul class="nav nav-tabs" id="myTab0" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab0" data-mdb-toggle="tab" data-mdb-target="#profile0" type="button" role="tab" aria-controls="profile" aria-selected="true">
                        Favorites
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab0" data-mdb-toggle="tab" data-mdb-target="#contact0" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        Searches
                    </button>
                </li>
            </ul>

            <!-- Tab pages content -->
            <div class="tab-content" id="myTabContent0">

                <!-- Favorites Tab pane -->
                <div class="tab-pane fade show active" id="profile0" role="tabpanel" aria-labelledby="profile-tab0">
                    <!-- Tab view page body -->
                    <div class="tab-header">
                        <h1>Favorites</h1>
                    </div>

                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="fav-item row">

                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $product_id = $row['product_id'];

                                $product_query = $con->prepare("SELECT * FROM product WHERE product_id=?");
                                $product_query->bind_param("i", $product_id);
                                $product_query->execute();

                                $result = $product_query->get_result();
                                $product = $result->fetch_assoc();

                                $imageQuery = $con->prepare("SELECT * FROM product_image WHERE product_id=?");
                                $imageQuery->bind_param("i", $product_id);
                                $imageQuery->execute();

                                $imageResult = $imageQuery->get_result();
                                $imageRow = $imageResult->fetch_assoc();

                                if (isset($_POST['remove-bookmark'])) {

                                    $query = $con->prepare("DELETE FROM fav WHERE product_id=? AND user_id=?");
                                    $query->bind_param("ii", $row['product_id'], $_SESSION['user_id']);
                                    $query->execute();

                                    header("refresh: 1;");
                                }

                                echo '
                                <div class="left-content col-md-1">
                                    <img src="../images/' . $imageRow['source'] . '" alt="' . $imageRow['source'] . '"  />
                                </div>

                                <div class="right-content col-md-10">
                                    <h2>' . $product['product_name'] . '</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                                </div>
                                
                                <form action="" method="POST" class="delete-btn col-md-1">
                                    <button class="btn btn-primary" type="submit" name="remove-bookmark"><i class="bi bi-trash-fill"></i></button>
                                </form>';
                            }

                            ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="contact0" role="tabpanel" aria-labelledby="contact-tab0">
                    <div class="tab-header">
                        <h1>Search</h1>
                    </div>
                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="notification-item row">
                            <div class="left-content col-md-1">
                                <img src="" alt="">
                            </div>

                            <div class="right-content col-md-10">
                                <h2>Heading</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                            </div>

                            <div class="delete-btn col-md-1">
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- end of container -->
</div>
<!-- end of page container -->

<?php

include '../includes/footer.php';

?>