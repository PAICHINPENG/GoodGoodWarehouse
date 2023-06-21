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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet"  href="paint.css ">
  <style type="text/css">



 </style>
</head>
<body>
  <div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;overflow:hidden;background-color:white;">
    <?php include 'topnavbar.php'?>
  </div>
   <div id="content" style="position:absolute; top:110px; bottom:60px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
    <p>歡迎來到個人資料頁! 您可以在此頁輕鬆修改個人資料及變更密碼</p>
    <li>您可以點擊按鈕<button type="button" style="border:2px #9999FF dashed;">修改密碼</button>變更密碼。</li>
    <li>修改完個人資料後記得點擊最下方按鈕<button type="button" style="border:2px #9999FF dashed;">儲存</button>儲存資料完成更新喔!</li>  
 <?php     
$sql=$con->query("SELECT * from userinfo where Useraccount = '".$_SESSION['luseraccount']."'");
if($sql->num_rows>= 0){
  while ($row = $sql->fetch_assoc()) {
  $name= $row['Username'];
  $email= $row['Email'];
  $bd= $row['Birthday'];
  $acc= $row['Useraccount'];
  $num= $row['Phonenumber'];
  $fcode = $row['friend_code'];
  $imageURL = '../userphoto/'.$row["Profilepic"];

  ?>
    <div class="personal" style=" text-align:center">

      <br>
<img style="border-radius: 50%;" alt="請新增頭貼" height="200px" width="200px" src="<?= $imageURL;?>">

  <?php }} ?>
<br>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
    <button type="button" name="alt-pw" style="width: 80px; height: 30px;color: black;border:2px #9999FF dashed;" id="alt-pw" onclick= 'redirect();' >
      <p style="font-size: 15px">修改密碼</p>
    </button>
    <br>
    <br>
      <div class="form" >
        <form action="修改資料.php" method="post" >
        <!--<div class="input_field">
          <div class="input_field" style=" text-align:center">
            <label>性別</label>
              <select name="alt-gender" >
                <option value="male" >請選擇性別</option>
                <option value="male" >男</option>
                  <option value="female">女</option>
                  <option value="其他">其他</option>
                </select>
              </div>
          </div>-->
          <br>
          <br>
          <label>使用者帳號</label>
          <input disabled type="text" class="input" value= "<?php echo $acc; ?>" >

        </div>
        <br>
        <br>

        <div class="input_field">
          <label>使用者名稱</label>
          <input type="text" class="input" value= "<?php echo $name; ?>" name="alt-name" >

        </div>
        <br>
        <br>


        <div class="input_field">
          <label>生日</label>
          <input type="date" class="input"  value="<?php echo $bd; ?>" name="alt-bd">
        </div>
        <br>
        <br>

        <div class="input_field">
          <label>手機號碼</label>
          <input type="text" class="input" value="<?php echo $num; ?>" name="alt-num" maxlength="10" minlength="10">
        </div>
        <br>
        <br>

        <div class="input_field">
          <label>Email</label>
          <input type="email" class="input" value="<?php echo $email; ?>" name="alt-mail">
        </div>
        <br>
        <br>

          <div class="input_field">
          <label>朋友碼</label>
          <input type="f_code" class="input"  value="<?php echo $fcode; ?>" name="alt-f" >
        </div>
        <br>
        <br>


        <div class="input_field">
          <input type="submit"  style="border:2px #9999FF dashed;" value="儲存" class="btn" name="alt-profile">
        </div>
        </form>
        <br>
      </div>
    </div>
    </div>



 <script type="text/javascript">
  function redirect(){
    window.location.href = "修改密碼.php";
  }
  </script>

      </div>



  </div>
    <div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
    <?php include 'navbar.php'?>

</body>
</html>
