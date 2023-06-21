<?php

include "connection.php"; 

session_start();
if(isset($_SESSION['luseraccount'])){
	$user = $_SESSION['luseraccount'];
}

   $rand = rand(0,999);
   $extend = pathinfo($_FILES['files']['name'],PATHINFO_EXTENSION);
   $name = $_POST['product_name'];
   $depict = $_POST['product_depict'];
   $price = $_POST['product_price'];
   $stock = $_POST['product_stock'];
   $type = $_POST['product_type'];
   $targetDir = "product_image/";
   $tmp = $_FILES['files']['tmp_name'];
   $rename = $_SESSION['luseraccount'].$name.$rand;
   $newname  = $rename.".".$extend;
   $id = $_SESSION['luseraccount'].'pro'.$rand;
if ($stmt = $con->prepare("INSERT INTO 
    product(productname,productid,typename,useraccount,productprice,productdepict,productstock,productimage)VALUES(?,?,?,?,?,?,?,?)")) {
    move_uploaded_file($tmp, "../../goodgoodsimg/".$newname);
    $stmt->bind_param("ssssisis",$name,$id,$type,$user,$price,$depict,$stock,$newname);
    $stmt->execute();
   
        echo "<script language='javascript'>
        alert('新增成功');
        location='myshop.php';
         </script>";

        
}else{
    echo'fail';
}
$stmt->close();
$con->close();


?>