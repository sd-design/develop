$(document).ready(function() {
var request = '';
var filename = '';

	$.ajax({
                    url: "js/session.php",
                    type:"POST",
                    success: function(result) {
console.log(result);
$('[name=key]').val(result);
}

            });

	$("#form").submit(function() {
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: $(this).serialize()
		}).done(function() {
			var status = "Спасибо за инфу! Скоро мы с вами свяжемся. ФСБ";
			$(this).find("input").val("");
			$('<div><h2>').addClass("alert alert-warning").text(status).prependTo('.status');
			$('.status').children('div').fadeOut(4800);
			$("#form").trigger("reset");
		});
			return false;
	});
	
$("#list").click(function(){

	$.ajax({
					url: "js/row.php",
                    type:"POST",
                    data: {action: "list"},
                    dataType: "json",
                    success: function(result) {
                    	console.log(result);
   var fl = '';
    for (var n in result.files){
    	var len = result.files[n].length;
    	var name = result.files[n].substring(len-5,0);
      fl += '<li class="event-block"><a class="open" href="#" data-path="'+ result.files[n] +'">' + name +'</a></li>';
    }
    $(".grid").html(fl);
  }
	  });
$("#pano").toggle();
$("#note").hide();

});

$("#installkey").click(function(){

var crypta_key = $('.crypt_val').val();
	$.ajax({
					url: "js/session.php",
                    type:"GET",
                    data: {crypt_key: crypta_key},
                    success: function(result) {
                    console.log(result);
 
  }
	  });


	$.ajax({
                    url: "js/session.php",
                    type:"POST",
                    success: function(result) {
console.log(result);
$('[name=key]').val(result);
}

            });

});
	

$('#events').on('click', '.open', function() {

var filename = $(this).closest('.open').data('path');
console.log(filename);
var request = "action=read&file=" + filename;

$.ajax({
	type:"POST",
	url: "js/row.php",
    data: request,
    success: function(result) {
    
     $(".eventinfo").html(result);
 }

	});	
$("#note").show();

});

$('#cryptakey').on('click', '.openkey', function() {
$(".crypt").toggle();
	});

});