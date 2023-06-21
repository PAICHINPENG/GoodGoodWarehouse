<?php
include 'connection.php';
session_start();

  if(isset($_SESSION['luseraccount']))
  {     
     // $user = $_SESSION['luseraccount'];
   
  }else{
    header("location:new登入註冊.php");
  }
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width;initial-scale=10.0">
<link rel="stylesheet"  href="設計.css ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 </head>
</head>
<html>
  <body >
  <div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
    <div class="headertext">Goodgoods好好藏</div>

     <div id="mySidenav" class="sidenav">   
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href=""><font size="5">Welcome!<?= $_SESSION['luseraccount']?></font></a>    
        <a href="new客服頁面.html">客服中心</a>
        <a href="logout.php">登出</a>
      </div>
      <div class=absolute>
        <span style="font-size:110px;cursor:pointer;" onclick="openNav()">&#9776;</span>
      </div>
      <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";   /*右側導航欄*/
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  </div>
    <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:#555;">
   
  </div>

      <div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">
    <div class="icon-bar">
      <a href="歡迎來到GoodGoods.php"><img src="導航欄圖片/goodgoods1.png" style="width:50%;height: 100%;"></a> 
      <a href="#"><img src="導航欄圖片/goodgoods2.png" style="width:50%;height: 100%;"></a> 
      <a href="朋友.php"><img src="導航欄圖片/goodgoods3.png" style="width:50%;height: 100%;"></a> 
      <a href="個人資料.php"><img src="導航欄圖片/goodgoods4.png" style="width:50%;height: 100%;"></a>
    </div>
    </div>
 
  </body>
</html> 