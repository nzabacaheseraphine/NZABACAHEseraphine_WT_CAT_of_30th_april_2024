<?php
// Establish database connection
include "databaseconnection.php";

// Check if sales_id is set in the GET request
if (isset($_GET["sales_id"])) {
    // Assign the value to $sales_id
    $sales_id = $_GET["sales_id"];
    
    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM sales WHERE sales_id=$sales_id";

    // Execute the query
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:viewsales.php");
        exit;
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    // Handle case when sales_id is not set in the GET request
    echo "No sales_id provided";
}

// Close the database connection
$connection->close();
?>
