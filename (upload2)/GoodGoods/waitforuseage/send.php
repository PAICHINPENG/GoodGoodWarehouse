<?php
  //取得表格資料
  $from_name="=?utf8?B?" .base64_encode($_POST["from_name"]) ."?=";
  $from_email=$_POST["from_email"];
  $from_name="=?utf8?B?" .base64_encode($_POST["to_name"]) ."?=";
  $from_email=$_POST["to_email"];
  $from_email=$_POST["format"];
  $from_name="=?utf8?B?" .base64_encode($_POST["subject"]) ."?=";
  $from_email=$_POST["message"];
  //設定MIME邊界字串
  $mime_boundary=md5(uniqid(mt_rand(),TRUE));
  //設定郵件標頭資訊
  $header="From:$from_name<$from_email>\r\n";
  
