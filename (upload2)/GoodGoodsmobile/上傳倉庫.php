  <?php


include 'connection.php';
session_start();
if(isset($_SESSION['luseraccount']))
{     
      $user = $_SESSION['luseraccount'];

};

//$imagetext = mysqli_real_escape_string($con, $_POST['image_text']);
$targetDir = "warehouseimage";
$randnum = rand(0,1000);
$idnum = rand(0,1000);
$originname = $_FILES['photo']['name'];
$extend = pathinfo($originname,PATHINFO_EXTENSION);
$rename = $_POST['warehousename'].$randnum;
$newname = $rename.'.'.$extend;
$tmpname = $_FILES['photo']['tmp_name'];
$id = $_SESSION['luseraccount'].'w'.$idnum;
//id ,acccount 尚未設定
if($stmt = $con-> prepare('INSERT into warehouse (useraccount,Warehousename, Warehousepic, Warehousediscription,warehouseid,place) VALUES(?,?,?,?,?,?)')){
		move_uploaded_file($tmpname, "../goodgoodsimg/".$newname );
	 	$stmt->bind_param('ssssss',$user,$_POST['warehousename'],$newname,$_POST['image_text'],$id,$_POST['place']);
	 	$stmt->execute();
	 	header("location:warehouse.php");
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

