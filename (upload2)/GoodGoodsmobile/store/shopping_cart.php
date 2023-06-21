<?php
include "connection.php";
include "nav.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="CSS/shopping_cart.css">
   
    <link rel="stylesheet" type="text/css" href="CSS/store.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body style="margin-top:15%">
    <div class="container">
        <div class="row">
            <div  class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thread>
                            <tr>
                                    <th scope="col">Seller</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">price</th>
                                    <!--<th scope="col" class="text-center">Quantity</th>-->
                                    <th scope="col" class="text-right">Total Price</th>
                                    <th scope="col" class="text-center">Delete</th>
                              
                            </tr>
                        </thread> 
                        <tbody>
                                                                
                           <?php
                            include "connection.php";


                            $query = $con->query("SELECT productname,productid,quantity,totalprice,productimage,price,seller from cart where Cartid = '".$_SESSION['luseraccount']."'  ");
                            if ($query->num_rows>=0) {
                                $grand = 0;
                                
                                while ($row =$query->fetch_assoc()) {
                                    $name = $row['productname'];
                                     $id = $row['productid'];
                                     $quantity = $row['quantity'];
                                    $image = "../../goodgoodsimg/".$row['productimage'];
                                        $totalprice = $row['totalprice'];
                                             $price = $row['price'];
                                        $seller = $row['seller'];     
                                ?>
                                <tr>
                                    <td><input type="checkbox" value="<?php echo $seller?>"></td>
                                    <td><img style="width: 100px;height: 100px;" src="<?=$image?>" alt="Product"></td>
                                    <td><?php echo $name?></td>
                                    <td>NT <?php echo $price?></td>
                                    <!--<td><input type="number" class="form-control itemqty" value=""></td>-->
                                    <td class="text-right">NT <?php echo $totalprice?></td>
                                    <td><button data-id= "<?= $id?>"  class="delbut btn-outline-danger btn-sm btn-block mb-2">Remove</button></td><script type="text/javascript" src="shopping_cart.js"></script>
                                    <input type="hidden" class="pid" value="<?php  echo $id?>">
                                    <input type="hidden" class="pprice" value="<?php echo  $price?>">
                                    <?php $grand += $totalprice?>
                                </tr>
                                   <?php }} else echo "go";?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?php echo $grand?></td> 
                                    <td></td>      
                                </tr>
                        </tbody>   
                    </table>
                              <div class="col-mb-2">
            
            </div>

                </div>
                    <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="storehome.php" class="btn btn-block btn-light">繼續購物</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="checkout.php" class="btn btn-md btn-block btn-success ">結帳</a>
                    </div>
                </div>
            </div>
    

        </div>


    </div>
</body>
</html>
