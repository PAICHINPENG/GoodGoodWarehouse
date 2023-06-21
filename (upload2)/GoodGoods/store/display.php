<?php 
include 'connection.php';
	if (isset($_POST['id'])) {
		$n = $_POST['id'];
	}
 $query = $con->query("SELECT Email FROM userinfo where useraccount = '".$n."' ");
  if($query->num_rows >= 0){
      while($row = $query->fetch_assoc()){
       $e = $row['Email'];

         
?>
<p><?= $e?></p>
<?php}}?>