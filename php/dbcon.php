<?php
$servername = "localhost";
$username = "root";
$password = "autoset";
$dbname = "myDB";

//Create connection, new는 객체 
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
	die("connection failed: ".$conn->connect_error);
}
?>
