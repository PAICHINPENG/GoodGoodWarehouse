
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width;initial-scale=10.0">
<link rel="stylesheet"  href="newhome.css ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	#show{
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,0.7);
		opacity: 0.7;
		position: absolute;
		top:0;
		display: flex;
		justify-content: center;
		align-items: center;
		display: none;
	}
	#show-content{
		width: 800px;
		height:1400px;
		background-color: white;
		border-radius: 15px; 
		text-align: center;
		padding: 90px;
		position: relative;
	}
	input{
		width: 50%;
		height: 50px;
		display: black;
		margin: 15px auto;
		border-radius: 3px;
		font-size: 20px;
		text-align: left;
	}
	#closebox{
		position: absolute;
		top: 0px;
		right: 14px;
		font-size: 90px;
		transform: rotate(45deg);
		cursor: pointer;
	}
	label{
	width: 200px;
	color: #2f3640;
	margin-right: 10px;
	font-size: 20px;
	}
	.textarea{
		resize: none;
		height: 120px;
		width: 310px;
		font-size: 20px;
	}

	.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
	<div>
		<a href="#" id="button" class="button">
			<button id="fix">click</button>
	</a>
	</div>

	<div class="bg-modal" id="show">
		<div class="modal-content" id="show-content">
			<div class="close" id="closebox">+</div>

			<img src="倉儲1.png" >

			<form action="">
				<div>
					<label>名稱</label>
					<input type="text">
				</div>
				<div>
					<label>地點</label>
					<input type="text">
				</div>
				<div>
					<label>描述</label>
					<textarea class="textarea"></textarea>
				</div>
			</form>
		</div>
	</div>
</body>
<script>
document.getElementById('#fix').addEventListener('click',
	function(){
		document.querySelector('#show').style.display = 'flex';
});

document.querySelector('#closebox').addEventListener('click',
	function(){
		document.querySelector('#show').style.display = 'none'
});
</script>
</html>