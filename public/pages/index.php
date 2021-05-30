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
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="view">
          <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(5)-crop.jpg" alt="First slide" />
          <a href="#!">
            <div class="mask rgba-black-light"></div>
          </a>
        </div>

        <div class="carousel-caption">
          <h3 class="h3-responsive">First shop item</h3>
          <p>First text</p>
          z
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
          <h3 class="h3-responsive">Second shop item</h3>
          <p>Secondary text</p>
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
          <h3 class="h3-responsive">Third shop item</h3>
          <p>Third text</p>
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
        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>
        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>
      </div>

      <!-- Showcased Row -->
      <div class="row">
        <h1>Frequently Borrowed Items</h1>
        <!-- Product Widget Showcase-->
        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>
        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>
      </div>

      <!-- Showcased Row -->
      <div class="row slick-class" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
        <!-- Product Widget Showcase-->
        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>
        <a class="view-item" href="../pages/view-items.php">
          <img src="" alt="" />

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </a>

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