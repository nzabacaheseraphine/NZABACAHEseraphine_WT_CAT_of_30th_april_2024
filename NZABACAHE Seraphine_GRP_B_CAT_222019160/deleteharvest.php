<?php
if (isset($_GET["harvest_id"])) {
    $harvest_id = $_GET["harvest_id"];

    // Include file that contains database connection
    include "databaseconnection.php";
    $sql = "DELETE FROM harvest WHERE harvest_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $harvest_id);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Record deleted successfully";
            // Redirect to viewharvest.php
            header("Location: viewharvest.php");
            exit;
        } else {
            echo "No records found with the given ID.";
        }
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $connection->close();
}
?>
