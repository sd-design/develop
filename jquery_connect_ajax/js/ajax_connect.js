var request = function() {

        $.ajax({
            type: 'GET',
            timeout: 2000,
            url: "random.php",
            success: function (result){
               $("#result_registration").hide().html(result).toggle();
            }
        });


 };

$(document).ready( function(){
	setInterval(request, 2000);
}); 
