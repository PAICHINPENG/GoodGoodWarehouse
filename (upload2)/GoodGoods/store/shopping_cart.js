 $(document).ready(function(){

 // Delete 
 $('.delbut').click(function(){

    var el = this;
   // Delete id
   var deleteid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { aid:deleteid },
        success: function(response){

        
        
        // Remove row from HTML Table
        
            $(el).closest('tr').fadeOut(800,function(){
           $(this).remove();

          
        });
          

   

        }
      });
   }

 });

});

 $(document).ready(function(){
   $(".itemqty").on("change",function(){


   var hide = $(this).closest("tr");

   var id = hide.find(".pid").val();
   var price = hide.find(".pprice").val();
   var qty = hide.find(".itemqty").val();
   

   location.reload(true);
   $.ajax({
      url :"action.php",
      method:"post",
      cache:false,
      data:{pqty:qty,pid:id,pprice:price},
      success:function(response){
         console.log(response);
      }

    });
  });
});

$(document).ready(function(){
   $('placeorder').submit(function(e){
      e.preventDefault();

      $.ajax({
         url:"action.php",
         method:"post",
         data:("form").serialize()+"&action=order",
         success:function(response){
            $("#showorder").html(response);
         }
      
      })
   })
})