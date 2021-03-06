<?php

/** 
 * User: Jester Robin Domingo <>
 *       Zaira Mundo <zairajune@gmail.com>
 *       Raven Lucin <lucinraven@gmail.com>
 * Date: 4/22/2021
 * Time: 11:30 PM
 */

include '../includes/header.php';

?>

<!---START OF CAROUSEL -->
<!--Section: Block Content-->
<section>
  <!--Carousel Wrapper-->
  <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/Indicators-->

    <!--Slides-->
    <div class="overlay">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(5)-crop.jpg" alt="First slide" />
            <a href="#!">
              <div class="mask rgba-black-light"></div>
            </a>
          </div>

          <div class="carousel-caption">
         
          </div>
        </div>

        <div class="carousel-item">
          <!--Mask color-->
          <div class="view">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(4)-crop.jpg" alt="Second slide" />
            <a href="#!">
              <div class="mask rgba-black-light"></div>
            </a>
          </div>

          <div class="carousel-caption">
           
          </div>
        </div>

        <div class="carousel-item">
          <!--Mask color-->
          <div class="view">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(3)-crop.jpg" alt="Third slide" />
            <a href="#!">
              <div class="mask rgba-black-light"></div>
            </a>
          </div>

          <div class="carousel-caption">
           
          </div>
        </div>
      </div>
    </div>
    <!--/Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/Controls-->
  </div>
  <!--/Carousel Wrapper-->
</section>
<!--Section: Block Content-->

<!---END OF CAROUSEL -->

<!---Start of scroll page -->
<div class="index-pg-body">
  <div class="container-lg">
    <div class="items-showcase">
      <!-- Showcased Row -->
      <div class="row">
        <h1>Featured</h1>
        <!-- Product Widget Showcase-->
        <?php
        $sql = "SELECT * FROM `product` LEFT JOIN product_image ON product.product_id = product_image.product_id GROUP BY product.product_id ORDER BY click_counter DESC LIMIT 5"; //remove product_title, and add product_names in DB
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($featured_row = $result->fetch_assoc()) {

          echo '<a class="view-item" href="../pages/view-items.php?prod_id=' . $featured_row['product_id'] . '">
            <div class="card-content-image">
              <img src="../images/'.$featured_row['source'].'" alt="'.$featured_row['source'].'"  />
            </div>

            <div class="card-content-body">
              <h2>' . $featured_row['product_title'] . '</h2>
            </div>

            <div class="card-content-footer">
              <p>' . $featured_row['price'] . ' Aed/Day</p>
            </div>  
          </a>';
        };
        ?>
        <!-- filling gaps or spaces on row with empty child divs -->
        <div class="filling-empty-space-childs"></div>
        <div class="filling-empty-space-childs"></div>
        <div class="filling-empty-space-childs"></div>
      </div>

      <!-- Showcased Row -->
      <div class="row">
        <h1>Browse</h1>
        <?php
        $sql = "SELECT product.product_id, product_name,product_title, price, source FROM `product` LEFT JOIN product_image ON product.product_id = product_image.product_id GROUP BY product.product_id LIMIT 5"; //remove product_title, and add product_names in DB
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

          echo '<a class="view-item" href="../pages/view-items.php?prod_id=' . $row['product_id'] . '">
              <div class="card-content-image">
                  <img src="../images/'.$row['source'].'" alt="'.$row['source'].'"  />
               </div>

              <div class="card-content-body">
                  <h2>' . $row['product_title'] . '</h2>
              </div>

              <div class="card-content-footer">
                  <p>' . $row['price'] . ' Aed/Day</p>
               </div>  
            </a>';
        };
        ?>

        <!-- filling gaps or spaces on row with empty child divs -->
        <div class="filling-empty-space-childs"></div>
        <div class="filling-empty-space-childs"></div>
        <div class="filling-empty-space-childs"></div>

        <!-- pagination footer -->
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

<!-- Slick javascript -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<?php

include '../includes/footer.php';

?>