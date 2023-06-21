<?php
include 'connection.php';
include 'nav.php';
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Script -->
 
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title></title>

</head>
<body>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey" style="margin-top:10%">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
            <?php 
              
   if (isset($_POST['upload'])) {
  
  $originname = $_FILES['photo']['name'];
  $extend = 'jpg';
  $num = 'pppp';
  $rename = $num.'.'.$extend;
  $tmpname = $_FILES['photo']['tmp_name'];
  move_uploaded_file($tmpname,"../../py/".$rename);
  sleep(1);
  $file = '../pppp.txt';
  $myfile = fopen("../../pytxt/pppp.txt","r");
  $chinese = '';
  $read = fgets($myfile);
  switch ($read) {
    case 'watch':
      $chinese = '錶';
      #echo $chinese;
      break;
    case 'bag':
      $chinese = '包';
      #echo $chinese;
      break;
    case 'shoes':
      $chinese = '鞋';
      #echo $chinese;
      break;
    case 'hair dryer':
      $chinese = '吹風機';
      #echo $chinese;
      break;
    case 'cup':
      $chinese = '杯';
      #echo $chinese;
      break;
    case 'camera':
      $chinese = '相機';
      #echo $chinese;
      break;
    case 'broom':
      $chinese = '掃把';
      #echo $chinese;
      break;
    case 'bottle':
      $chinese = '壺';
      #echo $chinese;
      break;      
  }
  fclose($myfile);
}
  ?>
                <i class="fas fa-store"></i>搜尋結果 <?= $chinese?>
          </div>       
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">       
      </div>
      <div class="panel">
        
         
      </div>
      <div>
           
          <div class="row">
            <?php
               if (isset($_POST['upload'])) {
  
  $originname = $_FILES['photo']['name'];
  $extend = 'jpg';
  $num = 'pppp';
  $rename = $num.'.'.$extend;
  $tmpname = $_FILES['photo']['tmp_name'];
  move_uploaded_file($tmpname,"../../py/".$rename);
  sleep(1);
  $file = '../pppp.txt';
  $myfile = fopen("../../pytxt/pppp.txt","r");
  $chinese = '';
  $read = fgets($myfile);
  switch ($read) {
    case 'watch':
      $chinese = '錶';
      #echo $chinese;
      break;
    case 'bag':
      $chinese = '包';
      #echo $chinese;
      break;
    case 'shoes':
      $chinese = '鞋';
      #echo $chinese;
      break;
    case 'hair dryer':
      $chinese = '吹風機';
      #echo $chinese;
      break;
    case 'cup':
      $chinese = '杯';
      #echo $chinese;
      break;
    case 'camera':
      $chinese = '相機';
      #echo $chinese;
      break;
    case 'broom':
      $chinese = '掃把';
      #echo $chinese;
      break;
    case 'bottle':
      $chinese = '壺';
      #echo $chinese;
      break;      
  }
  fclose($myfile);

$query = $con->query("SELECT * from product where productname like '%$chinese%'  ");
 }
if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
        $id = $row['productid'];
        $name = $row['productname'];       
        $type = $row['typename'];
        $image = '../../goodgoodsimg/'.$row["productimage"];
        $price = $row['productprice'];

      
?>                
               
      
 
              <div class="col-md-6">
                    
                  <div class="panel">
                    <a href="item.php?id=<?=$id?>">
                      <div class="panel-body">

                          <div class="bio-chart">
                              <div style="display:inline;width:5em;height:5em;"><img src="<?php echo$image?>" style="width:100px;height:100px;"></div>
                          </div>
                          <div class="bio-desk">

                              <h4 class="red"><?php echo $name?></h4>
                              <p><?php echo $type?></p>
                              <p>$<?php echo $price ?></p>

                          </div>
                      </div>
                      </a>
                  </div>
          
              </div>

                  <?php }} ?>

          </div>

      </div>
  </div>
</div>
</div>



</body>
</html>
<link rel="stylesheet" type="text/css" href="CSS/personal.css">