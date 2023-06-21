<?php


include 'connection.php';
session_start();
if(isset($_SESSION['luseraccount']))
{     
      $user = $_SESSION['luseraccount'];
   
    	
};

//$imagetext = mysqli_real_escape_string($con, $_POST['image_text']);
$targetDir = "goodsimg";
$randnum = rand(0,1000);
$idnum = rand(0,1000);
$originname = $_FILES['photo']['name'];
$extend = pathinfo($originname,PATHINFO_EXTENSION);
$rename = $_POST['goodsname'].$randnum;
$newname = $rename.'.'.$extend;
$tmpname = $_FILES['photo']['tmp_name'];
$pr = rand(0,999);
$gid = $_SESSION['luseraccount'].'g'.$idnum;
$id = $_SESSION['luseraccount'].'pro'.$pr;
if($stmt = $con-> prepare('INSERT into goods (useraccount,goodsname,goodspic,goodsdiscription,warehouseid,boxid,goodsid,type,forsale,depotname,casename) VALUES(?,?,?,?,?,?,?,?,?,?,?)')){
		move_uploaded_file($tmpname, "../goodgoodsimg/".$newname );
	 	$stmt->bind_param('ssssssssiss',$user,$_POST['goodsname'],$newname,$_POST['image_text'], $_SESSION['w'] ,$_SESSION['b'] ,$gid,$_POST['t'],$_POST['che'],$_POST['wa'],$_POST['bo']);
	 	$stmt->execute();
	 	if ($_POST['che'] == 1) {
	 		
	 		$qq = $con->query("INSERT INTO product (productname,productid,useraccount,typename,productimage) VALUES ('".$_POST['goodsname']."','".$id."','".$_SESSION['luseraccount']."', '".$_POST['t']."','".$newname."')");
	 		
	 		// code...
	 	}
	 	 	header("location:goodsPC.php");
	
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

