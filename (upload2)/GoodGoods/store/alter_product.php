<?php
//修改商品
include 'connection.php';
session_start();
if (isset($_POST['alt'])) {
	$name = $_POST['alt_name'];
	$price = $_POST['alt_price'];
	$stock = $_POST['alt_stock'];
	$depict = $_POST['alt_depict'];
	$pid=$_POST['alt'];
	if ($stmt = $con->prepare('UPDATE product set  productname = ?, productprice = ?, productstock = ?, productdepict= ? where (useraccount = "'.$_SESSION['luseraccount'].'") and (productid=?)')) {
		$stmt->bind_param('siiss',$name,$price,$stock,$depict,$pid);
		$stmt->execute();
		
 		echo "<script language='javascript'>
		alert('修改成功');
		location='myshop.php';
		 </script>";

 		
	}else{
		echo "bad";
	}
	
}


//刪除商品
if(isset($_POST["del"]))
{
	$pict = $_POST['alt_pic'];
	$pid=$_POST['del'];
 	$query =$con->query( "DELETE FROM product WHERE productid = '".$pid."' and useraccount = '".$_SESSION['luseraccount']."' ");
 	unlink("product_image/".$pict);
 	
 		
 		echo "<script language='javascript'>
		alert('刪除成功');
		location='myshop.php';
		 </script>";
 		

}

?>
/*$query = $con->query("SELECT product.productname,product.productprice,product.productid,product.productimage from product inner join cart on product.productid = cart.productid where Cartid = '".$_SESSION['luseraccount']."' ");
*/