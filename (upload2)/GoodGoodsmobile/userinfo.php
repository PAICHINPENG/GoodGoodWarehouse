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
   <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:white;">
      <?php     
$sql=$con->query("SELECT * from userinfo where Useraccount = '".$_SESSION['luseraccount']."'");
if($sql->num_rows>= 0){
  while ($row = $sql->fetch_assoc()) {
  $name= $row['Username'];
  $email= $row['Email'];
  $bd= $row['Birthday'];
  $acc= $row['Useraccount'];
  $num= $row['Phonenumber'];
  $imageURL = '../userphoto/'.$row["Profilepic"];
  //$pic = $row['Profilepic'];
  $fcode = $row['friend_code'];
  ?>
        <img style="width:250px;height:250px;border-radius: 999em; display:block; margin:auto; position: relative;top: 20px;" src="<?= $imageURL;?>" alt="圓形圖">

  <?php }} ?>
    <button type="button" style="margin-left: 600px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 新增/修改大頭照
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="update_image.php" method="post" enctype="multipart/form-data">
          <input type="file" name="photo" accept="image/*" onchange="loadfile(event)"> <br><br>
          <img id="pre" width="150px" height="150px" style="border-radius:50%">
          <br> <br>
          <button class="btn btn-primary" type="submit" name="change">確認</button>
         </form>
      </div>

      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
      function loadfile(event){
        var out = document.getElementById('pre');
        out.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>
    <br>
    <br>
    <br>
    <button type="button" name="alt-pw" style="width: 150px; height: 50px; position: relative;left: 17%;" id="alt-pw" onclick= 'redirect();' >
      <p style="font-size: 25px;position: relative;top: 5px;">修改密碼</p>  
    </button>
    <br>
    <br>

      <div class="form" style="position: relative;top: 1%;">
        <form action="updatepro.php" method="post">
        <div class="infocss" style="position: relative;left: 20%;">
          <label style="font-size: 40px;">使用者帳號</label>
          <input disabled type="text" class="" style="width: 58%;height: 55px;position: relative;left: 4%; font-size: 30px;" value= " <?php echo $acc; ?>" >
        </div>
        <br>
        <br>
        <br>
        <div class="infocss" style="position: relative;left: 20%;">
          <label style="font-size: 40px;">使用者名稱</label>
          <input type="text" class="" style="width: 58%;height: 55px;position: relative;left: 4%; font-size: 30px;" value="<?php echo $name;?>" name="alt-name" >
        </div>
       

        <br>
        <br>
        <br>
        <div class="infocss" style="position: relative;left: 20%;">
          <label style="font-size: 40px;">生日</label>
          <input type="date" class="" style="width:50%;height: 50px;position:relative;left: 28%;font-size: 25px;" value="<?php echo $bd; ?>" name="alt-bd">
        </div>
        <br>
        <br>
        <br>
        <div class="infocss" style="position: relative;left: 20%;">
          <label style="font-size: 40px;">手機號碼</label>
          <input type="number" class="" style="width: 60%;height: 50px; font-size: 30px;position: relative;left: 11%;" value="<?php echo $num; ?>" name="alt-num">
        </div>
        <br>
        <br>
        <br>
        <div class="infocss" style="position: relative;left: 20%;">
         <label style="font-size: 40px;">E-mail</label>
          <input type="email" class="" style="width: 65%;height: 50px; font-size: 30px;position: relative;left: 23%;" value="<?php echo $email; ?>" name="alt-mail">
        </div>
        <br>
        <br>
        <br>
         <div class="infocss" style="position: relative;left: 20%;">
          <label style="font-size: 40px;">朋友碼</label>          
          <input type="number" class="" style="width: 60%;height: 50px; font-size: 30px;position: relative;left: 23%;" value="<?php echo $fcode; ?>" name="alt-f">
        </div>

        <br>
        <br>
        <br>
        <div class="infocss" style="position: relative;left: 75%;">
            <input type="submit" value="儲存" style="height: 50px;width: 100px;font-size: 25px;position: relative;">
        </div>
        </form>
      </div>
    </div>


     



 <script type="text/javascript">
  function redirect(){
    window.location.href = "修改密碼.php";
  }
  </script>

      </div>

    

  </div>
    <div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">
    <?php include 'bottomnav.php'?>
    </div>

</body>
</html>