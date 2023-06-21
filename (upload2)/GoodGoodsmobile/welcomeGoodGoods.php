
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
</head>
<body>
	<div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
<div class="headertext">Goodgoods好好藏</div>
<?php include 'topnav.php'?>
	 <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:white;">
	 
<br>
<br>
<br>
<br>
<br>

<a href="warehouse.php">
  <div class="maim-container">
    <img src="logo3@4x.png" style="width: 90%;position: relative;left: 5%">
  </div>
</a> 
<br>
<br>
<br>
<br>
<br>
<hr class="style-one" />
<br>
<br>
<br>
<br>
<br>
<a href="store/storehome.php">
  <div class="container">
    <img src="logo4@4x.png" style="width: 140%;position: relative;left: -19%;">
  </div>
</a>

	</div>
    <div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">
<?php include 'bottomnav.php'?>

</body>
</html>