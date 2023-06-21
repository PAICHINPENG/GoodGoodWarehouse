
 <?php
include 'connection.php';

session_start();

  if(isset($_SESSION['luseraccount']))
  {     
     // $user = $_SESSION['luseraccount'];
   
  }else{
    header("location:LoginGoodGoodphp");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="style.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
    <div class="headertext">Goodgoods好好藏</div>

		 <?php include 'topnav.php'?>
  </div>
	 <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:white;">
	 	<!-- Button to Open the Modal -->
<button type="button" style="
    position: fixed;
    top: 1250px;  
    right: 10px;
    z-index: 50;
    width: 210px;
    height: 210px;
    background-color: #0fbcf9;
    border-radius: 999em;"
    data-toggle="modal" data-target="#myModal7">
  <img src="warehouse.png" style="width: 170px;height: 170px;border:100px;">
  <h1 style="font-size: 25px;">新增倉庫</h1>
</button>

<?php
  // Include the database configuration file
  include 'connection.php';
   
  // Get images from the database
    $query = $con->query("SELECT * FROM Warehouse where useraccount = '".$_SESSION['luseraccount']."' ");
  if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
        $imageURL = '../goodgoodsimg/'.$row["Warehousepic"];
        $texturl = $row["Warehousediscription"];
        $title = $row['Warehousename'];
        $wid = $row['warehouseid'];
        $wname = $row['Warehousename'];
        $file = $row["Warehousepic"];
        $timee = $row['create_time'];
       
       ?>
       <div id="r">
       	
       	<div id="c">
       			
		<form action="boxes.php" method="post">
              <input type="hidden" name="wn" value= "<?= $wname?>">
              <button type="submit" style="background-color: transparent; outline-color: yellow; border-radius: 999em; height: 250px; width: 250px;"  name="img" value="<?= $wid?>">
                <img style="border-radius: 999em; height:250px; ; width:250px;  position: relative;top: 0px;left: -16px;" src="<?= $imageURL;?>">
              </button>
          </form>
          <button data-id='<?php echo $row['warehouseid']; ?>' class="iuserinfo btn btn-success" style="margin-top: 20%; margin-left: 10%;background-color:#5995fd;width: 90px;height: 50px;font-size: 25px;border-radius:20px;"><?= $wname?></button></td>
<div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog" style="position: relative;top:2%;left: -5%;">
                    <div class="modal-content" style="width: 700px;height: 1200px;position: relative;left: -10%;top: 60px;">
                        <div class="modal-header" style="position: relative;width: 100%;height: 20%; text-align: 50px;background-color:#ffaaa7;">
                            <h4 style="font-size:  50px; position: relative;top: 10px;">倉庫小檔案</h4>
                          <button type="button" class="close" data-dismiss="modal" style="font-size: 60px;">×</button>
                        </div>
                        <div class="imodal-body">
                        </div>
                        <div class="modal-footer" style="position: relative;bottom: 30px;height: 170px;background-color:#ffaaa7;">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 30px;">Close</button>
                        </div>
                    </div>
                </div>
        </div>

		<form action="delete.php" method="post">
          <input type="hidden" name="wpic" value="<?= $file?>">
          <button type="submit" class="btn btn-danger" name="w" value="<?= $wid?>" style="margin-top: -47%; margin-left: 50%;width: 90px;height: 50px;font-size: 21px;border-radius: 20px;">刪除</button>
             
        </form>          


 <script type='text/javascript'>
            $(document).ready(function(){
                $('.iuserinfo').click(function(){
                    var wid = $(this).data('id');
                    $.ajax({
                        url: 'winfo.php',
                        type: 'post',
                        data: {wid: wid},
                        success: function(response){ 
                            $('.imodal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
</div>
</div>

       <?php  }}  ?>






<!-- The Modal -->
<div class="modal" id="myModal7">
  <div class="modal-dialog" style="width: 100%; height: 100%;">
    <div class="modal-content" style="width: 650px;height: 1200px;position: relative;top: 8%;left: -15%;">

      <!-- Modal Header -->
      <div class="modal-header" style="width: 100%;height: 10%;background-color:#ffaaa7;">
        <h4 class="modal-title" style="font-size: 40px;line-height:85px;">新增倉庫資訊</h4>
        <button type="button" class="close" data-dismiss="modal" style="font-size: 50px;">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="width: 100%;height: 80%;">
            <form action="上傳倉庫.php" method="post" enctype="multipart/form-data">
      <img id="pre" style="width: 400px; height: 400px; position: relative;left: 17.5%;">
      <input type="file" name="photo" accept="image/*" onchange="loadfile(event)" style="position: relative;left: 40%;top: 30px;height: 30px;"> 
      <input class="inputstyle" type="text"  name="warehousename" placeholder="倉庫的名稱">
      <input class="inputstyle" type="text" name="place" placeholder="地點">
      <div>
        <textarea class="inputstyle"id="text1" name="image_text"placeholder="對倉庫的描述"></textarea>        
      </div>
      <p style="text-align:center;">
        <input type="submit" name="upload" value="上傳" style="height: 60px ;width: 120px;position: absolute;bottom: 20px;left: 42%; font-size: 30px">
      </p>
    </form> 
     <script type="text/javascript">
      function loadfile(event){
        var out = document.getElementById('pre');
        out.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="width: 100%; height: 10%; background-color:#ffaaa7;">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 30px;">Close</button>
      </div>

    </div>
  </div>
</div>

	</div>
    <div id="bottom" style=" position:absolute; bottom:0px; height:200px; left:0px; right:0px; overflow:hidden;background-color:#3b4465;">
   <?php include 'bottomnav.php'?>
    </div>

</body>
</html>