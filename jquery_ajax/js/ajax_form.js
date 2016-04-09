 var check_nomination = function() {
     $( "#nomination" ).change(
        function(){
var check = $("#nomination option:selected").val();

if(check != 0){
$("#go_check").fadeIn(1000);
}
if(check == 0){
$("#go_check").fadeOut(1000);
}


        });



    };

var accept_foto = function() {
  $("#go_check").click(function() {

var descript_foto = $("#descript_foto").val();
var nomination_id = $("#nomination").val();
console.log(descript_foto);
console.log(nomination_id);
        $.ajax({
            type: 'POST',
            url: "send.php",
            data: {'descript_foto': descript_foto, 'nomination_id': nomination_id},
            success: function (result){
                $("#fileupload").fadeOut(1400);
                $("#result_registration").hide().html(result).fadeIn(1000);
            }
        });

    });

 };

$(document).ready(check_nomination); 
$(document).ready(accept_foto); 