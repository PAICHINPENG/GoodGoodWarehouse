<?php
session_start();
unset($_SESSION['luseraccount']);
session_destroy();
header("location:LoginGoodGoodsPC.php");
?>
 