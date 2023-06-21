<?php
include 'connection.php';
session_start();
if (isset($_POST['del'])) {
	$d = $_POST['del'];
	echo $d;
	
}
?>