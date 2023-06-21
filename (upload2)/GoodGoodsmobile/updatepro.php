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


<?php
if ($stmt = $con->prepare('UPDATE userinfo set Username= ? , Email= ?, Birthday= ?,  Phonenumber=?,friend_code=? where Useraccount = "'.$_SESSION['luseraccount'].'"') ) {
				
				$stmt->bind_param('ssssi', $_POST['alt-name'], $_POST['alt-mail'], $_POST['alt-bd'], $_POST['alt-num'], $_POST['alt-f']);
				$stmt->execute();
				
					echo "<script language='javascript'>
		alert('修改成功');
		location='userinfo.php';
		 </script>";
			} else{
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Could not prepare statement!!';
		}
	
?>