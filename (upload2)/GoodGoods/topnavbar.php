
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<div class="headertext">
  <a href="WelcomeGoodGoodsPC.php">
  <img src="2選1圖片/logo1.png" style="width:20%; position:absolute; align:center;top:0px;">
  </a>
  <!--
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" style="width: 50%; margin-left: 50%; margin-top: 3%" />
    
  </div>-->
</div>

     <div id="mySidenav" class="sidenav">
        <p></p>
        <p style="text-align: center;">歡迎<?= $_SESSION['luseraccount']?>回來</p>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="services.php">客服中心</a>
        

        <a href="logout.php">登出</a>
      </div>
      <div class=absolute>
        <span style="font-size:30px;cursor:pointer;line-height:60PX;position: absolute;right: 10px;" onclick="openNav()">&#9776;</span>
      </div>
      <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";   /*右側導航欄*/
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>