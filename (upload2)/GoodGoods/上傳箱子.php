<?php
include 'connection.php';

session_start();
if(isset($_SESSION['luseraccount']))
{     
      $user = $_SESSION['luseraccount'];
      
     
    	
};

//$imagetext = mysqli_real_escape_string($con, $_POST['image_text']);
$targetDir = "boximage";
$randnum = rand(0,1000);
$idnum = rand(0,1000);
$originname = $_FILES['photo']['name'];
$extend = pathinfo($originname,PATHINFO_EXTENSION);
$rename = $_POST['boxname'].$randnum;
$newname = $rename.'.'.$extend;
$tmpname = $_FILES['photo']['tmp_name'];
$bid = $_SESSION['luseraccount']."b".$idnum;

if($stmt = $con-> prepare('INSERT into boxes (Useraccount,boxname,boxpic,boxdiscription,Warehouseid,boxid,type,wname) VALUES(?,?,?,?,?,?,?,?)')){
		move_uploaded_file($tmpname, "../goodgoodsimg/".$newname );
	 	$stmt->bind_param('ssssssss',$user,$_POST['boxname'],$newname,$_POST['image_text'], $_SESSION['w'],$bid,$_POST['t'],$_POST['wn']);	 	
	 	$stmt->execute();
	 	header("location:boxesPC.php");
}
else{
echo'fail';
}		
$stmt->close();
$con->close();
/*include 'connection.php';
if(isset($_POST['upload']))
{	
	$warename = mysqli_real_escape_string($con, $_POST['warehouse-name']);;
	$imagetext = mysqli_real_escape_string($con, $_POST['image_text']);
	$targetDir = "image";
	$randnum = rand(0,1000);
	$originname = $_FILES['photo']['name'];
	$extend = pathinfo($originname,PATHINFO_EXTENSION);
	$rename = $_POST['warehouse-name'].$randnum;
	$newname = $rename.'.'.$extend;
	$tmpname = $_FILES['photo']['tmp_name'];


	if(move_uploaded_file($tmpname, "image/".$newname)){
		$insert = $con->query("INSERT into warehouse(Warehousename,Warehousepic,Warehousediscription) VALUES ('$warename','".$newname."','$imagetext')");
	}



}
*/
?>

