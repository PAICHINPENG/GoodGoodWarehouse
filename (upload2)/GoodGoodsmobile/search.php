<?php
include 'connection.php';
session_start();

  if(isset($_SESSION['luseraccount']))
  {     
     // $user = $_SESSION['luseraccount'];
   
  }else{
    header("location:LoginGoodGoods.php");
  }


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="style.css ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <style type="text/css">
   
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat',sans-serif;
}

 </style>
</head>
<body>

  <div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
    <div class="headertext">Goodgoods好好藏</div>
  
      
      <?php include 'topnav.php'?>
 </div>
  <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:white;">
    <h2 style="text-align:center;font-size: 5em;margin-top: 2em;">歡迎使用GoodGoods智慧搜尋功能</h2>
        <div class="main" style="font-size: 2.5em; margin-top: 8em;margin-left:2em ;">
            以圖搜圖:
            <form action="searchresult.php" method="post" enctype="multipart/form-data">
                <input type="file" name="photo" accept="image/*" onchange="loadfile(event)">
    
                <button type="submit" name="upload" ><i class="fas fa-camera fa-2x"></i></button>
            </form>
            <br>
             文字搜尋:
            <form action="searchresult.php" method="POST">

                <input type="text" name="search">

                <button type="submit" name="up"><i class="fas fa-pen fa-2x"></i></button>

            </form>
  


  

  

  
</div>
  </div>
    <div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">

      <?php include 'bottomnav.php'?>
    </div>

</body>
</html>