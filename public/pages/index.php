<?php

/** 
 * User: Jester Robin Domingo <>
 *       Zaira Mundo <zairajune@gmail.com>
 *       Raven Lucin <lucinraven@gmail.com>
 * Date: 4/22/2021
 * Time: 11:30 PM
 */

include 'includes/header.php';

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
          <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(5)-crop.jpg" alt="First slide">
          <a href="#!">
            <div class="mask rgba-black-light"></div>
          </a>
        </div>

        <div class="carousel-caption">
          <h3 class="h3-responsive">First shop item</h3>
          <p>First text</p>z
        </div>
      </div>

      <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(4)-crop.jpg" alt="Second slide">
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
          <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/clothes(3)-crop.jpg" alt="Third slide">
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
      <div class="row">
        <h1>Featured Items</h1>
        <!-- Product Widget Showcase-->
        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>
      </div>

      <div class="row">
        <h1>Frequently Borrowed Items</h1>

        <!-- Product Widget Showcase-->
        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

      </div>

      <div class="row">
        <h1>Bundles</h1>
        <!-- Product Widget Showcase-->
        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>

        <div class="item-widget">
          <img src="" alt="">

          <h2>Title</h2>
          <p>50 Aed/Day</p>
        </div>
      </div>
      
      <div class="row">
        <h1>Popular Items</h1>
        <!-- Product Widget Showcase-->
        <a class="view-item" href="../pages/view-items.php">
          <div class="item-widget">
            <img src="" alt="">

            <h2>Title</h2>
            <p>50 Aed/Day</p>
          </div>
        </a>
      </div>
    </div>
  </div>

<!--
  <div class="row mx-auto my-auto">

    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
      <div class="carousel-inner w-100" role="listbox">
        <div class="carousel-item active">
          <div class="col-md-4">
            <div class="card card-body">
              <img class="img-fluid" src="http://placehold.it/280x350?text=1">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="col-md-4">
            <div class="card card-body">
              <img class="img-fluid" src="http://placehold.it/280x350?text=2">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="col-md-4">
            <div class="card card-body">
              <img class="img-fluid" src="http://placehold.it/280x350?text=3">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="col-md-4">
            <div class="card card-body">
              <img class="img-fluid" src="http://placehold.it/280x350?text=4">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="col-md-4">
            <div class="card card-body">
              <img class="img-fluid" src="http://placehold.it/280x350?text=5">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="col-md-4">
            <div class="card card-body">
              <img class="img-fluid" src="http://placehold.it/280x350?text=6">
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
-->
</div>

<?php

include 'includes/footer.php';

?>