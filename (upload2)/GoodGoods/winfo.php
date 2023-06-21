<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <style type="text/css">
      .p{
         margin-top:-50px;
      }
   </style>
</head>

</html>
<?php

include 'connection.php';
session_start();
if (!empty($_POST['wid'])) {
$wid = $_POST['wid'];
}

 $query = $con->query("SELECT * FROM warehouse where warehouseid = '".$wid."' ");
 if($query->num_rows >= 0){
 	while ($row =  $query->fetch_assoc()) {
        $wpic = '../goodgoodsimg/'.$row["Warehousepic"];
 		  $wname = $row['Warehousename'];
        $texturl = $row["Warehousediscription"];
        $wid = $row['warehouseid'];
        $file = $row["Warehousepic"];
        $place = $row['place'];
        $timee = $row['create_time'];
 		?>
      <img  src="<?=$wpic?>" style="display:block; margin:auto; border-radius: 50%; height:160px; width:160px;">
      <p style="text-align:center;">建立者 : <?php echo $_SESSION['luseraccount']; ?></p>
      <p class="p" style="text-align:center;">倉庫名稱 : <?php echo $wname?></p>
      <p class="p" style="text-align:center;">地點 : <?php echo $place?></p>
      <p class="p"style="text-align:center;">描述 : <?php echo $texturl?></p>
      <p class="p"style="text-align:center;">建立時間 : <?php echo $timee?></p>

   <?php }}?>
