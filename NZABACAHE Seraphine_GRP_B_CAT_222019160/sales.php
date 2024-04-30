<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sales_name=$_POST['sales_name'];
	$quantity=$_POST['quantity'];
	$total_price=$_POST['total_price'];
	$mushroom_id=$_POST['mushroom_id'];
	$customer_id=$_POST['customer_id'];
	$sql="INSERT INTO sales (sales_name,quantity,total_price,mushroom_id,customer_id) VALUES('$sales_name','$quantity','$total_price','$mushroom_id','$customer_id')";
	$result=$connection->query($sql);
	if ($result) {
		echo "recorded well done";
		header("Location:sales.php");
	}
	else{
		echo "Fail to record";
	}
}
$connection->close();

?>
