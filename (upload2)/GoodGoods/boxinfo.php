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
    <img src="<?= $bpic ?>" style="display:block; margin:auto; border-radius: 50%;" height="160px" width="160px">
    <p style="text-align:center;">箱子名稱 : <?php echo $bname; ?></p>
    <p class="p" style="text-align:center;">所屬倉庫: <?php echo $wwname ?></p>
    <p class="p" style="text-align:center;">描述: <?php echo $texturl ?></p>
    <p class="p"style="text-align:center;">類別: <?php echo $type?></p>
    <p class="p"style="text-align:center;">建立時間: <?php echo $timee?></p>
   <?php }}?>
