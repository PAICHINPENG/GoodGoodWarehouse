<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>娛樂討論區</title>
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
  <body style="background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
    <center><img src="fig1.jpg"></center>
    <?php
      require_once("dbtools.inc.php");

      //取得要顯示之記錄
      $id = $_GET["id"];

      //建立資料連接
      $link = create_connection();

      //執行SQL查詢
      $sql = "SELECT * FROM message WHERE id = $id";
      $result = execute_sql($link, "news", $sql);

      echo "<table width='800' align='center' cellpadding='3'>";
      echo "<tr height='40'><td colspan='2' align='center'
            bgcolor='#663333'><font color='white'>
            <b>Q&A</b></font></td></tr>";

      //顯示原討論主題的內容
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td bgcolor='#FFF4C1'>主題：" . $row["subject"] . "　";
        echo "作者：" . $row["author"] . "　";
        echo "時間：" . $row["date"] . "</td></tr>";
        echo "<tr height='40'><td bgcolor='#FFFFAA	'>";
        echo $row["content"] . "</td></tr>";
      }

      echo "</table>";

      //釋放 $result 佔用的記憶體空間
      mysqli_free_result($result);

      //執行 SQL 命令
      $sql = "SELECT * FROM reply_message WHERE reply_id = $id";
      $result = execute_sql($link, "news", $sql);

      if (mysqli_num_rows($result) <> 0)
      {
        echo "<hr>";
        echo "<table width='800' align='center' cellpadding='3'>";
        echo "<tr height='40'><td colspan='2' align='center'
              bgcolor='#ADADAD	'><font color='white'>
              <b>你的回答</b></font></td></tr>";

        //顯示回覆主題的內容
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          echo "<td bgcolor='#FFF4C1'>主題：" . $row["subject"] . "　";
          echo "作者：" . $row["author"] . "　";
          echo "時間：" . $row["date"] . "</td></tr>";
          echo "<tr><td bgcolor='#FFF4C1'>";
          echo $row["content"] . "</td></tr>";
        }

        echo "</table>";
      }

      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
    <hr>
    <form name="myForm" method="post" action="post_reply.php">
      <input type="hidden" name="reply_id" value="<?php echo $id ?>">
      <table border="0" width="800" align="center" cellspacing="0">
        <tr bgcolor="#663333" align="center">
          <td colspan="2"><font color="white">請在此輸入您的回覆</font></td>
        </tr>
        <tr bgcolor="#FFF4C1">
          <td width="15%">作者</td>
          <td width="85%"><input name="author" type="text" size="50"></td>
        </tr>
        <tr bgcolor="#FFF4C1">
          <td width="15%">主題</td>
          <td width="85%"><input name="subject" type="text" size="50"></td>
        </tr>
        <tr bgcolor="#FFF4C1">
          <td width="15%">內容</td>
          <td width="85%"><textarea name="content" cols="50" rows="5"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" height="40" align="center">
            <input type="button" value="提交回覆" onClick="check_data()">
            <input type="reset" value="重新輸入">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
