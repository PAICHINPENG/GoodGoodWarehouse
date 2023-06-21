<?php
include "connection.php";
include "nav.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/item.css">
	<link rel="stylesheet" type="text/css" href="CSS/store.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body style="background-color: lightcyan;">

<div class="main" style="margin-top: 10%;">
    <div class="alert-message" style="margin-top: 8%;"></div>
<?php
include "connection.php";

if (isset($_GET['id'])) {
	$pid = $_GET['id'];
}
$query = $con ->query("SELECT*from product where productid = '" .$pid."' ");
	if ($query->num_rows>=0) {
		while($row = $query->fetch_assoc()){
			$name = $row['productname'];
			$price = $row['productprice'];
			$depict  =$row['productdepict'];
			$image = "../../goodgoodsimg/".$row['productimage'];
            $stock = $row['productstock'];
            $seller  = $row['useraccount'];
		
		// code...
	
?>
<div class="product">
    <div class="product-img">
        <img src="<?= $image?>" alt="">       
    </div>
    <div class="product-listing">
 <div class="content">
        <h1><p><a href="personal.php?home=<?=$seller?>"style="text-decoration:none; color:#FFF4C1;"><i class="fas fa-store"></i><?= $seller?></a></p></h1>
        <h1 class="name"><?= $name?></h1>
        <p class="info"><?= $depict?></p>
        <p>$<?= $price?></p>
        <p >剩餘庫存<?= $stock?></p>
        <div class="btn-and-rating-box">  
        <form class="form-submit">
            <input type="hidden" class="productimage" value="<?=$row['productimage']?>">
            <input type="hidden" class="productname" value="<?= $name?>">
            <input type="hidden" class="productprice" value="<?=$price?>">
            <input type="hidden" class="productid" value="<?= $pid?>">
            <input type="hidden" class="seller" value="<?= $seller ?>">
            <input type="number" class="productstock" value="1"  min="0" max=<?=$stock?>>
             <button id="addcart" name="addcart" class="btn"<?=( $stock > 0)?"":"disabled";?>><i class="fa fa-shopping-cart"></i> 加到購物車</button>
        </form>
        </div>
    </div>
    </div>
</div>
<?php } } ?>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click","#addcart",function(e){
            e.preventDefault();
            
            var form  =$(this).closest(".form-submit");
            var id = form.find(".productid").val();
            var stock = form.find(".productstock").val();
            var price = form.find(".productprice").val();
             var name = form.find(".productname").val();
             var image = form.find(".productimage").val();
             var seller  =form.find(".seller").val();
            $.ajax({
                url:"action.php",
                method:"post",
                data:{pid:id,pstock:stock,pprice:price,pname:name,pimage:image,pseller:seller},
                success:function(response){
                    $(".alert-message").html(response);

                }
            });
        });
    });
</script>
