
  <?php 
  include 'connection.php';
//fetch.php
if(isset($_POST["id"]))
{
    $type = $_POST['id'];
}
$output='';
 $query = $con->query ("SELECT * FROM product WHERE typename = '".$type."' and productstock > 0");
 if($query->num_rows >= 0){
    while($row = $query->fetch_assoc()){
    $name = $row['productname'];    
    $image = "../../goodgoodsimg/".$row['productimage'];
    $id = $row['productid'];
    $price = $row['productprice'];
?>
<div class="Items">

  <div class="Item">
    <a href="item.php?id=<?=$id?>" class="Item__link">
      <div class="ImageContainer">
        <img src="<?=$image?>" alt="Ripcurl Corp Tee Black" class="Image">
      </div>
      <div class="Item__title"><?= $name?></div>
      <div class="Item__price">$<?= $price?></div>
    </a>
  </div>


</div>


<?php }} ?>

<style>

.Items {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;

}
background #fff,
.Item {
  padding: 20px 0;
  width: 30%;
  transition: box-shadow, 0.4s, ease-in-out;
  border-radius: 3px;
  border-color: greenyellow;
}
@media (max-width: 1050px) {
  background #fff,
  .Item {
    width: 48%;
  }
}
@media (max-width: 600px) {
  background #fff,
  .Item {
    width: 100%;
  }
}
background #fff:not(:last-child),
.Item:not(:last-child) {
  margin-bottom: 10px;
}
.Item__link {
  text-decoration: none;
}
.Item__title {
  text-align: center;
  font-family: 'Montserrat', sans-serif;
  font-size: 2em;
  color: #555;
  width: 90%;
  margin: 10px auto 0;
}
.Item__price {
  text-align:left;
  font-family: 'Montserrat', sans-serif;
  font-size: 1em;
  margin-top: 10px;
  color: #777;
}
.ImageContainer {
  width: 100%;
  height: auto;
}
.Image {
  width: 100%;
  height: 50%;
  border-radius: 30%;
}

</style>