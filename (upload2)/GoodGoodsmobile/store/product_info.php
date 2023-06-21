<?php
if (isset($_POST['pid'])) {
	$pid = $_POST['pid'];

}
include "connection.php";
$query = $con->query("SELECT productname,productid,productdepict,productprice,productstock,productimage from product where productid = '".$pid
	."' ");
if($query->num_rows >=0){
  while ($row = $query->fetch_assoc()) {
    $name = $row['productname'];
    $id = $row['productid'];
    $depict = $row['productdepict'];
    $price = $row['productprice'];
    $stock = $row['productstock'];
    $image = $row['productimage'];

?>
<style type="text/css">
input&label{
  
  margin-top: 5%;

}
</style>
<form action="alter_product.php" method="post">
<label for="alt_name">商品名稱</label>
<input type="text" style="width: 75%;"  class="form-control" name="alt_name" value="<?=$name?>">

<br /><label for="alt_name">商品簡介</label>
<input type="text" style="width: 75%;"  class="form-control" name="alt_depict" value="<?=$depict?>">

<br /><label for="alt_price">商品價格</label>
<input type="number" style="width: 75%;"  name="alt_price" class="form-control" value="<?=$price?>">

<br /><label for="alt_stock">商品庫存</label>
<input type="number" style="width: 75%;"  name="alt_stock" class="form-control" value="<?=$stock?>">


<input type="hidden" name="alt_pic" class="form-control" value="<?=$image?>">

<button type="submit" name="alt" value="<?=$pid?>" class="btn btn-success btn-block" id="Update">確認修改</button>
<button type="submit" name="del"  value="<?=$pid?>" onclick="window.alert('要刪除嗎?')" class="btn btn-danger btn-block" id="Delete">刪除</button>

</form>


<?php }}?> 
