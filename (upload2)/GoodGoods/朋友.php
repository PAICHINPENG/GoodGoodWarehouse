

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	
</head>
<body>

	<?php
		include 'connection.php';
		$query = $con->query("SELECT Useraccount from userinfo");
		if ($query->num_rows>=1) {
			while($row = $query->fetch_assoc()){
				$acc = $row['Useraccount'];
			
			// code...
		


	?>

	<?php }} ?>

</body>
</html>