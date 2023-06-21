<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet"  href="paint.css ">
 </head>
 <body>
  <div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;overflow:hidden;background-color:white;">
    <?php include 'topnavbar.php'?>
  </div>
     <div id="content" style="position:absolute; top:110px; bottom:60px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">

   <div class="topnav">
    <a href="friends.php">我的朋友</a>
    <a href="#home">交友邀請</a>
    <a href="searchfriend.php">尋找朋友</a>
    </div>
   
     
     <input type="text" name="search_text" id="search_text" placeholder="SELECT FRIENDS"  />
 
   <br />
   <div id="result" style="background-color: yellow; margin-right: 20px;"></div>
  </div>
<div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
  <?php include "navbar.php";
  ?>
    </div>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"myfriends.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
