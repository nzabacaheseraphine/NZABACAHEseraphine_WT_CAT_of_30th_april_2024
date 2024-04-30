<?php
$host="localhost";
$username="seraphine";
$password="222019160";
$database="mushroommanagementsystem";
$connection=new mysqli($host,$username,$password,$database);
if ($connection->connect_error) {
	die("Connection failed.".$connection->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username=$_POST['username'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$password=$_POST['password'];
	$created_date=$_POST['created_date'];
	$activation_code=$_POST['activation_code'];
	$sql="INSERT INTO users(username,phone,email,gender,password,created_date,activation_code) VALUES('$username','$phone','$email','$gender','$password','$created_date','$activation_code')";
	$result=$connection->query($sql);
	if ($result) {
		echo "Recording well";
		header("Location:login.html");
	}
	else{
		echo "Fail to record";
	}
}
$connection->close();

?>