<?php
include "connection.php";
include "nav.php";
session_start();

?>
<html>
<head>
  <meta http-equiv="Page-Enter" content="revealTrans(Transition=23,Duration=5.0)">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-city-selector@2.1.0/dist/tw-city-selector.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.17.0/jquery.tablesorter.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="CSS/store.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

<body>
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-left:15%; margin-top: 5em;">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">我血拚來的</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">我要出貨的</a>
  </li>
</ul>
</head>
<div class="tab-content" id="pills-tabContent">
<!--我買的-->
<div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

<table id="restable" >

    <thead>
      <tr>
      <th colspan='5'>訂單資訊</th>
    </tr>
    <tr>
      <th>賣家</th> 
      <th>購買商品</th>
      <th>價格</th> 
      <th>寄貨地址</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include 'connection.php';
      $q = $con->query("SELECT * from itemorder where Useraccount = '".$_SESSION['luseraccount']."'");
      if ($q->num_rows>=0) {
        while ($row=$q->fetch_assoc()) {
          $seller = $row['seller'];
          $product = $row['products'];
          $price = $row['cost'];
          $add = $row['address'];
 
    ?>

    <tr class="htmw">
      <td data-o="賣家"><a href="personal.php?home=<?=$seller?>"><?php echo $seller?></td></a>
      <td data-o="購買商品"><?php echo$product?></td>
      <td data-o="價格"><?php echo $price?></td>
      <td data-o="寄貨地址"><?php echo $add?></td>
    </tr>
<?php }}?>
  </tbody>
  </table>
</div>

<!--我要出貨的-->
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <table id="restable" >

    <thead>
      <tr>
      <th colspan='5'>出貨訂單</th>
    </tr>
    <tr>
      <th>購買人</th>
      <th>電話</th>
      <th>購買商品</th>
      <th>價格</th> 
      <th>寄貨地址</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include "connection.php";
    $query=$con->query("SELECT * from itemorder where seller = '".$_SESSION['luseraccount']."'");
      if($query->num_rows>=0){
        while($row=$query->fetch_assoc()){
          $buyer = $row['buyer'];
          $phone = $row['phone'];
          $item= $row['products'];
          $price = $row['cost'];
          $add = $row['address'];
    
    ?>
    <tr class="htmw">
      <td data-o="購買人"><?php echo$buyer?></td>
      <td data-o="電話"><?= $phone?></td>
      <td data-o="購買商品"><?=$item?></td>
      <td data-o="價格"><?= $price?></td>
      <td data-o="寄貨地址"><?= $add?></td>

    </tr>
  <?php }} ?>
  </tbody>
  </table>
</div>
</div>
</body>
</html>
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Lato);

*{
  margin: 0;
  padding: 0;
}
body{
  font-family:'Lato', sans-serif;
  background:#edeff0;
}

#restable{
  background:#fff;
  color:#777;
  overflow:hidden;
  min-width:300px;
  max-width:94%;
  margin:1em auto;
  border-collapse:collapse;
  margin-top: 5em;
}
#restable th, 
#restable td:before{
  color:#5a6772;
  text-align:left;
  display:none;
}
#restable tr:nth-child(2) th{
  cursor:pointer;
}
#restable tr:nth-child(2) th:hover{
  color:orange;
}
#restable tr:first-child th{
  display:table-cell;
  text-align:center;
  background:#505050;
  color:#fff;
  padding:1em .5em !important;
}
#restable tr:nth-child(2) th{
  background:#707070;
  color:#fff;
}
#restable tr,
#restable td:first-child{
  -webkit-background-size:40px;
  -moz-background-size:40px;
  -o-background-size:40px;
  background-size:40px;
  background-repeat:no-repeat;
  background-position:95% 65%;
}
#restable tr,
#restable td:first-child{
  -webkit-transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
  -moz-transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
  -o-transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
  transition:background-position 1s cubic-bezier(0, 1.2, .8, 1.2);
}
#restable td{
  display:block;
  padding:0 .5em;
}
#restable td:first-child{
  padding-top:1em;
  background-position:0 -100px;
  color:#333;
  font-weight:600;
}
#restable td:last-child{
  padding-bottom:1em;
  border-bottom:1px solid #ccc;
}
#restable tr:last-child td:last-child{
  border-bottom:none;
}
#restable td:before{
  content:attr(data-o);
  font-weight:bold;
  width:6.5em;
  display:inline-block;
}
#restable tr:nth-child(even){
  background-color:#ebf2f1 !important;
}
@media (min-width: 480px){
  #restable tr{
    background-position:150% 50%;
    background:transparent !important;
  }
  #restable td:before{
    display:none;
  }
  #restable th, #restable td{
    display:table-cell;
    padding:1.5em;
  }
  #restable td:first-child{
    padding-left:70px;
    background-position:5% 50%;
  }
  #restable td:last-child{
    border-bottom:none;
  }
}
/* logos */
.htmw, .htmw td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_html_howtomakeawebsite_stage01.png");
}
.html, .html td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/HTML_Forms.png");
}
.css, .css td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_DD_CSS_Stage6.png");
}
.programming, .programming td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage5.png");
}
.js, .js td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage3.png");
}
.jquery, .jquery td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage1.png");
}
.accessibility, .accessibility td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage4.png");
}
.optimization, .optimization td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_chromeDev_Stage1.png");
}
.console, .console td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_JavaScript_jQueryBasics_Stage2.png");
}
.git, .git td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_DD_Git_Stage3.png");
}
.sass, .sass td:first-child{
  background-image:url("https://wac.a8b5.edgecastcdn.net/80A8B5/achievement-images/badges_DD_SASS_Stage1.png");
}

</style>
<script type="text/javascript">
$(function() {
  $("#restable").tablesorter();
});
</script>