<?php
if (isset($_GET["mushroom_id"])) {
   $supply_id=$_GET["mushroom_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM mushroom WHERE mushroom_id=$mushroom_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewmushroom.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>