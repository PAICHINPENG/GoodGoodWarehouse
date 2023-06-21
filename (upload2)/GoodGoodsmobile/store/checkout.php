<?php
include "connection.php";

session_start();

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-city-selector@2.1.0/dist/tw-city-selector.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jquery.twzipcode.js"></script>
</head>
<body>
<script type="text/javascript">
  $(function(){
  //全部選擇隱藏
  $('div[id^="p_"]').hide();
  $('#slt1').change(function(){
    let sltValue=$(this).val();
    console.log(sltValue);
    
    $('div[id^="p_"]').hide();
    //指定選擇顯示
    $(sltValue).show();
  });
  
});
</script>
<script type="text/javascript">
  $(function () {
  new TwCitySelector()
})
 
</script>

<h1>建立訂單</h1>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form id="placeorder" action="action.php" method="post">
        
        <div class="row">

          <div class="col-50">
            <h3>訂單資訊</h3>
            <label for="slt1"><i class="fa fa-money"></i> 付款方式</label>
             <select id='slt1' name="method"  class="form-select" aria-label="Default select example">
              <option value="#p_COD">貨到付款</option>
              <option value="#p_credit">信用卡</option>
            </select> 
            <label for="fname"><i class="fa fa-user"></i>訂購人</label>
            <input type="text" id="fname" name="buyer" placeholder="陳偉銘" required>
            <label for="fname"><i class="fa fa-phone"></i> 聯絡電話</label>
            <input type="tel" id="fname" name="phone" placeholder="0952004551" required>
            <label for="email"><i class="fa fa-envelope"></i>Email</label>
            <input type="text" id="email" oninput="test1()" name="email" placeholder="CHEN@gms.ndhu.edu.tw" required>
            <label for="adr"><i class="fa fa-address-card-o"></i>地址</label>
  <!-- HTML -->
<!--選地區
<div id="twzipcode" class="form-control"></div>
<script>
$("#twzipcode").twzipcode();
</script>
-->           
         
                
                <div role="tw-city-selector"  data-bootstrap-style></div>
                <input type="text" id="adr" name="address" placeholder="大學路二段一號" required>        
          </div>

<!--信用卡付款-->
          <div class="col-50"  id="p_credit">
            <h3>Payment</h3>
          
            <label for="cname">持卡人</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">卡號</label>
            <input type="text" id="ccnum" name="cardnumber" oninput = "value=value.replace(/[^\d]/g,'')" placeholder="1111-2222-3333-4444">
            <script type="text/javascript">
                var checkk;
                var i = 1;
                
                $("#ccnum").on('input',function(e){
                  if($(this).val().length == 4*i && check <$(this).val().length){
                    $(this).val($(this).val()+'-');
                  }
                  checkk = $(this).val().length
                })
              </script>
         
            <div class="row">
              <div class="col-50">
                <label for="expmonth">到期時間</label>
                <input type="text" id="exptime" name="exptime" placeholder="MM/YY" maxlength="5">
              </div>
              <script type="text/javascript">
                var check
                $("#exptime").on('input',function(e){
                  if($(this).val().length ==2 && check <$(this).val().length){
                    $(this).val($(this).val()+'/');
                  }
                  check = $(this).val().length
                })
              </script>
              <div class="col-50">
                <label for="cvv">驗證三碼</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" minlength="3" maxlength="3">

              </div>
            </div>
          </div>
          
        </div>
  
        
        <input type="submit" name="submit" value="下單" class="btn">
      
    </div>
  </div>
  <div class="col-25">
    <div class="container">
<?php
include 'connection.php';

$grand = 0;
$all = "" ;
$items = array();
$query= $con->query("SELECT * from cart where Cartid = '".$_SESSION['luseraccount']."'");

  if ($query->num_rows>=0) {
    while ($row =$query->fetch_assoc()) {
      $grand += $row['totalprice'];
      $items[] = $row['productname'];
      $seller = $row['seller'];
      $pro = $row['productname'];
      $price = $row['totalprice'];
    }
  }

$all = implode(',',$items); 
?>    


<p>賣家: <?php echo $seller?></p>

 <?php
include 'connection.php';

$grand = 0;
$all = "" ;
$items = array();
$query= $con->query("SELECT * from cart where Cartid = '".$_SESSION['luseraccount']."'");

  if ($query->num_rows>=0) {
    while ($row =$query->fetch_assoc()) {
      $grand += $row['totalprice'];
      $seller = $row['seller'];
      $pro = $row['productname'];
      $price = $row['totalprice'];
      $stock = $row['quantity'];
      $items[] = $row['productname'];
   
$all = implode(',',$items); 
?>    
      
      <p><?php echo $pro?>(<?php echo $stock?>) <span class="price">$<?php echo $price?></span></p>
      <?php } }?>
      <hr>
       <p>Total <span class="price" style="color:black"><b>$<?php echo$grand?></b></span></p>
      
    </div>
  </div>
<input type="hidden" name="seller" value="<?php echo $seller?>">
<input type="hidden" name="grand" value="<?php  echo $grand?>">
<input type="hidden" name="stock" value="<?php  echo $stock?>">
 <?php
include 'connection.php';


$all = "" ;
$items = array();
$query= $con->query("SELECT CONCAT(productname, '(',quantity,')') as tot from cart where Cartid = '".$_SESSION['luseraccount']."'");

  if ($query->num_rows>=0) {
    while ($row =$query->fetch_assoc()) {
     $items[]=$row['tot'];
   }
 }
   
$all = implode(',',$items); 
?>    

<input type="hidden" name="item" value="<?php  echo $all?>">

</form>
<script type="text/javascript" src="shopping_cart.js"></script>         
</div>

</body>
</html>
<style type="text/css">
    
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;

}

h1 {
  text-align: center;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=tel] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>