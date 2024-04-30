<?php
if (isset($_GET["employee_id"])) {
   $supply_id=$_GET["employee_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM employee WHERE employee_id=$employee_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewemployee.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>