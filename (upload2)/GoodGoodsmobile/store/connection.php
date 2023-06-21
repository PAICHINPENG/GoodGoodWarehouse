<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "goodgoods好好藏-1";

$con = new mysqli ($host,$user,$password,$db);
if ($con->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
/*
$conn = new PDO("mysql:host={$host};dbname={$db}",$user,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/
?>