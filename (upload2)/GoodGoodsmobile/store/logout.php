<?php
session_start();

session_destroy();
echo "<script> window.confrim('確定要離開我們嗎')</script>";
unset($_SESSION['luseraccount']);
header("location:../loginGoodGoods.php");
?>
