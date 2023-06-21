
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
    <input type="button" value="回箱子" onclick="location.href='boxesPC.php'" style="
position:fixed; left:50px; bottom:70px;background-color: orange;">

    <!-- Button to Open the Modal -->
<button type="button" style="
position:fixed; right:50px; bottom:70px;background-color: orange;
font-size: 15px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal7">
  新增物品
</button>

<?php

  // Include the database configuration file
    include 'connection.php';
  if (isset($_POST['boximg'])) {
    
    $_SESSION['b'] = $_POST['boximg'];
    
     
  }

  // Get images from the database
  $query = $con->query("SELECT * FROM goods where boxid = '".$_SESSION['b'] ."'  ");
  if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
        $imageURL = '../goodgoodsimg/'.$row["goodspic"];
        $texturl = $row["goodsdiscription"];
        $title = $row['goodsname'];
        $gid  = $row['goodsid'];
        $timee = $row['g_create_time'];
        $type  =$row['type'];
 ?>

       <div id="r">

       	<div id="c">
          <form>
            <img style="border-radius: 50%;" height="200px" width="200px" src="<?= $imageURL;?>">
           </form>
  <button data-id='<?php echo $row['goodsid']; ?>' class="iiiuserinfo btn btn-success" style="margin-left: 8% ;font-size: 0.8em;"><?= $title?></button></td>
<div class="modal fade" id="gempModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">物品小檔案</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="iiimodal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>


          <form action="delete.php" method="post">
             <input type="hidden" name="gpic" value="<?= $file?>">
             <button type="submit" class="btn btn-danger" name="g" value="<?= $gid?>" style="margin-top: -32%; margin-left: 25%;">刪除</button>
          </form>




 <script type='text/javascript'>
            $(document).ready(function(){
                $('.iiiuserinfo').click(function(){
                    var gid = $(this).data('id');
                    $.ajax({
                        url: 'goodsinfo.php',
                        type: 'post',
                        data: {gid: gid},
                        success: function(response){
                            $('.iiimodal-body').html(response);
                            $('#gempModal').modal('show');
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
        <h4 class="modal-title">新增物品資訊</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="上傳物品.php" method="post" enctype="multipart/form-data">
      <input type="file" name="photo" accept="image/*" onchange="loadfile(event)"> <br><br>
      <?php
      if (isset($_POST['boximg'])) {    
        $w = $_POST['wnnn'];
        $b = $_POST['bnnn'];  
      }
      ?>
      <input type="hidden" name="wa" value="<?= $w?>">
      <input type="hidden" name="bo" value="<?= $b?>">

      <img id="pre" width="50px" height="50px">
      <input type="text"  name="goodsname" placeholder="物品的名稱" required><font size="6"></font>
      <div>
        <textarea id="text1" name="image_text"placeholder="對物品的描述"></textarea>
      </div>
      <select name="t">
        <option disabled>---是什麼種類的物品呢?---</option>
 
        <option value="生活用品" >生活用品</option>
        <option value="五金電器">五金電器</option>
        <option value="3C產品">3C產品</option>
        <option value="文具書籍與玩具">文具書籍與玩具</option>
        <option value="美妝保養">美妝保養</option>
        <option value="服飾">服飾</option>
        <option value="鞋包配件">鞋包配件</option>
        <option value="其他">其他</option>
      </select>
      <label for="che">將物品加到賣場</label>
      <input type="checkbox" name="che" value="1">
      <span>YES</span>
      <br>
      
      <p style="text-align:center;"><input type="submit" name="upload" value="上傳" style="height: 120px ;width: 160px; font-size: 50px"></p>
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
