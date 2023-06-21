<?php
//fetch.php
include 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM userinfo
  WHERE Username LIKE '%".$search."%'
  ";
}
else
{
 $query = "
  SELECT * FROM userinfo ORDER BY Useraccount
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table>
    <tr>
     <th>Customer Name</th>
     <th>Profile</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><button class = "info btn btn-success view" id = '.$row['Useraccount'].'>'.$row['Useraccount'].'</button></td>   
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}







?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
      <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
</head>
<body>

</body>
</html>
<script type="text/javascript">
  $(document).on('click','.view', function(){
    var id = $(this).attr('id')
  })
</script>