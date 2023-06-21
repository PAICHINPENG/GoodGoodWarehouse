<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <style type="text/css">
     .p{
         margin-top:4%;
  
    }
   </style>
</head>

</html>
<?php
include 'connection.php';
if (!empty($_POST['gid'])) {
$gid = $_POST['gid'];
}

 $query = $con->query("SELECT * FROM goods where goodsid = '".$gid."' ");
 if($query->num_rows >= 0){
 	while ($row =  $query->fetch_assoc()) {
        $gpic = '../goodgoodsimg/'.$row["goodspic"];
        $texturl = $row["goodsdiscription"];      
        $gid  = $row['goodsid'];
        $timee = $row['g_create_time'];
        $type  =$row['type'];
 		  $gname = $row['goodsname'];
        $wname = $row['depotname'];
        $bname = $row['casename'];
        $sale = $row['forsale'];
        if ($sale == 1) {
             $yes = 'checked';            
          }
          else
            $yes='';
 		?>
     <img  src="<?=$gpic?>" style= " height: 380px; width:400px;position: relative;left:150px;top: 0%;">
     <p style="text-align:center; font-size: 35px;">物品名稱 : <?php echo $gname; ?></p>
    <p class="p" style="text-align:center; font-size: 35px;">所屬倉庫: <?php echo $wname ?></p>
    <p class="p" style="text-align:center; font-size: 35px;">所屬箱子: <?php echo $bname ?></p>
    <p class="p" style="text-align:center; font-size: 35px;">描述: <?php echo $texturl ?></p>
    <p class="p"style="text-align:center; font-size: 35px;">類別: <?php echo $type?></p>
    <p class="p"style="text-align:center; font-size: 35px;">建立時間: <?php echo $timee?></p>
    <p class="p" style="text-align:center; font-size: 35px;">是否要當成商品:<input type="checkbox" name="che" value="1" <?= $yes ?>></p>

  
   <?php }}?>


