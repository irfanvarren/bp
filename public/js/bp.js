$(document).ready(function(){
$('#see-more-btn').click(function(){
   $('.hide-country').slideToggle(600,function(){
  });
   if ($(this).val() == "See More") {
      $(this).val("Hide");
   }
   else {
      $(this).val("See More");
   }
    });
    });
