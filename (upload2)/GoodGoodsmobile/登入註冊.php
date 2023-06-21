<?php 

include 'connection.php';
//註冊
if ($stmt = $con->prepare('SELECT Useraccount FROM userinfo WHERE Useraccount = ? or Userpassword = ?')) {
	$stmt->bind_param('ss', $_POST['signup-useraccount'], $_POST['signup-password'] );
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo "Account or Password is exist";
		}
	else {
		if ($stmt = $con->prepare('INSERT INTO userinfo (Useraccount, Userpassword, Username, Email, Birthday) VALUES (?, ?, ?, ?, ?)')) {
				$passwordhash = hash('sha256', $_POST['signup-password']);
				$stmt->bind_param('sssss', $_POST['signup-useraccount'], $passwordhash, $_POST['signup-username'], $_POST['signup-email'], $_POST['bday']);
				$stmt->execute();
				header("location:LoginGoodGoods.php");
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