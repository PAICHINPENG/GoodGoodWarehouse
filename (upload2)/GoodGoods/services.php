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
<style>

html,body{
    height: 100%;
  /* background-color: azure; */
    font-family: "Lato", sans-serif;
  }
  .header{
    height: 100px;
    position: relative;
    top:0;
    z-index: 900;
    background-color:white;
    color:  #FFFFFF;
  }
  .main-content{
    min-height:100%;
    padding-top: 10px;
    padding-bottom:50px;  /*same height as footer-height*/
    background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg')
  }
  .footer{
     position: relative;
     margin-top: -50px; /* negative value of footer height */
     height: 50px;
     background:hsla(50,100%,50%,0.3);
     clear:both
   }

/*header text*/
.headertext{
  color: white;
  width: 100%;
  font-size: 22px; /*字體大小*/
  line-height:67PX; /*字置中*/
  position: absolute;
  left: 10px;
}

/*右側導航欄*/
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

div.absolute{
 position: absolute;
 top: 0px;
 right: 1%;
 line-height:65PX;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


/*切換照片開始*/
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}


/*客服欄位*/
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}


/*下方按鈕 icon bar*/
.icon-bar {
  width: 100%;
  background-color: #696969;
  overflow: auto;
}
.icon-bar a {
  float: left;
  width: 25%;
  text-align: center;
  padding: 12px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}
.icon-bar a:hover {
  background-color: white;
}

.active {
  background-color: #04AA6D;
}

</style>
</head>
<body>

  <div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;overflow:hidden;background-color:white;">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<div class="headertext">
  <a href="歡迎來到GoodGoods.php">
 <!-- <img src="2選1圖片/logo1.png" style="width:20%; position:absolute; align:center;top:0px;">
  </a>

  <div class="form-outline">
    <input type="search" id="form1" class="form-control" style="width: 50%; margin-left: 50%; margin-top: 3%" />
    
  </div>-->
</div>
<?php include 'topnavbar.php'?>

  </div>
  <div id="menu">
  </div>
<div id="content" style="position:absolute; top:120px; bottom:20px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
<div class="main-content">

  <div class="slideshow-container">

  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="客服圖片/指引.jpg" style="width:100%">
    <div class="text">1</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <a href="index.php">
    <img src="客服圖片/q.jpg" style="width:100%">
    <div class="text">2</div>
    </a>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="客服圖片/聖誕活動.jpg" style="width:100%">
    <div class="text">3</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  </div>
  <br>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

  <table border="0" align="center" cellpadding="50%" cellspacing="0" style="width:100%;line-height:200px">
    <tbody><tr align="center" style="line-height:500px">
    <td><a href="">

        <img src="客服圖片/1.png" style="width:100%;">

    </a></td>
    <td><a href="">

        <img src="客服圖片/2.png" style="width: 100%;" class="ii">


    </a></td>
  </tr></tbody>
</table>
</div>
</div>


<div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
  <?php include "navbar.php";
  ?>
    </div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

</script>


</body>
</html>
