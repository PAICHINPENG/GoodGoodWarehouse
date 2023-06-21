<?php
include "connection.php";

if(isset($_POST['w'])){
$wdel = $_POST['w'];
$p= $_POST['wpic'];
$q = $con->query("SELECT *  from goods where warehouseid = '$wdel'");
$qq = $con->query("SELECT *  from boxes where warehouseid = '$wdel' ");

	if (($q->num_rows>=1)&&($qq->num_rows>=1)) {

			$query = $con->query("DELETE warehouse,boxes,goods from warehouse
			inner join boxes on boxes.Warehouseid = warehouse.warehouseid
			inner join goods on goods.warehouseid = warehouse.warehouseid
			where warehouse.warehouseid = '$wdel'");
			unlink("warehouseimage".$p);
			header("location:warehousePC.php");
			
		
		}
	elseif (($q->num_rows<=0)&&($qq->num_rows>=1)) {
			$query = $con->query("DELETE warehouse,boxes from warehouse 
			inner join boxes on boxes.Warehouseid = warehouse.warehouseid
			where warehouse.warehouseid = '$wdel'");
			unlink("warehouseimage".$p);
			header("location:warehousePC.php");
			
	
			
	}
	elseif (($q->num_rows<=0)&&($qq->num_rows<=0)) {
			$query = $con->query("DELETE  from warehouse where warehouseid = '$wdel' ");
			unlink("warehouseimage".$p);
			header("location:warehousePC.php");
			
	}	
}
if (isset($_POST['b'])) {
	$bdel = $_POST['b'];
	$p = $_POST['bpic'];
	$q = $con->query("SELECT * from boxes where boxid = '$bdel'");
	$qq = $con->query("SELECT * from goods where boxid = '$bdel'");
	if(($q->num_rows>=1)&&($qq->num_rows>=1)){
		$query = $con->query("DELETE boxes,goods from boxes
		inner join goods on goods.boxid = boxes.boxid 
		where boxes.boxid = '$bdel'");
		unlink("boximg".$p);
		header("location:boxesPC.php");
	}
	elseif (($q->num_rows>=1)&&($qq->num_rows<=0)) {
		$query = $con->query("DELETE from boxes where boxid = '$bdel'");
		unlink("boximg".$p);
		header("location:boxesPC.php");
	}
			
}
if(isset($_POST['g'])){
	$gdel = $_POST['g'];
	$query = $con->query("DELETE from goods where goodsid = '$gdel'");
	unlink("goodsimg".$gp);
	header("location:goodsPC.php");
}

	

?>
/*$query= $con->query("SELECT Useraccount from userinfo 
          inner join friend on userinfo.Useraccount = friend.Useraccount 
          inner join friend on userinfo.friend_code = friend.added_friend_code");*/