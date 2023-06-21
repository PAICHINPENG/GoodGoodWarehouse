
<?php
include 'connection.php';
$query = "select * from product_type";
$result = mysqli_query($con,$query);
?>
<div class="logo" style="text-align: center; font-size: 40px;">GoodGoods商城</div>


<body>
   <input type="text" id="search" style="" placeholder="Search"  />
     <button type="submit"><i class="fa fa-search"></i></button>
       <form action="searchitem.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" accept="image/*" onchange="loadfile(event)">
    
            <button type="submit" name="upload" ><i class="fas fa-camera fa-2x "></i></button>
            </form>
  

   <!-- Suggestions will be displayed in below div. -->
   <div id="display"></div>


<script type="text/javascript">
  
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "search.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
});
    </script>
 <!--
<div class="newest">
     /* <?php 
      include 'connection.php';
            $query = $con->query("SELECT * FROM product   where productprice != 'NULL' limit 5  ");
             if($query->num_rows >= 0){
                while($row = $query->fetch_assoc()){
                  $name = $row['productname'];
               
      ?>
      <p><?= $name?></p>
    <?php }}?>*/
</div>
-->
<div class="scrollmenu">
  <?php
  while($row = mysqli_fetch_array($result)){
      echo '
       <a href="#" id="'.$row["typename"].'">'.$row["typename"].'</a>
       ';
  } 
  ?>

</div>

<script>
$(document).ready(function(){
 
 function load_page_details(id)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#content ').html(data);
   }
  });
 }

 load_page_details('生活用品');

 $('.scrollmenu a').click(function(){
  var typeid = $(this).attr("id");
  load_page_details(typeid);
 });
 
 
});
</script>
 

<div id="content" style="margin-top: 10%;">
  
</div>

<style type="text/css">
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
   margin-top: 5%;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>