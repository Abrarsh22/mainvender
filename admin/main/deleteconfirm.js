$(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
    var $el = $(this).parent().parent();
  var name = $(this).data('name');
  
   // Delete name
   
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      $.ajax({
        url:'delete.php',
    type:'POST',
    data:{'name':name},
    success: function(data){
         if(data=="YES"){
             $el.fadeOut().remove();
         }else{
             alert("can't delete the row")
         }
       }

     });
   }
 });
});