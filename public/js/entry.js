$(document).ready(function () {
  $('#goRight').on('click', function () {
    $('#slideBox').animate({
      'marginLeft': '0'
    });
    $('.topLayer').animate({
      'marginLeft': '100%'
    });
    document.title = 'Sign Up | Lenderoo'; 
  });
  $('#goLeft').on('click', function () {
    $('#slideBox').animate({
      'marginLeft': '50%'
    });
    $('.topLayer').animate({
      'marginLeft': '0'
    });
    document.title = 'Sign In | Lenderoo'; 
  });
});