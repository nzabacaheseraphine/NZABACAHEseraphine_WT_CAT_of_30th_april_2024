<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$customer_name=$_POST['customer_name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$sql="INSERT INTO customers (customer_name,phone,email,username,password,gender) VALUES('$customer_name','$phone','$email','$username','$password','$gender')";
	$result=$connection->query($sql);
	if ($result) {
		echo "all imformation recorded is done";
		//header("Location:login.html");
	}
	else{
		echo "Fail to record";
	}
}
$connection->close();

?>
