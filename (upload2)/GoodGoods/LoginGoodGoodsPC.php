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
    header("location:WelcomeGoodGoodsPC.php");
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
      <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
          <form action="LoginGoodGoodsPC.php" class="sign-in-form" method="post"  enctype="multipart/form-data">
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
     
           <!-- <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>-->
          </form>
          <!--註冊-->
          <form action="登入註冊.php" method="post" class="sign-up-form" enctype="multipart/form-data">

            <h2 class="title">註冊</h2>
            <!-- 使用者帳號-->
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input type="text" placeholder="Useraccount" name="signup-useraccount" required />
            </div>
            <!-- 使用者名稱-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="signup-username" required />
            </div>           
            <!-- 密碼-->
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="signup-password" required />
            </div>
             <!-- 電子郵件-->
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="signup-email" required />
            </div>
            <!-- 生日-->
            <div class="input-field">
              <i class="fas fa-calendar-day"></i>
              <input type="date" placeholder="date" name="bday" required />
            </div>

           
            <div class="input-field">
              <i class="fas fa-code"></i>
              <input type="text" placeholder="用來讓別人加好友" name="f_code" maxlength="6" minlength="3" required />
            </div>


            <input type="submit" class="btn" value="SignUp">

           <!-- <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>-->
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
          <img src="2選1圖片/logo1.png" class="image" alt="" />
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
          
        </div>
      </div>
    </div>

    <script src="登入註冊.js"></script>
  </body>
</html>
