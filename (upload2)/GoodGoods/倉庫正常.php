
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
<link rel="stylesheet"  href="newhome.css ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
html,body{
    height: 100%;
  /* background-color: azure; */
    font-family: "Lato", sans-serif;
  }
  .header{
    height: 130px;
    position: relative;
    top:0;
    z-index: 900;
    background-color:#5995fd;
    color:  #FFFFFF;
  }
 .main-content{
    min-height: 100%;
    padding-top: 10px;
    padding-bottom:50px;  /*same height as footer-height*/
  }
  .footer{
     position: fixed;
     bottom:0px;

     margin-top: -50px; /* negative value of footer height */
     height: 150px;  
     clear:both
   }

/*header text*/
.headertext{
  color: white;
  width: 100%;
  font-size: 55px; /*字體大小*/
  line-height:130PX; /*字置中*/
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
  font-size: 35px;  /*字體大小*/
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
 line-height:100PX;  /*右側導航欄按鈕位置*/
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


/*下方按鈕 icon bar*/
.icon-bar {
  width: 100%;
  background-color: #ffaaa7;  /*下方導航欄顏色*/
  overflow: auto;
  height: 150px;
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



/*排版*/
* {
  box-sizing: border-box;
}
.row {
  display: flex;
  justify-content: center;
  align-items: center;
  float: left;
  width: 33%;
  padding: 5px;
  line-height: 100px;/*每列的高度*/
  margin-right: 3px

}

/* Create three equal columns that sits next to each other */
.column {
  flex: 33%;
  padding: 5px;

}
.textt{
  margin-top: -70px;
  margin-left:90px;

}
.texttt{
 margin-top: -60px;
  margin-left:90px;
}

 


</style>
</head>
<html>
  <body>
    <header class='header'>
      <div class="headertext">Goodgoods好好藏</div>

      <div id="mySidenav" class="sidenav">   
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>   
        <a href="new客服頁面.html">客服中心</a>
        <a href="logout.php">登出</a>
      </div>
      <div class=absolute>
        <span style="font-size:110px;cursor:pointer;" onclick="openNav()">&#9776;</span>
      </div>
    </header>

       <h1 style="font-size: 40px;text-align:center;"><?php  echo  $_SESSION['luseraccount'] ; ?></h1>
      

    <div id="content" style="position:absolute; top:260px; bottom:150px; left:0px; right:0px; overflow:auto;background-color:white;">
       <button class="modal-btn"><img style="border-radius: 50%;" height="50px" width="50px" src="add.png"></button>
      



    <?php
  // Include the database configuration file
  include 'connection.php';
  
  // Get images from the database
  $query = $con->query("SELECT Warehousepic, warehousediscription,warehousename,warehouseid FROM Warehouse where useraccount = '".$_SESSION['luseraccount']."' ");
  if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
        $imageURL = 'warehouseimage/'.$row["Warehousepic"];
        $texturl = $row["warehousediscription"];
        $title = $row['warehousename'];
        $wid = $row['warehouseid'];
        $wname = $row['warehousename'];
        $file = $row["Warehousepic"];
        
       ?>

<div class="row">
  <div class="column">
         <form action="箱子.php" method="post">
              <input type="hidden" name="n" value= "<?= $wname?>">
              <button type="submit" style="background-color: transparent; outline-color: yellow; border-radius: 50%;"  name="img" value="<?= $wid?>"><img style="border-radius: 50%;" height="200px" width="200px" src="<?= $imageURL;?>"></button>
          </form>
          <div>
            
          </div>

          
          <div class="texttt">
        <form action="delete.php" method="post">
          <input type="hidden" name="wpic" value="<?= $file?>">
          <button type="submit" onclick="window.confirm('刪除倉庫將會移除所以內容物!')" name="w" value="<?= $wid?> ">刪除</button>   
        </form>
        </div>
  </div>
</div>    

     
       <!--  $imageURL = '/upload2/image/'.$row["Warehousepic"];
       $texturl = $row["warehousediscription"];
          echo "<p>".$row['warehousediscription']."</p>";-->
       
      <?php }} ?>


<div class="modal-bg">
  <div class="modaly">
    <form action="上傳倉庫.php" method="post" enctype="multipart/form-data">
     <p align="center" style="top: 30px;"><font size="6" >上傳一張照片</font></p>
      <input type="file" name="photo" accept="image/*"> <br><br>
      
      <input type="text"  name="warehousename" placeholder="倉庫的名稱"><font size="6"></font>
      <div>
        <textarea id="text1" name="image_text"placeholder="對倉庫的描述"></textarea>        
      </div>
      <p style="text-align:center;"><input type="submit" name="upload" value="上傳" style="height: 120px ;width: 160px; font-size: 50px"></p>
    </form>   
    <span class="modal-close">X</span>
  </div>  
</div>   
 <footer class="footer">
    <div class="icon-bar">
      <a href="歡迎來到GoodGoods.php"><img src="導航欄圖片/goodgoods1.png" style="width:60%"></a> 
      <a href="#"><img src="導航欄圖片/goodgoods2.png" style="width:45%"></a> 
      <a href="#"><img src="導航欄圖片/goodgoods3.png" style="width:60%"></a> 
      <a href="#"><img src="導航欄圖片/goodgoods4.png" style="width:60%"></a>
    </div>
  </footer>

 
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";   /*右側導航欄*/
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
    
    <script src="newhome.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="Jquery.js"></script>
  </body>
</html> 