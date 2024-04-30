<?php
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['mushroom_id'])) {
        header("location:viewmushroom.php");
        exit;
    }
    $mushroom_id = $_GET['mushroom_id'];
    $sql = "SELECT * FROM mushroom WHERE mushroom_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $mushroom_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mushroom_name = $row["mushroom_name"];
        $description = $row["description"];
        $quantity = $row["quantity"];
        $unit_price = $row["unit_price"];
        $total_price = $row["total_price"];
    } else {
        header("location:viewmushroom.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["edit"])) {
        // Edit functionality
        $mushroom_id = $_POST["mushroom_id"];
        $mushroom_name = $_POST["mushroom_name"];
        $quantity = $_POST["quantity"];
        $unit_price = $_POST["unit_price"];
        $total_price = $_POST["total_price"];
        if (empty($mushroom_name) || empty($quantity) || empty($unit_price) || empty($total_price)) {
            echo "All fields are required";
        } else {
            $sql = "UPDATE mushroom SET mushroom_name=?, quantity=?, unit_price=?, total_price=? WHERE mushroom_id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssdsi", $mushroom_name, $quantity, $unit_price, $total_price);
            if ($stmt->execute()) {
                header("location:viewmushroom.php");
                exit();
            } else {
                echo "Error updating record: " . $connection->error;
            }
        }
    } elseif (isset($_POST["delete"])) {
        // Delete functionality
        $mushroom_id = $_POST["mushroom_id"];
        $sql = "DELETE FROM mushroom WHERE mushroom_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $mushroom_id);
        if ($stmt->execute()) {
            header("location:viewmushroom.php");
            exit();
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our mushroom</title>
</head>
<body>
        <h1>mushroom Form</h1>
<form  action="mushroom.php" method="POST">
<label for="mushroom_name">mushroom_name:</label>
<input type="text" id="mushroom_name" name="mushroom_name" required><br><br>

<label for="description">description:</label>
<input type="text" id="description " name="description" required><br><br>

<label for="quantity">quantity:</label>
<input type="text" id="quantity" name="quantity" required><br><br>

<label for="unit_price">unitprice:</label>
<input type="text" id="unitp_rice" name="unit_price" required><br><br>

<label for="total_price">totalprice:</label>
<input type="text" id="total_price" name="total_price" required><br><br>

<input type="submit" name="add" value="Insert"><br><br>

<a href="./home.html">Go Back to Home</a>

</form>
</body>
</html>
