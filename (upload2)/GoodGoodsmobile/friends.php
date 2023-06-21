
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
	<link rel="stylesheet"  href="paint.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet"  href="style.css">
  <!-- Script -->
 
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
  <div id="header" style="position:absolute; top:0px; left:0px; height:300px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
    <div class="headertext">Goodgoods好好藏</div>
<div id="mySidenav" class="sidenav" onclick="co(e)">   
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         
         <hr class="style-one" />  
        <a href="測試的網頁headandfoot.php" style="font-size:40px">客服中心</a>
         <hr class="style-one" />  
        <a href="logout.php" style="font-size: 40px;">登出</a>
      </div>
      <div class=absolute>
        <span style="font-size:150px;cursor:pointer;" onclick="openNav()">&#9776;</span>
      </div>
      <script>
        window.addEventListener('click',co);
        var side = document.querySelector('#mySidenav');
        function openNav() {
  document.getElementById("mySidenav").style.width = "270px";   /*右側導航欄*/
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function co(e){
  if (e.target == side) {
    document.getElementById("mySidenav").style.width = "0";
  }
}
</script>
 </div>
<div id="content" style="position:absolute; top:180px; bottom:60px; left:0px; right:0px; overflow:auto; background-image: url('../123.jpeg');">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="font-size: 30px;">加入好友</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="font-size: 30px;">好友列表</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" style="font-size:30px">好友物品</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
<!--加入好友-->
  <div class="tab-pane fade show active " id="pills-home" role="tabpanel"  aria-labelledby="pills-home-tab" style="background-color:transparent;">
  	<div class="for"  style=" width: 200px; margin-top:10%; margin-left: 5%;font-size: 30px;">
		  <div class="alert" style="width: 200px"></div>
  		  <form action="" id="formm" style="position: relative;top: 270px;left: 230px;">
  				<label for="f_code">輸入朋友碼</label><br><br>
  				<input type="text" class="code" id="f_code">
  				<br><br>
  				<button class="btn btn-primary" id="f_submit" style="height:50px;width: 100px;font-size: 25px;">加入</button>  	
  		  </form>
	 </div>
  </div>
<!--顯示好友-->

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="background-color:transparent;">
    <?php
  
        include 'connection.php';
        
       $query = $con->query("SELECT friend_code from friend where Useraccount = '".$_SESSION['luseraccount']."' ");
       
        if($query->num_rows>0){
          while ($row = $query->fetch_assoc()) {
            echo  "<div>".$row['friend_code']."</div>";
          }
        }


    ?>


  </div>


  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" style="background-color:transparent;">

  </div>
</div>




</div>
<div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">
    <div class="icon-bar">
      <a href="welcomeGoodGoods.php"><img src="navpic/icon4.png" style="width:70%;height: 90%;"></a> 
      <a href="#"><img src="navpic/icon2.png" style="width:50%;height: 90%;"></a> 
      <a href="friends.php"><img src="navpic/icon3.png" style="width:70%;height: 90%;"></a> 
      <a href="userinfo.php"><img src="navpic/icon1.png" style="width:70%;height: 90%;"></a>
    </div>
    </div>

</body>
</html>
<style type="text/css"></style>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click","#f_submit",function(e){
            e.preventDefault();
            
            var form  =$(this).closest("#formm");
            var code = form.find(".code").val();
            $.ajax({
                url:"add.php",
                method:"post",
                data:{acode:code},
                success:function(response){
                    $(".alert").html(response);

                }
            });
        });
    });
</script>
