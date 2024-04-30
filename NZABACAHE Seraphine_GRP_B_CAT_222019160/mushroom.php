<?php
$host="localhost";
$username="seraphine";
$password="222019160";
$database="mushroommanagementsystem";
$connection=new mysqli($host,$username,$password,$database);
if ($connection->connect_error) {
	die("Connection failed.".$connection->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	$mushroom_name=$_POST['mushroom_name'];
	$description=$_POST['description'];
	$quantity=$_POST['quantity'];
	$unit_price=$_POST['unitprice'];
	$total_price=$_POST['totalprice'];
	$sql="INSERT INTO mushroom (mushroom_name,description,quantity,unit_price,total_price) VALUES ('$mushroom_name','$description','$quantity','$unit_price','$total_price')";
	$result=$connection->query($sql);
	if ($result) {
		echo "Recording well";
		header("Location:editmushrooms.php");
	}
	else{
		echo "Fail to record";
	}

$connection->close();

?>