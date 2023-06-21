<?php
include 'connection.php';
//登入
session_start();


if(isset($_POST['Login'])){
  $password = hash('sha256',$_POST['Login-password']);
  $log = "SELECT * FROM userinfo WHERE Useraccount = ? AND Userpassword = ?";
  $stmt = $con->prepare($log);  
  $stmt->bind_param('ss', $_POST['Login-useraccount'],$password);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  
 
  

 

  if ($result-> num_rows == 1){
    $_SESSION['luseraccount'] = $row['Useraccount'];
    header("location:welcomeGoodGoods.php");
  }
  else
   echo "<script>alert('帳號密碼輸入錯誤')</script>";  
}
; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <div class="container"> 
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="new登入註冊.css" />
    <title>Sign in & Sign up Form</title>

      <div class="forms-container">
        <div class="signin-signup">
          <form action="LoginGoodGoods.php" class="sign-in-form" method="post"  enctype="multipart/form-data">
            <h1 class="logo">GoodGoods好好藏</h1>
            <h2 class="title">登入</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Useraccount" name="Login-useraccount" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="Login-password" />
            </div>
            <button type="submit"  class="btn solid" name="Login" >Login</button>
            <!--<input type="submit" value="Login" class="btn solid" name="Login">-->
           
          </form>
          <!--註冊-->
          <form action="登入註冊.php" method="post" class="sign-up-form" enctype="multipart/form-data">
            <h2 class="title">註冊</h2>
            <!-- 使用者帳號-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Useraccount" name="signup-useraccount" />
            </div>
            <!-- 使用者名稱-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="signup-username" />
            </div>           
            <!-- 密碼-->
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="signup-password" />
            </div>
             <!-- 電子郵件-->
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="signup-email" />
            </div>
            <!-- 生日-->
            <div class="input-field">
              <i class="fas fa-calendar-day"></i>
              <input type="date" placeholder="date" name="bday" />
            </div>
             <div class="input-field">
              <i class="fas fa-code"></i>
              <input type="text" placeholder="用來讓別人加好友" name="f_code" maxlength="6" minlength="3" required />
            </div>

            <input type="submit" class="btn" value="SignUp">

       
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>新成員嗎?</h3>

           <p>
              免費註冊GoodGoods
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
             <h3>已經有帳號了嗎?</h3>
            <p>
                快去登入GoodGoods規劃你的倉儲空間吧
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="登入註冊.js"></script>
  </body>
</html>