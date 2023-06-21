<?php
include 'connection.php';

session_start();

  if(isset($_SESSION['luseraccount']))
  {     
     // $user = $_SESSION['luseraccount'];
   
  }else{
    header("location:new登入註冊.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Script -->
 
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="CSS/store.css">
       


	<title></title>
    
</head>
<body style="background-color: pink;">

 <!--照片欄-->          
<style type="text/css">
    .image_con {
    height: 120px;
    width: 200px;
    border-radius: 6px;
    overflow: hidden;
    margin: 10px;

}
.image_con img {
    height: 100px;
    width: 100px;
    object-fit: cover;
   white-space: nowrap;}
.image_con span {
    
    color: red;
    font-size: 28px;
    font-weight: normal;
    cursor: pointer;
}
</style>
<div class="logo" style="text-align: center; font-size: 24px; "><font color="purple">我的商店</font></div>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-left:40%; margin-top: 10%;">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">新增商品</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">已上架</a>
  </li>
</ul>
<!--分頁-->
<div class="tab-content" id="pills-tabContent">
<!--新增商品頁-->
<div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<div class="container">
  <form action="upload_product.php" id="pform" method="post" enctype="multipart/form-data">
    <fieldset>
              <legend>商品資訊</legend>
      <div class="field-wrapper">
        <label for="product_name" style="margin-left:124px">商品名稱</label>
        <input type="text" name="product_name" style="width: 75%" id="name" class="form-element" required autocomplete="name" placeholder="Proudct Name">
        <label for="product_depict" style="margin-left:124px">商品描述</label>
        <textarea  name="product_depict" id="product_depict" style="width: 75%" class="form-element" required autocomplete="product_depict" placeholder="Proudct depiction"></textarea>
        <label for="product_price" style="margin-left:124px">商品金額</label>
        <input type="number" name="product_price" style="width: 75%" id="price" class="form-element" required autocomplete="price" placeholder="$NTD">
        <label for="product_stock" style="margin-left:124px">剩餘庫存</label>
        <input type="number" name="product_stock"  style="width: 75%" id="stock" class="form-element" required autocomplete="stock" placeholder="0" min="0">
        <label for="type" style="margin-left:124px">商品種類</label>
        <select class="form-element" style="width: 75%" name="product_type">
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
          <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('image').click()" style="width:108px;height:35px;">Choose Images</button>
             <input type="file"  name="files" id="image" multiple="" class="d-none" onchange="image_select()" class="form-element" required autocomplete="files">
          <label for="Image" style="margin-left:15px">商品圖片</label>
      
          <div id="con">
            <!--照片預覽位置-->
          </div>
      </div>
    </fieldset>
 <div class="right">
      <button type="submit" name="submit">確認</button>
    </div>
    
  </form>
  
</div>
</div>
<!--已存在之商品頁-->


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
 <div class="container">
            <div class="card">
                <div class="card-header">Product Management</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer_table" class="table table-bordered table-hover" style="overflow: auto;">
                            <thead>
                                <tr>
                                    <th width="20%">商品圖片</th>
                                    <th width="20%">商品名稱</th>
                                    <th width="40%">商品描述</th>
                                    <th width="6%">價格</th>
                                    <th width="6%">庫存</th>
                                    <th width="8%">動作</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
include "connection.php";
$query = $con->query("SELECT productname,productid,productdepict,productprice,productstock,productimage from product where useraccount = '".$_SESSION['luseraccount']."'     ");
if($query->num_rows >0){
  while ($row = $query->fetch_assoc()) {
    $name = $row['productname'];
    $id = $row['productid'];
    $depict = $row['productdepict'];
    $price = $row['productprice'];
    $stock = $row['productstock'];
    $image = "../../goodgoodsimg/".$row['productimage'];
     
?>
                                 <td><img style="height: 50px; width: 50px;" src="<?= $image?>"></td>
                                 <td><?=$name?></td>
                                 <td><?= $depict?></td>
                                 <td><?= $price?></td>
                                 <td><?= $stock?></td>
                                 <td> <button data-id='<?php echo $row['productid']; ?>' class="productt btn btn-success" style="margin-left: 10% ;">Edit</button></td>
                                          
<div class="modal fade" id="proModal" role="dialog" aria-labelledby="9898">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="9898">修改商品資訊</h4>
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
        <script type='text/javascript' src="product_info.js"></script>
                            </tbody>
                            <?php }} 
                            ?>
                        </table>
                    </div>
                </div><!--cardbody--->
            </div><!--card-->
        </div>
  </div>
  </div>

</div>
<?php include 'nav.php'?>
</body>
</html>

<!--照片預覽js-->
<script type="text/javascript" src="preview.js"></script>