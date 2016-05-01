$(document).ready(function() {
var request = '';
var filename = '';
$('#clean').fadeIn(2600);

//Video page
$('#menu').on('click', '.openvideo', function() {
$('#menu').find('li.active').removeClass();
$(this).parent().addClass("active");
$(".well").fadeIn(2000);

$.ajax('videos.html', { success: function(response) {
$('.gallery').html(response).fadeIn();

}, cache: false
});

    });

//Posts page
$('#menu').on('click', '.openposts', function() {
$('#menu').find('li.active').removeClass();
$(this).parent().addClass("active");

$(".well").fadeIn(2000);
$.ajax('posts.html', { success: function(response) {
$('.gallery').html(response).fadeIn();

}, cache: false
});

    });

//About page
$('#menu').on('click', '.about', function() {
$('#menu').find('li.active').removeClass();
$(this).parent().addClass("active");

$(".well").fadeIn(2000);
$.ajax('About.html', { success: function(response) {
$('.gallery').html(response).fadeIn();

}, cache: false
});

    });

//Contacts page
$('#menu').on('click', '.contacts', function() {
$('#menu').find('li.active').removeClass();
$(this).parent().addClass("active");

$(".well").fadeIn(2000);
$.ajax('contacts.html', { success: function(response) {
$('.gallery').html(response).fadeIn();

}, cache: false
});

    });

//Clear menu & pages
$('.clear').on('click', function() {
$('ul#menu').find('li.active').removeClass();
$('#menu li').first().addClass("active");
    $(".well").fadeOut(900);
$(".gallery").empty();

   });

});