
 <?php
include 'connection.php';

session_start();

  if(isset($_SESSION['luseraccount']))
  {     
     // $user = $_SESSION['luseraccount'];
   
  }else{
    header("location:LoginGoodGoods.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet"  href="設計.css ">
</head>
<body>
	<div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;background-color:#ffaaa7;"> 
    <div class="headertext">Goodgoods好好藏</div>

     <?php include 'topnav.php'?>
	 <div id="content" style="position:absolute; top:200px; bottom:200px; left:0px; right:0px; overflow:auto;background-color:white;">
    <button type="button" value="回箱子" onclick="location.href='warehouse.php'" style="position: fixed;
      top: 1250px;  
      left: 10px;
      z-index: 50;
      width: 210px;
      height: 210px;
      background-color: white;
      border-radius: 999em;
      font-size: 30px;">
      <img src="navpic/icon4.png" style="width: 150px;height: 150px;border:100px;">
      <h1 style="font-size: 21px;position: relative;bottom: 5%;">回倉庫</h1>
    </button>

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
  <h1 style="font-size: 25px;">新增箱子</h1>
</button>

<?php
 
  // Include the database configuration file
  include 'connection.php';
  if (isset($_POST['img'])) {
  $_SESSION['w'] = $_POST['img'];
  $name = $_POST['wn'];
  
  /*$page='倉庫.php';
   echo "<h2>You are in warehouse :<a href='$page'>$name</h2></a>"  ;*/
  };


  // Get images from the database
  $query = $con->query("SELECT * FROM boxes where Warehouseid = '".$_SESSION['w']."' "); 

  if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
        $imageURL = '../goodgoodsimg/'.$row["boxpic"];
        $texturl = $row["boxdiscription"];
        $title = $row['boxname'];
        $bid = $row['boxid'];
        $bname = $row['boxname'];
        $file = $row['boxpic'];
        $timee = $row['b_create_time'];
        $type = $row['type'];
        $wname = $row['wname'];
        ?>       
       <div id="r">
       	
       	<div id="c">
     			
		<form action="goods.php" method="post">
              <input type="hidden" name="wnnn" value="<?=$wname?>">
              <input type="hidden" name="bnnn" value= "<?= $bname?>">
              <button type="submit" style="background-color: transparent; outline-color: yellow; border-radius: 999em; height: 250px; width: 250px;" name="boximg" value="<?= $bid?>">
                <img style="border-radius: 999em; height:250px; ; width:250px;  position: relative;top: 0px;left: -16px;" src="<?= $imageURL;?>">
              </button>
          </form>
          <button data-id='<?php echo $row['boxid']?>' class="iiuserinfo btn btn-success" style="margin-top: 20%; margin-left: 10%;background-color:#5995fd;width: 90px;height: 50px;font-size: 25px;border-radius:20px;"><?= $bname?></button></td>
<div class="modal fade" id="bempModal" role="dialog">
                <div class="modal-dialog" style="position: relative;top:2%;left: -5%;">
                    <div class="modal-content" style="width: 700px;height: 1400px;position: relative;left: -10%;top: 60px;">
                        <div class="modal-header" style="position: relative;width: 100%;height: 10%; text-align: 50px;background-color:#ffaaa7;">
                            <h4 style="font-size:50px; position: relative;top: 20px;" class="modal-title">箱子小檔案</h4>
                          <button type="button" class="close" data-dismiss="modal" style="font-size: 60px;">×</button>
                        </div>
                        <div class="iimodal-body">
                        </div>
                        <div class="modal-footer" style="position: relative;bottom: -50px;height: 130px;background-color:#ffaaa7;">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 30px;">Close</button>
                        </div>
                    </div>
                </div>
        </div>

		<form action="delete.php" method="post">
          <input type="hidden" name="bpic" value="<?= $file?>">
          <button type="submit" class="btn btn-danger" name="b" value="<?= $bid?>" style="margin-top: -47%; margin-left: 50%;width: 90px;height: 50px;font-size: 21px;border-radius: 20px;">刪除</button> 
    </form>          


 <script type='text/javascript'>
            $(document).ready(function(){
                $('.iiuserinfo').click(function(){
                    var bid = $(this).data('id');
                 
                    $.ajax({
                        url: 'boxinfo.php',
                        type: 'post',
                        data: {bid: bid},
                        success: function(response){ 
                            $('.iimodal-body').html(response); 
                            $('#bempModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
</div>
</div>

       <?php  } }  ?>








<!-- The Modal -->
<div class="modal" id="myModal7">
  <div class="modal-dialog" style="width: 100%; height: 100%;">
    <div class="modal-content" style="width: 650px;height: 1200px;position: relative;top: 8%;left: -15%;">

      <!-- Modal Header -->
      <div class="modal-header" style="width: 100%;height: 10%;background-color:#ffaaa7;">
        <h4 class="modal-title" style="font-size: 50px;line-height:85px;">新增箱子資訊</h4>
        <button type="button" class="close" data-dismiss="modal" style="font-size: 50px;">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="width: 100%;height: 80%;">
            <form action="上傳箱子.php" method="post" enctype="multipart/form-data">
      <img id="pre" style="width: 400px; height: 400px; position: relative;left: 17.5%;">
      <input type="file" name="photo" accept="image/*" onchange="loadfile(event)" style="position: relative;left: 40%;top: 20px;"> 
        <?php if (isset($_POST['img'])) {
        $wname = $_POST['wn'];
      }
      ?>
      <input type="hidden" name="wn" value="<?= $wname?>">
      <input type="text"  name="boxname" placeholder="箱子的名稱" style="position: relative;top: 40px;left: 20%;width: 60%;height: 40px;font-size: 20px;">
      <div>
        <textarea id="text1" name="image_text"placeholder="對箱子的描述" style="position: relative;top:60px;left: 20%;width: 60%;height: 140px;font-size: 20px;"></textarea>
      </div>
      <select name="t" style="position: relative;top: 80px;left: 20%;width: 60%;height: 40px;">
        <option disabled>---是什麼種類的箱子呢?---</option>
        <option value="紙箱">紙箱</option>
        <option value="塑膠盒">塑膠盒</option>
        <option value="抽屜">抽屜</option>
        <option value="皮箱">皮箱</option>
      </select>
      <p style="text-align:center;">
        <input type="submit" name="upload" value="上傳" style="height: 60px ;width: 120px;position: absolute;bottom: 20px;left: 42%; font-size: 30px"></p>
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