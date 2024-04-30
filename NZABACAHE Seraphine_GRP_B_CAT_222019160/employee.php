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
	$employee_name=$_POST['employee_name'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	$salary=$_POST['salary'];
	$position=$_POST['position'];
	$sql="INSERT INTO employee (employee_name,telephone,email,salary,position) VALUES('$employee_name','$telephone','$email','$salary','$position')";
	$result=$connection->query($sql);
	if ($result) {
		echo "Recording well";
		header("Location:viewemployee.php");
	}
	else{
		echo "Fail to record";
	}
}
$connection->close();

?>
