
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<form action="987.php" method="post" enctype="multipart/form-data">


      <input type="file" name="photo" accept="image/*" onchange="loadfile(event)"> <br><br>
      
      <button type="submit" name="upload" >以圖搜圖</button>
	</form>

	<form action="987.php" method="POST">
		<input type="text" name="search">
		<button type="submit" name="up">文字搜尋</button>
	</form>

</body>
</html>