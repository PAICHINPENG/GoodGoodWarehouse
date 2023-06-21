<?php
include 'connection.php';
session_start();
if (isset($_POST['acode'])) {

  $query = $con->query("SELECT * from friend where Useraccount = '".$_SESSION['luseraccount']."' and friend_code = '".$_POST['acode']."' ");
  $q = $con->query("SELECT friend_code from userinfo where Useraccount = '".$_SESSION['luseraccount']."' AND friend_code = '".$_POST['acode']."' ");
  $f = $con->query("SELECT friend_code from userinfo where friend_code = '".$_POST['acode']."'");

  if($q->num_rows>0){
     echo "<div class = 'alert alert-danger  mt-2'>
    
        <strong>不能加自己為好友</strong>
          </div>";
  }
  else
    if($query->num_rows<=0 && $f->num_rows>0){
      $insert = $con->query("INSERT INTO friend(Useraccount,friend_code) values ('".$_SESSION['luseraccount']."','".$_POST['acode']."') ");
           echo"<div class = 'alert alert-success  mt-2'>
                <strong>成功加入".$_POST['acode']."為好友</strong>
                </div>";
    }
    elseif ( ($query->num_rows <=0) && ($f->num_rows<= 0) ) {
          echo"<div class = 'alert alert-danger  mt-2'>
                <strong>查無此人</strong>
                </div>";
    }
    else{
         echo "<div class = 'alert alert-danger  mt-2'>
    
        <strong>已經是朋友了</strong>
          </div>";
        };


}
?>