<?php 

include 'connection.php';
//註冊
if ($stmt = $con->prepare('SELECT Useraccount FROM userinfo WHERE Useraccount = ? or Userpassword = ? or friend_code = ?')) {
	$stmt->bind_param('sss', $_POST['signup-useraccount'], $_POST['signup-password'] ,$_POST['f_code']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		// Username already exists
			echo "<script language='javascript'>
		alert('帳號or密碼or朋友碼已存在');
		location='LoginGoodGoodsPC.php';
		 </script>";
		}
	else {
		if ($stmt = $con->prepare('INSERT INTO userinfo (Useraccount, Userpassword, Username, Email, Birthday,friend_code) VALUES (?, ?, ?, ?, ?, ?)')) {
				$passwordhash = hash('sha256', $_POST['signup-password']);
				$stmt->bind_param('ssssss', $_POST['signup-useraccount'], $passwordhash, $_POST['signup-username'], $_POST['signup-email'], $_POST['bday'],$_POST['f_code']);
				$stmt->execute();
				echo "<script language='javascript'>
		alert('註冊成功');
		location='LoginGoodGoodsPC.php';
		 </script>";
		/*		

		echo "<script language='javascript'>
		alert('註冊成功');
		location='登入GoodGoods.php';
		 </script>";*/

			} else{
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Could not prepare statement!!';
		}
	}
	$stmt->close();
}else{
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}

$con->close();
?>