$(document).ready(function() {
var name = 'Локальная переменная';
var localValue = 'значение 1';
var printvalue = '';
var keyname = '';

$("#form").on('click','.subm',function() {
keyname = $('#inputname').val();
printvalue = $('#inputvalue').val();
	$.localStorage.setItem(keyname, printvalue);
	console.log(keyname);
	$('.inputname').val('');
	$('.inputvalue').val('');
	});

$('#clean').fadeIn(2600);

$('#clean').on('click','.upload', function(){

keyname = 'val2';	
var now = new Date();
$.localStorage.setItem(keyname, now);

	});
$('#clean').on('click','.get', function(){
keyname = $('#inputname').val();

var valt = $.localStorage.getItem(keyname);
$('.storage').html(valt).fadeIn();

	});
});