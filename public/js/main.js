/*
const burger = document.getElementById('burger');
const navLinks = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
})

$('#recipeCarousel').carousel({
    interval: 10000
  })
  
  $('.carousel .carousel-item').each(function() {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  
    for (var i = 0; i < minPerSlide; i++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
  
      next.children(':first-child').clone().appendTo($(this));
    }
  });
  @media (max-width: 768px) {
    .carousel-inner .carousel-item>div {
      display: none;
    }
    .carousel-inner .carousel-item>div:first-child {
      display: block;
    }
  }
  
  .carousel-inner .carousel-item.active,
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    display: flex;
  }
    
  @media (min-width: 768px) {
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(33.333%);
    }
    .carousel-inner .carousel-item-left.active,
    .carousel-inner .carousel-item-prev {
      transform: translateX(-33.333%);
    }
  }
  
  .carousel-inner .carousel-item-right,
  .carousel-inner .carousel-item-left {
    transform: translateX(0);
  }
  */

  /* Tab Views in my account page */
  function openTab(event, tabPages) {
    var i, x, tablinks;
    x = document.getElementsByClassName("acc-tabs");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
    }
    document.getElementById(tabPages).style.display = "block";
    evt.currentTarget.className += " w3-red";
  }
  /* end of tab view codes */