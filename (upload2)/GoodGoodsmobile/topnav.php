
		 <div id="mySidenav" class="sidenav">   
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="" style="font-size: 40px;">歡迎
          <?= $_SESSION['luseraccount']?></font></a>    
        <hr class="style-one" />  
        <a href="測試的網頁headandfoot.php" style="font-size:40px;">客服中心</a>
        <hr class="style-one" />  
        <a href="logout.php" style="font-size:40px;">登出</a>
      </div>
      <div class=absolute>
        <span style="font-size:150px;cursor:pointer;" onclick="openNav()">&#9776;</span>
      </div>
      <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "270px";   /*右側導航欄*/
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
	</div>