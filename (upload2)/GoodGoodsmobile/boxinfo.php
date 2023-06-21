<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <style type="text/css">
   .p{
         margin-top:70px;
  
    }
   </style>
</head>

</html>
<?php

include 'connection.php';

if (!empty($_POST['bid'])) {
$bid = $_POST['bid'];
}

 $query = $con->query("SELECT * FROM boxes where boxid = '".$bid."' ");
 if($query->num_rows >= 0){
 	while ($row =  $query->fetch_assoc()) {
      $bpic = '../goodgoodsimg/'.$row["boxpic"];
        $texturl = $row["boxdiscription"];
        $title = $row['boxname'];
        $bid = $row['boxid'];
        $bname = $row['boxname'];
        $timee = $row['b_create_time'];
        $type = $row['type'];
 		   $bname = $row['boxname'];
       $wwname = $row['wname'];
 		?>
    <img  src="<?=$bpic?>" style= " height: 380px; width:400px;position: relative;left:160px;top: 5%;">
    <p class="p"style="text-align:center; font-size: 35px;"></p>
    <p style="text-align:center; font-size: 35px;">箱子名稱 : <?php echo $bname; ?></p>
    <p class="p" style="text-align:center; font-size: 35px;">所屬倉庫: <?php echo $wwname ?></p>
    <p class="p" style="text-align:center; font-size: 35px;">描述: <?php echo $texturl ?></p>
    <p class="p"style="text-align:center; font-size: 35px;">類別: <?php echo $type?></p>
    <p class="p"style="text-align:center; font-size: 35px;">建立時間: <?php echo $timee?></p>




   <?php }}?>
    

