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

<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "goodgoods好好藏-1";

$con = mysqli_connect($host,$user,$password);
if (empty($con)) {
  print mysqli_error($con);
    die("Connection failed: " );
    exit;
}
if(!mysqli_select_db($con,$db)){
  die("無法選擇資料庫");
}
mysqli_query($con, "SET NAMES 'utf8'");

$sql="select * from userinfo where Useraccount = '".$_SESSION['luseraccount']."'";
$result = mysqli_query($con, $sql);

if(!$result){
  echo ("錯誤". mysqli_error($con));
  exit();
}


if(!empty($result)){
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

  $acc= $row['Useraccount'];

  }
}
else{echo "wrong";}
?>

<?php
//更改密碼
$msg = "";

if(isset($_POST['ChangePw'])){
  $OldPw = hash('sha256',$_POST['old-pw']);
  $NewPw= hash('sha256',$_POST['new-pw']);
    $CheckPw= hash('sha256',$_POST['confirm-pw']);
  $sql= "SELECT * FROM userinfo WHERE Userpassword= ? AND Useraccount='".$_SESSION['luseraccount']."' ";
  $stmt = $con->prepare($sql);  
    $stmt->bind_param('s', $OldPw);
    $stmt->execute();
    $result = $stmt->get_result();

    if (($result-> num_rows == 1) && (strcmp($NewPw, $CheckPw)==0)){
      $sql= 'UPDATE userinfo SET Userpassword=? WHERE Useraccount = "'.$_SESSION['luseraccount'].'"';
      $stmt = $con->prepare($sql); 
      $stmt->bind_param('s', $NewPw);
      $stmt->execute();

      $msg="修改成功！";

    }
    else { $msg = "密碼輸入錯誤！" ;}

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
 <link rel="stylesheet"  href="設計.css ">
 <style type="text/css">
   
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat',sans-serif;
}
.wrapper{
  max-width: 80%;
  width: 100%;
  height: 80%;
  background:  #fff;
  margin: 20px auto;
  padding:30px;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125)
}
.wrapper .form{
  width: 100%;
}
.wrapper .form .input_field{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}
.wrapper .form .input_field label{
  width: 200px;
  color: #2f3640;
  margin-right: 10px;
  font-size: 20px;
}
.wrapper .form .input_field .input{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 20px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}
.wrapper .form .input_field .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}
.wrapper .form .input_field .custom_select select{
  -webkit-appearance: none;
  appearance:none;
  border: 1px solid #d5dbd9;
  width:100%;
  height: 100%;
  padding: 8px 10px;
  border-radius: 3px;
  outline: none;
  font-size: 15px;
}
.wrapper .form .input_field .custom_select:before{
  content: "";
  position: absolute;
  top:12px;
  right: 10px;
  border:8px solid;
  border-color:#d5dbd9 transparent transparent;
}
.wrapper .form .input_field .input:focus,
.wrapper .form .input_field select:focus{
  border:1px solid #273c75;
}
.wrapper .form .input_field .btn{
  width: 40%;
  padding: 8px 10px;
  font-size: 20px;
  border:0;
  background: #0097e6;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;

}
.wrapper .form .input_field:last-child{
  margin-bottom: 0;
}
.wrapper .form .input_field .btn:hover{
  background: #40739e;
}
@media(max-width: 420px){
  .wrapper .form .input_field{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .input_field label{
    margin-bottom: 5px;
  }
}

 </style>
</head>
<body>
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
   <div class="wrapper">

      <div class="form" >
        <form action="修改密碼.php" method="post" >
          <a href = "個人資料.php">返回個人資料</a>
          <br>
          <br>
          <br>
        <div class="input_field">
          <label>使用者帳號</label>
          <input disabled type="text" class="input" value= "<?php echo $acc; ?>" >
        </div>
        <br>
        <br>
        <div class="input_field">
          <label>輸入舊密碼</label>
          <input type="password" class="input" name="old-pw" >
        </div>
        <br>
        <br>
        
        <div class="input_field">
          <label>新密碼</label>
          <input type="password" class="input" name="new-pw">
        </div>
        <br>
        <br>
        
        <div class="input_field">
          <label>再次輸入密碼</label>
          <input type="password" class="input"  name="confirm-pw">
        </div>
        <br>
        <br>
      
        <div class="input_field">
          <input type="submit" value="更改密碼" class="btn" name="ChangePw">
        </div>
        <br>
        <?php if ($msg!= "") echo $msg . "<br>" ?>
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
    <div class="icon-bar">
      <a href="歡迎來到GoodGoods.php"><img src="導航欄圖片/goodgoods1.png" style="width:50%;height: 100%;"></a> 
      <a href="#"><img src="導航欄圖片/goodgoods2.png" style="width:50%;height: 100%;"></a> 
      <a href="朋友.php"><img src="導航欄圖片/goodgoods3.png" style="width:50%;height: 100%;"></a> 
      <a href="個人資料.php"><img src="導航欄圖片/goodgoods4.png" style="width:50%;height: 100%;"></a>
    </div>
    </div>

</body>
</html>