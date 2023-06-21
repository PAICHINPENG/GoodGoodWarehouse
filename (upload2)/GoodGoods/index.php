<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>娛樂討論區</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="paint.css ">
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.author.value.length == 0)
          alert("作者欄位不可以空白哦！");
        else if (document.myForm.subject.value.length == 0)
          alert("主題欄位不可以空白哦！");
        else if (document.myForm.content.value.length == 0)
          alert("內容欄位不可以空白哦！");
        else
          myForm.submit();
      }
    </script>
  </head>
  <body>
  <div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;background-color:white;">
  <div class="headertext">
    <a href="歡迎來到GoodGoods.php">
    <img src="2選1圖片/logo1.png" style="width:20%; position:absolute;margin-top:5px;margin-left:5px;">
    </a>
  </div>
  <div id="mySidenav" class="sidenav">
     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <a href="new客服頁面.php">客服中心</a>
     <a href="index.php">常見Q&A</a>
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
</div>
    <div id="content" style="position:absolute; top:110px; bottom:60px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
      <p align="center"><img src="123.png"style="z-index:2;width:30%;"></p>
      <div class=happy style="z-index:1;">
    <?php
      require_once("dbtools.inc.php");

      //指定每頁顯示幾筆記錄
      $records_per_page = 5;

      //取得要顯示第幾頁的記錄
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;

      //建立資料連接
      $link = create_connection();

      //執行SQL查詢
      $sql = "SELECT id, author, subject, date FROM message ORDER BY date DESC";
      $result = execute_sql($link, "news", $sql);

      //取得記錄數
      $total_records = mysqli_num_rows($result);

      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);

      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);

      //將記錄指標移至本頁第一筆記錄的序號
      mysqli_data_seek($result, $started_record);

      echo "<table width='800' align='center' cellspacing='3' border='1'>";


      //使用 $bg 陣列來儲存表格背景色彩
      $bg[0] = "#EFFFD7";
      $bg[1] = "#F5FFE8";
      $bg[2] = "#EFFFD7";
      $bg[3] = "#F5FFE8";
      $bg[4] = "#EFFFD7";

      //顯示記錄
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr>";
        echo "<td width='120' align='center'><img src='" . mt_rand(0, 9) . ".gif'></td>";
        echo "<td bgcolor='" . $bg[$j - 1] . "'>作者：" . $row["author"] . "<br>";
        echo "主題：" . $row["subject"] . "<br>";
        echo "時間：" . $row["date"] . "<hr>";
        echo "<a href='show_news.php?id=";
        echo $row["id"] . "'>內容與討論</a></td></tr>";
        $j++;
      }
      echo "</table>" ;

      //產生導覽列
      echo "<p align='center' style='font color:black;'>";

      if ($page > 1)
        echo "<a href='index.php?page=". ($page - 1) . "'>上一頁</a> ";

      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='index.php?page=$i'>$i</a> ";
      }

      if ($page < $total_pages)
        echo "<a href='index.php?page=". ($page + 1) . "'>下一頁</a> ";

      echo "</p>";

      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
  </div>
    <hr>
    <!- 顯示輸入新留言表單 -->
    <form name="myForm" method="post" action="post.php">
      <table border="0" width="800" align="center" cellspacing="0">
        <tr bgcolor="	#642100" align="center">
          <td colspan="2"><font color="white">請在此輸入新的討論</font></td>
        </tr>
        <tr bgcolor="	#FFF4C1">
          <td width="15%">作者</td>
          <td width="85%"><input name="author" type="text" size="50"></td>
        </tr>
        <tr bgcolor="	#FFF4C1">
          <td width="15%">主題</td>
          <td width="85%"><input name="subject" type="text" size="50"></td>
        </tr>
        <tr bgcolor="	#FFF4C1">
          <td width="15%">內容</td>
          <td width="85%"><textarea name="content" cols="50" rows="5"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" height="40" align="center">
            <input type="button" value="提交" onClick="check_data()">　
            <input type="reset" value="重新輸入">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
  <div class="icon-bar">
    <a href="歡迎來到GoodGoods.php"><img src="導航欄圖片/goodgoods1.png" style="width:10%;height: 20%;"></a>
    <a href="#"><img src="導航欄圖片/goodgoods2.png" style="width:10%;height: 20%;"></a>
    <a href="朋友.php"><img src="導航欄圖片/goodgoods3.png" style="width:10%;height: 20%;"></a>
    <a href="個人資料.php"><img src="導航欄圖片/goodgoods4.png" style="width:10%;height: 20%;"></a>
  </div>
  </div>
  </body>
</html>
