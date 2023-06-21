
 <?php
include 'connection.php';

session_start();

  if(isset($_SESSION['luseraccount']))
  {
     // $user = $_SESSION['luseraccount'];

  }else{
    header("location:LoginGoodGoodsPC.php");
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
 <link rel="stylesheet"  href="paint.css ">
</head>
<body>
    <div id="header" style="position:absolute; top:0px; left:0px; height:110px; right:0px;overflow:hidden;background-color:white;">
    <?php include 'topnavbar.php'?>
  </div>
	 <div id="content" style="position:absolute; top:110px; bottom:60px; left:0px; right:0px; overflow:auto;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg' );">
	 	<!-- Button to Open the Modal -->
<button type="button" style="
    position:absolute; right:50px; bottom:50px;;
    font-size: 15px;background-color: orange;
    " class="btn btn-primary" data-toggle="modal" data-target="#myModal7">
  新增倉庫
</button>

<?php
  // Include the database configuration file
  include 'connection.php';

  // Get images from the database
    $query = $con->query("SELECT * FROM Warehouse where useraccount = '".$_SESSION['luseraccount']."' ");
  if($query->num_rows > 0){
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

		<form action="boxesPC.php" method="post">
              <input type="hidden" name="wn" value= "<?= $wname?>">
              <button type="submit" style="background-color: transparent; outline-color: yellow; border-radius: 50%;"  name="img" value="<?= $wid?>"><img style="border-radius: 50%;" height="200px" width="200px" src="<?= $imageURL;?>"></button>
    </form>

          <button data-id='<?php echo $row['warehouseid']; ?>' class="iuserinfo btn btn-success" style="margin-left: 10% ;font-size:0.8em;"><?php echo $wname?></button></td>
<div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">倉庫小檔案</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="imodal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>

		<form action="delete.php" method="post">
          <input type="hidden" name="wpic" value="<?= $file?>">
          <button type="submit" class="btn btn-danger" name="w" value="<?= $wid?>" style="margin-top: -32%; margin-left: 25%;">刪除</button>

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
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">新增倉庫資訊</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="上傳倉庫.php" method="post" enctype="multipart/form-data">
      <input type="file" name="photo" accept="image/*" onchange="loadfile(event)"> <br><br>
      <img id="pre" width="50px" height="50px">
      <br>
      <input type="text"  name="warehousename" placeholder="倉庫的名稱"><font size="6"></font><br><br>
      <input type="text" name="place" placeholder="地點"><br><br>
      <div>
        <textarea id="text1" name="image_text"placeholder="對倉庫的描述"></textarea>
      </div><br><br>
      <p style="text-align:center;"><input type="submit" name="upload" value="上傳" style="height: 40px ;width: 50px; font-size: 18px"></p>
    </form>
     <script type="text/javascript">
      function loadfile(event){
        var out = document.getElementById('pre');
        out.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

	</div>
 
    <div id="bottom" style=" position:absolute; bottom:0px; height:60px; left:0px; right:0px; overflow:hidden;background-image:url( 'https://pic50.photophoto.cn/20190320/1190120702716590_b.jpg');">
  <?php include "navbar.php";
  ?>
    </div>

</body>
</html>
