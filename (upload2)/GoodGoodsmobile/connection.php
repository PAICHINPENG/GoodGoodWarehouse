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
$conn = new PDO("mysql:host=localhost;dbname=$dbname",$dbusername.$dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/
?>