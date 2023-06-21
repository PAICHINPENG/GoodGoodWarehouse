
    $(document).ready(function(){
       $(".quantity").on("change",function(){
            var hide = $(this).closest(".ccc");
            var id =hide.find(".cpid").val();
            var q =hide.find("#quantity").val();
            var price = hide.find(".ppprice").val();
         
            location.reload(true);
        
            $.ajax({
                url:"action.php",
                method:"post",
                cache :false,
                data:{ppid:id,pq:q,pr:price},
                success:function(response){
                    console.log(response);
                }
            });
        });
    });
