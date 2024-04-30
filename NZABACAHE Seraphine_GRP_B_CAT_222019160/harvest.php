<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$harvestName=$_POST['harvest_name'];
	$quantity=$_POST['quantity'];
	$unit_price=$_POST['unit_price'];
	$total_price=$_POST['total_price'];
	$mushroom_id=$_POST['mushroom_id'];
	$sql="INSERT INTO harvest (harvest_name,quantity,unit_price,total_price,mushroom_id) VALUES('$harvestName','$quantity','$unit_price','$total_price','$mushroom_id')";
	$result=$connection->query($sql);
	if ($result) 
		echo "all imformation recorded done";
	    header("Location:viewharvest.php");
	    exit();
	}
	else{
		echo "Fail to record";
	}

$connection->close();

?>
