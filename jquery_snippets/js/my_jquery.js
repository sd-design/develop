$(document).ready(function() {
var $value = $('.my_value');

$('#show_jumbo').click(function(){
$('#clean').fadeIn('slow');
});

$('#show_storage').click(function(){
$('.well').fadeIn('slow');
$('.storage').html($value);
});

$('#return_storage').click(function(){
$('.well').fadeOut('slow');
$('.place_value').html($value);
});

$('.subm ').click(function(){
	var $form = $('#form1').serialize();

$('.well').show('slow');
$('.storage').html($form);
});
$('#reload').click(function(){
location.reload();
});


});