/*
Challenge for vacancy of Frontend developer
SD-DESIGN

*/
var calculator = function(){
var result = 0;	


 $( "#1" ).on( "click", function() {
 if (result==0)result = '';
 	result = result + $( "#1" ).text();
 	$('.result').html(result);
    });
 $( "#2" ).on( "click", function() {
 if (result==0)result = '';
 	result = result + $( "#2" ).text();
  $('.result').html(result);
    });
  $( "#3" ).on( "click", function() {
 if (result==0)result = '';
 	result = result + $( "#3" ).text();
$('.result').html(result);
    });
    $( "#4" ).on( "click", function() {
 if (result==0)result = '';
 	result = result + $( "#4" ).text();
 	$('.result').html(result);
    });
     $( "#5" ).on( "click", function() {
 	if (result==0)result = '';
 	result = result + $( "#5" ).text();
 	$('.result').html(result);
    });
      $( "#6" ).on( "click", function() {
 	if (result==0)result = '';
 	result = result + $( "#6" ).text();
 	$('.result').html(result);
    });
       $( "#7" ).on( "click", function() {
 if (result==0)result = '';
 	result = result + $( "#7" ).text();
$('.result').html(result);
    });
        $( "#8" ).on( "click", function() {
 	if (result==0)result = '';
 	result = result + $( "#8" ).text();
$('.result').html(result);
    });
         $( "#9" ).on( "click", function() {
 if (result==0)result = '';
 	result = result + $( "#9" ).text();
$('.result').html(result);
    });
          $( "#zero" ).on( "click", function() {
if (result==0)result = '';
 	result = result + $( "#zero" ).text();
$('.result').html(result);
    });
    $( "#coma" ).on( "click", function() {
    if (result==0)result = '';
 	result =  result + '.';
$('.result').html(result);
    });

          $( "#clear" ).on( "click", function() {
result = 0;
$('.result').html(result);
    });


$('.result').html(result);
};


$( document ).ready(calculator);