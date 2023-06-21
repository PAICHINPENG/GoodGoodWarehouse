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
	<link rel="stylesheet"  href="paint.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Script -->
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.17.0/jquery.tablesorter.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
<div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;overflow:hidden;background-color:white;">
    <?php include 'topnavbar.php'?>
</div>
<div id="content" style="position:absolute; top:110px; bottom:60px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
<!--搜尋欄位-->

<div class="search">
<table id="restable">

	  <thead>
	  	<tr>
	  	<th colspan='5 '>物品搜尋</th>
	  </tr>
	  <tr>
	  	<th>物品照片</th>
	    <th>物品名稱</th>
	    <th>描述</th>
	    <th>類別</th>
	    <th>所屬倉庫/箱子</th>
	  </tr>
	</thead>
	<tbody>
<?php 
$query = '';
if (isset($_POST['search'])) {
$pro = $_POST['search'];
$query = $con->query("SELECT * from goods where goodsname like '%$pro%' AND useraccount = '".$_SESSION['luseraccount']."' ");
}
elseif (isset($_POST['upload'])) {
	$msg = '';
	$originname = $_FILES['photo']['name'];
	$extend = 'jpg';
	$num = 'pppp';
	$rename = $num.'.'.$extend;
	$tmpname = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmpname,"../py/".$rename);
	sleep(1);
	$file = '../pppp.txt';
	$myfile = fopen("../pytxt/pppp.txt","r");
	$chinese = '';
	$read = fgets($myfile);
	switch ($read) {
		case 'watch':
			$chinese = '錶';
			#echo $chinese;
			break;
		case 'bag':
			$chinese = '包';
			#echo $chinese;
			break;
		case 'shoes':
			$chinese = '鞋';
			#echo $chinese;
			break;
		case 'hair dryer':
			$chinese = '吹風機';
			#echo $chinese;
			break;
		case 'cup':
			$chinese = '杯';
			#echo $chinese;
			break;
		case 'camera':
			$chinese = '相機';
			#echo $chinese;
			break;
		case 'broom':
			$chinese = '掃把';
			#echo $chinese;
			break;
		case 'bottle':
			$chinese = '壺';
			#echo $chinese;
			break;			
	}
	fclose($myfile);
	 

$query = $con->query("SELECT * from goods where goodsname like '%$chinese%' AND useraccount = '".$_SESSION['luseraccount']."' ");

 }

if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
       	$name = $row['goodsname'];
       	$dis = $row['goodsdiscription'];
       	$type = $row['type'];
       	$wname = $row['depotname'];
       	$bname = $row['casename'];
       	$belong = $wname.'/'.$bname;
       	$img = '../goodgoodsimg/'.$row["goodspic"];

   		
?>
	  <tr class="htmw">
	  	<td data-o="物品照片"><img style="weight:100px;height:100px" src="<?= $img?>"></td>
	    <td data-o="物品名稱"><?= $name?></td>
	    <td data-o="描述"><?= $dis?></td>
	    <td data-o="類別"><?=$type?></td>
	    <td data-o="所屬倉庫/箱子"><?= $belong?></td>
	  </tr>
	  <?php }}?>
	</tbody>
	</table>
</div>

</div>
<div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
  	<?php include "navbar.php";?>
</div>

</body>
</html>
<script type="text/javascript">
	$(function() {
  $("#restable").tablesorter();
});
</script>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Lato);

*{
  margin: 0;
  padding: 0;
}
body{
  font-family:'Lato', sans-serif;
  background:#edeff0;
}
#restable{
  background:#fff;
  color:#777;
  overflow:hidden;
  min-width:300px;
  max-width:94%;
  margin:1em auto;
  border-collapse:collapse;
}
#restable th, 
#restable td:before{
  color:#5a6772;
  text-align:left;
  display:none;
}
#restable tr:nth-child(2) th{
  cursor:pointer;
}
#restable tr:nth-child(2) th:hover{
  color:orange;
}
#restable tr:first-child th{
  display:table-cell;
  text-align:center;
  background:#505050;
  color:#fff;
  padding:1em .5em !important;
}
#restable tr:nth-child(2) th{
  background:#707070;
  color:#fff;
}
#restable tr,
#restable td:first-child{
  -webkit-background-size:40px;
  -moz-background-size:40px;
  -o-background-size:40px;
  background-size:40px;
  background-repeat:no-repeat;
  background-position:95% 65%;
}
#restable tr,
#restable td:first-child{
  -webkit-transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
  -moz-transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
  -o-transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
  transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
}
#restable td{
  display:block;
  padding:0 .5em;
}
#restable td:first-child{
  padding-top:1em;
  background-position:0 -100px;
  color:#333;
  font-weight:600;
}
#restable td:last-child{
  padding-bottom:1em;
  border-bottom:1px solid #ccc;
}
#restable tr:last-child td:last-child{
  border-bottom:none;
}
#restable td:before{
  content:attr(data-o);
  font-weight:bold;
  width:6.5em;
  display:inline-block;
}
#restable tr:nth-child(even){
  background-color:#ebf2f1 !important;
}
@media (min-width: 480px){
  #restable tr{
    background-position:150% 50%;
    background:transparent !important;
  }
  #restable td:before{
    display:none;
  }
  #restable th, #restable td{
    display:table-cell;
    padding:1.5em;
  }
  #restable td:first-child{
    padding-left:70px;
    background-position:5% 50%;
  }
  #restable td:last-child{
    border-bottom:none;
  }
}
/* logos */
.htmw, .htmw td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_html_howtomakeawebsite_stage01.png");
}
.html, .html td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/HTML_Forms.png");
}
.css, .css td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_DD_CSS_Stage6.png");
}
.programming, .programming td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage5.png");
}
.js, .js td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage3.png");
}
.jquery, .jquery td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage1.png");
}
.accessibility, .accessibility td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage4.png");
}
.optimization, .optimization td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_chromeDev_Stage1.png");
}
.console, .console td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage2.png");
}
.git, .git td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_DD_Git_Stage3.png");
}
.sass, .sass td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_DD_SASS_Stage1.png");
}

</style>