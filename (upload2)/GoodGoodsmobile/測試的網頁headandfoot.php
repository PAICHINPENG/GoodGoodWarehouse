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

<style>

img{
  display: block;
  width: 100%;
  height: auto;
}
.card {
  width: 700px;
  height: 400px;
  margin: 0 auto;
}
/*客服欄位*/
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 20px;
  font-size: 25px;
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
</style>


<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="style.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>
	<div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
    <div class="headertext">Goodgoods好好藏</div>
<?php include 'topnav.php'?>

	 <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:white;">
	 	<!-- Button to Open the Modal -->
  <div class="card">
    <img src="qq.jpeg">
  </div>
<br>
<br>
<br>
<br>
<div>
  <table id="customers">
  <tr>
    <td>Q1:要如何新增倉庫，箱子和物品呢?</td>
  </tr>
  <tr>
    <td>A1:點選該頁面右下角的藍色新增按鈕</td>
  </tr>
  <tr>
    <td>Q2:要怎麼從進入倉庫空間看倉庫內有哪些箱子呢?</td>
  </tr>
  <tr>
    <td>A2:點選你想要進入的倉庫照片就可以囉</td>
  </tr>
  <tr>
    <td>Q3:要怎麼看這個倉庫或箱子的資訊呢?</td>
  </tr>
  <tr>
    <td>A3:點選那個箱子或倉庫的INFO按鈕，裡面存放該箱子或倉庫的詳細資訊喔</td>
  </tr>
  <tr>
    <td>Q4:如果我已經將該箱子內的物品都拿走了，我要怎麼刪除呢?</td>
  </tr>
  <tr>
    <td>A4:點選該箱子的刪除按鈕，該箱子就會連同裡面的物品消失囉</td>
  </tr>
  <tr>
    <td>Q5:我要怎麼快速的找到我的物品呢?</td>
  </tr>
  <tr>
    <td>A5:您可以直接在搜尋欄位打上該物品的關鍵字，或是拍下相似物品的照片，系統就會幫您找出來囉</td>
  <tr>
    <td>Q6:我要怎麼編輯我的個人資料呢?</td>
  </tr>
  <tr>
    <td>A6:點選下方欄位的最右邊ICON，裡面存放著您的個人資料可供您修改喔</td>
  </tr>
  <tr>
    <td>Q7:我要去哪邊看好友倉庫內有甚麼用不到的物品呢?</td>
  </tr>
  <tr>
    <td>A7:點選下方好友ICON，系統會將您的朋友顯示在裡面再點選他們的頭像就可以進入他們的倉庫囉</td>
  </tr>

  </table>
</div>
</div>

    <div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">
    <?php include 'bottomnav.php'?>
    </div>

</body>

</html>