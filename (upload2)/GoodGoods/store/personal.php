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
	<?php 
	include 'connection.php';
		if (isset($_GET['home'])) {
			$owner = $_GET['home'];
			
		}
	?>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey" style="margin-top:10%">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
         		<i class="fas fa-store"></i> <?php echo $owner?>'s  Store
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
                include 'connection.php';
                $query = $con->query("SELECT * from product WHERE useraccount = '".$owner."'");
                  if($query->num_rows>=0){
                    while ($row = $query->fetch_assoc()) {
                        $name = $row['productname'];
                        $price = $row['productprice'];
                        $type= $row['typename'];    
                        $id = $row['productid']; 
                        $image ="../../goodgoodsimg/".$row['productimage'];                  
               
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