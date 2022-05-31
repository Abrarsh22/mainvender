$(document).ready(function(){

 // Delete 
 $('#deleterow').click(function(){
   var el = this;
  
   // Delete id
   var deletename = $(this).data('name');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: { deletename:name },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});