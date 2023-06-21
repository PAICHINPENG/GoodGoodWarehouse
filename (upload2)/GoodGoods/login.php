<?phpinclude 'connection.php';
//登入
session_start();
if(!empty($_POST['Login-useraccount'])){
	$password = hash('sha256',$_POST['Login-password']);
	$sql = "SELECT * FROM userinfo WHERE Useraccount = $_POST['Login-useraccount'] AND Userpassword = $password ";
	$ro = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($ro);
	$login = mysqli_num_rows($ro);
	if($login == 1 ){
		echo "success";
		$_SESSION['luseraccount'] = $row['useraccount'];
		$_SESSION['birth'] = $row['Birthday'];
		header("location:usercenter.php");

	}
	

	/*
	isset($_POST['Login'])
	$log = "SELECT * FROM userinfo WHERE Useraccount = ? AND Userpassword = ?";
	$stmt = $con->prepare($log);	
	$stmt->bind_param('ss', $_POST['Login-useraccount'],$password);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$got = 
	//session_regenerate_id();
		$_SESSION['luseraccount'] = $row['Useraccount'];
		$_SESSION['userbirth'] = $row['Birthday'];
	//session_write_close();
	if ($result-> num_rows == 1){
		header("location:test.php");
	}
	*/
	
	else
		echo "wrong";
	
	
}

?>