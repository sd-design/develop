$(document).ready(function(){

    $("img").animate({ top: '+=500px'}, 3800);
/* Bounce effect and slide effect & other. It works with library jqueryui */
       $(".bounce").click(function(){
      $("#bounce").effect('bounce', {times:3},500);
       });
     $(".slide").click(function(){
      $("#bounce").effect('slide', {times:3},500);
       });
          $(".shake").click(function(){
      $("#bounce").effect('shake', {times:3},500);
       });
     $(".puff").click(
     	function(){
      $("#bounce").toggle('puff',500);
  }
       );
});