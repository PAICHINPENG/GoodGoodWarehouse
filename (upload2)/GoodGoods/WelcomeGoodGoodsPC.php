<?php
include 'connection.php';

session_start();

  if(isset($_SESSION['luseraccount']))
  {
     // $user = $_SESSION['luseraccount'];

  }else{
    header("location:LoginGoodGoodsPC.php");
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
 <link rel="stylesheet"  href="paint.css ">
</head>
<body>
	<div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;overflow:hidden;background-color:white;">
    <?php include 'topnavbar.php'?>
	</div>
	 <div id="content" style="position:absolute; top:110px; bottom:60px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
     <div class="say">

     </div>
     <style>
.test {
  position: relative;
  width: 50%;
}

.ii {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: orange;
  border-radius: 5%;
}

.test:hover .overlay {
  opacity: 1;
}

.tex {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>
     <table border="0" align="center" cellpadding="50%" cellspacing="0" style="width:100%;line-height:200px">
       <tbody><tr align="center" style="line-height:500px">
       <td><a href="warehousePC.php">
    
           <img src="2選1圖片/logo3.png" style="width:80%;">

       </a></td>
       <td><a href="store/storehome.php">
        
           <img src="2選1圖片/logo4.png" style="width: 100%;" class="ii">
         
      
       </a></td>
     </tr></tbody>
   </table>
     
      <a href="mailto:GoodGoods@gmail.com?subject=QA問與答"><button class="btn btn-danger"  style="position: fixed;bottom:100PX;right: 50px;background-color:orange;">寄信給我們</button></a>
</div>
	</div>


    <div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
  <?php include "navbar.php";
  ?>
    </div>

</body>
</html>
