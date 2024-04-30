<?php
$host="localhost";
$username="seraphine";
$password="222019160";
$database="mushroommanagementsystem";
$connection=new mysqli($host,$username,$password,$database);
if ($connection->connect_error) {
	die("Connection failed.".$connection->connect_error);
}

?>