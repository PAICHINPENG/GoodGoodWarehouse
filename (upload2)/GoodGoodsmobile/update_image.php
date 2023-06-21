<?php
include 'connection.php';
session_start();
if (isset($_POST['change'])) {
	$msg ='';
	$userid = $_SESSION['luseraccount'];
	$targetDir = "profilepic";
	$randnum = rand(0,1000);
	$originname = $_FILES['photo']['name'];
	$extend = pathinfo($originname,PATHINFO_EXTENSION);
	$rename = $userid.$randnum;
	$newname = $rename.'.'.$extend;
	$tmpname = $_FILES['photo']['tmp_name'];
	$test='testtest';
	if($stmt = $con-> prepare('UPDATE userinfo set Profilepic = ? Where Useraccount= "'.$_SESSION['luseraccount'].'"')){
		move_uploaded_file($tmpname, "../userphoto/".$newname );
	 	$stmt->bind_param('s',$newname);
	 	$stmt->execute();
	 	header("location:userinfo.php");
	
	}
	else{ echo 'failed';}
}	
?>