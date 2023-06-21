   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
include "connection.php";
session_start();
$acc = $_SESSION['luseraccount'];

if (isset($_POST['pid'])&&($_POST['pstock'])) 
{
	$seller  =$_POST['pseller'];
	$image= $_POST['pimage'];
	$id = $_POST['pid'];
	$stock = $_POST['pstock'];
	$price = $_POST['pprice'];
	$p = $_POST['pname'];
	$total = $stock * $price;
	$check =$con->query("SELECT productid from cart where productid = '".$id."'");
	if ($check->num_rows <=0) {
		$query = $con->query("INSERT INTO cart(Cartid,productid,quantity,totalprice,productname,productimage,price,seller) values('".$acc."','".$id."','".$stock."','".$total."','".$p."','".$image."','".$price."','".$seller."') ");

		echo "<div class = 'alert alert-success alert-dismissible mt-2'>
		<button type='button' class='close' data-dismiss = 'alert'>X</button>
		<strong>成功加入購物車</strong>
		</div>";
	}
	else 
		echo "<div class = 'alert alert-danger alert-dismissible mt-2'>
		<button type='button' class='close' data-dismiss = 'alert'>X</button>
		<strong>購物車已經有了</strong>
		</div>";
		// code...
	
	
}

if (isset($_POST['aid'])) {
	$did = $_POST['aid'];

	$q = $con->query("DELETE  from cart where Cartid = '".$_SESSION['luseraccount']."' AND productid = '".$did."' ");
		
}

if (isset($_POST['pqty'])) {
	$qty  =$_POST['pqty'];
	$id = $_POST['pid'];
	$price = $_POST['pprice'];
	
	$total  =$qty * $price;
	$q = $con->query("UPDATE cart set quantity = '".$qty."', totalprice = '".$total."' where productid = '".$id."' and Cartid = '".$_SESSION['luseraccount']."' ");
	// code...
}


if(isset($_POST['submit'])){
	$country= $_POST['county'];
	$dis = $_POST['district'];
	$data ="";
	$seller = $_POST['seller'];
	$buyer =$_POST['buyer'];
	$email = $_POST['email'];
	$add = $_POST['address'];
	$cost = $_POST['grand'];
	$product = $_POST['item'];
	$phone = $_POST['phone'];
	$method = $_POST['method'];
	$user = $_SESSION['luseraccount'];
	$fulladdress = $country.$dis.$add;
	if ($method == "#p_credit") {
		$carddetail = $_POST['cardname'].":".$_POST['cardnumber']."+".$_POST['cvv']."w".$_POST['exptime'];
		$stmt=$con->prepare("INSERT into itemorder(buyer,seller,email,phone,address,cost,products,paid_method,creditcarddetail,Useraccount) VALUES 
			                  (?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssissss',$buyer,$seller,$email,$phone,$fulladdress,$cost,$product,$method,$carddetail,$user);
		$stmt->execute();
		$query=$con->query("DELETE FROM cart where Cartid = '".$_SESSION['luseraccount']."' ");
	
		echo '<div class="jumbotron text-center" style="margin-top:20%">
  <h1 class="display-3">Thank You! $seller</h1>
  <h1 class="display-3"></h1>
  <p class="lead"><strong>訂單已成立</strong> </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-xl" href="storehome.php" role="button">回賣場</a>
  </p>
</div>';

	$stmt->close();
		
	}
	else{
		$stmt=$con->prepare("INSERT into itemorder(buyer,seller,email,phone,address,cost,products,paid_method,Useraccount) VALUES 
			                  (?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssisss',$buyer,$seller,$email,$phone,$fulladdress,$cost,$product,$method,$user);
		$stmt->execute();
		$query=$con->query("DELETE FROM cart where Cartid = '".$_SESSION['luseraccount']."' ");
		$stmt->close();
			echo '<div class="jumbotron text-center" style="margin-top:20%">
  <h1 class="display-3">Thank You!<?=$seller?></h1>
  <p class="lead"><strong>訂單已成立</strong> </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-xl" href="storehome.php" role="button">回賣場</a>
  </p>
</div>';


	}
	


}




















/*



<form action="action.php" method="post">
         <input type="hidden" name="stock" value="<?= $stock?>">
         <button type="submit" name="addcart" class="btn" value="<?=$pid?>">加到購物車</button>
         </form>  








include 'connection.php';
session_start();
if (isset($_POST['addcart'])) {
	$id =$_POST['addcart'];	
	$checkstock  =$con->query("SELECT productstock from product where productstock = 0 AND productid = '".$id."'");
	if($checkstock ->num_rows >0){
		echo "<script language='javascript'>
		alert('已無庫存');
		location='item.php?id=$id';
		 </script>";
	}
	else
		$query = $con->query("INSERT INTO cart(Cartid,productid) values('".$_SESSION['luseraccount']."','".$id."') ");
			echo "<script language='javascript'>
			alert('加入成功');
			location='item.php?id=$id';
		 	</script>";
}


if (isset($_POST['delete'])) {
	$did = $_POST['delete'];

	$q = $con->query("DELETE  from cart where Cartid = '".$_SESSION['luseraccount']."' AND productid = '".$did."' ");
		echo "<script language='javascript'>
			alert('成功移除');
			location='shopping_cart.php';
		 	</script>";
}
*/
?>
