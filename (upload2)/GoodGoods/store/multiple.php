$(document).ready(function(){

  $('#pform').on('submit',function(e){
    e.preventDefault();
    $.ajax({
      type:'POST',
      url:'upload_product.php',
      data:new FormData(this),
      dataType:'json',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response.status == 1){
          $('#pform')[0].reset();
        }else{
          alert('upload failed!');
        }
      }

    });

  });

});


 $sql = ("INSERT　INTO  product(productname,typename,useraccount,productprice,productdepict,productstock,productimage)VALUES($name,$type,$_SESSION['luseraccount'],$price,$depict,$stock,$fi) ");
        $stmt = $con->prepare($sql);
        $stmt->execute();


        
   foreach ($_FILES['files']['name'] as $key => $value) {
       $filename = basename($_FILES['files']['name'][$key]);
       $targetfile  =$targetDir.$filename;
       if(move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetfile)){
        $insert[] = "('filename')";
       }
   }
    if(!empty($insert)){
        $fi = implode("," , $insert);
        $sql = "INSERT INTO product (productimage) VALUES $fi";
            $stmt= $con->prepare($sql);
            $stmt->execute();
       
    }