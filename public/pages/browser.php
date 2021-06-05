<?php

/** 
 * User: Zaira Mundo <zairajune@gmail.com> 
 * Date: 4/23/2021
 * Time: 11:36 PM
 */

include '../includes/header.php';
    
    if(isset($_GET['priceFrom']) && isset($_GET['priceTo']) ){
        $_SESSION['priceFrom'] = $_GET['priceFrom'];
        $_SESSION['priceTo'] = $_GET['priceTo'];
    }
    if(isset($_GET['condition'])){
        $_SESSION['conditionId'] = $_GET['condition'];
    }
    if(isset($_GET['category'])){
        $_SESSION['categoryId'] = $_GET['category'];
    }

    $sql = "SELECT product_title,product_name,price FROM `product` WHERE 1";
    $where = "";

    $bindType = "";
    $bindArray = [];
    if(isset($_SESSION['priceFrom']) && isset($_SESSION['priceTo']) ){
        $bindType .= 'dd';
        $where .= " AND price BETWEEN ? AND ?";
        array_push($bindArray,$_SESSION['priceFrom'],$_SESSION['priceTo']);

    }
    if(isset($_SESSION['conditionId'])){
        $bindType .= 'i';
        $where .= " AND condition_id = ?";
        array_push($bindArray,$_SESSION['conditionId']);
    }
    if(isset($_SESSION['categoryId'])){
        $bindType .= 'i';
        $where .= " AND category_id = ?";
        array_push($bindArray,$_SESSION['categoryId']);
    }

    $stmt = $con->prepare($sql . $where);
    if(count($bindArray) > 0) $stmt->bind_param($bindType,...$bindArray);
    $stmt->execute();

    $result = $stmt->get_result();
    
?>

<div class="browser-page-ctn">
    <div class="container">
        <div class="browser-body row">
            <!-- SideNav -->
            <div class="col-md-2">
                <div class="category-filter">
                    <h1>Category</h1>
                    <?php 
                        $sql = "SELECT id,category_name FROM category";


                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $array = [];
                        foreach ($stmt->get_result() as $row){
                    ?>
                            <ul>
                                <li><?php echo'<a href="./browser.php?category='.$row['id'].'">'.$row['category_name'].'</a>' ?></li>
                            </ul>
                    <?php
                        }
                    ?>
                </div>

                <div class="price-filter">
                    <h1>Price</h1>
                    <ul>
                        <li><a href="./browser.php?priceFrom=0&priceTo=25">Up to 25 Aed</a></li>
                        <li><a href="./browser.php?priceFrom=25&priceTo=50">25 to 50 Aed</a></li>
                        <li><a href="./browser.php?priceFrom=50&priceTo=100">50 to 100 Aed</a></li>
                        <li><a href="./browser.php?priceFrom=100&priceTo=350">100 to 350 Aed</a></li>
                        <li><a href="./browser.php?priceFrom=350&priceTo=700">350 to 700 Aed</a></li>
                    </ul>
                </div>
                <div class="condition-filter">
                    <h1>Category</h1>
                    <?php 
                        $sql = "SELECT id,condition_name FROM product_condition";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();   
                        foreach ($stmt->get_result() as $row){
                    ?>
                            <ul>
                                <li><?php echo'<a href="./browser.php?category='.$row['id'].'">'.$row['condition_name'].'</a>' ?></li>
                            </ul>
                    <?php
                        }
                    ?>
                </div>
            </div>

            <div class="row col-md-10">
                <h1>Popular Items</h1>
                <div class="item-showcase">
                    <!-- Product Widget Showcase-->
                    <?php 

                    while($row = $result->fetch_assoc())
                    
                    echo '<div class="item-widget">
                        <img src="" alt="">

                        <h2 class="item-heading">'.$row['product_title'].'</h2>
                        <h2 class="price-heading">'.$row['price'].' AED/Day</h2>
                    </div>';

                    ?>



                    <!-- filling gaps or spaces on row with empty child divs -->
                    <div class="filling-empty-space-childs"></div>
                    <div class="filling-empty-space-childs"></div>
                    <div class="filling-empty-space-childs"></div>
                </div>

                <!-- Index body footer -->
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
        </div>
    </div>
</div>

<?php

include '../includes/footer.php';

?>