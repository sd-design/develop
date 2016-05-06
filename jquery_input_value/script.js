$(document).ready(
  function(){
      $("#button").click("on", function(){
          
          
      var toAdd = $('input[name=checkListItem]').val();
      var fromDate = $("#dateFrom").val();
      fromD = fromDate;
      if (fromDate != 0){
$(".check_data").fadeOut(1000);}
      if (fromDate == 0){ fromD = 0;
$(".check_data").fadeIn(1000);
return false;
      }
      else{
      $("#messages").append('<div class="item">' + toAdd + fromD + '</div>');
      }
  });

      $(document).on("click", ".item", function(){
          $(this).remove();
          });

      });