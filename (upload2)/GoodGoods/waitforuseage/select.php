<?php
include "connection.php";
 
$userid = $_POST['userid'];
 
$sql = "select * from employee where id=".$userid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td width="300"><img src="images/<?php echo $row['photo']; ?>">
    <td style="padding:20px;">
    <p>Name : <?php echo $row['name']; ?></p>
    <p>Position : <?php echo $row['position']; ?></p>
    <p>Office : <?php echo $row['office']; ?></p>
    <p>Age : <?php echo $row['age']; ?></p>
    <p>Salary : <?php echo $row['salary']; ?></p>
    </td>
</tr>
</table>
 
<?php } ?>