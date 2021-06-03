// My account user orders and inventory clickable row
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

// Calendar Date selection on review-checkout page
$(function() {
    $('input[name="daterange"]').daterangepicker();
    $('input[name="daterange"]').change(function(){
      $(this).val();
      console.log($(this).val());
    });
});