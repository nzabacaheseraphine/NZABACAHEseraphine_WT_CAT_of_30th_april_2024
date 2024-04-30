<?php
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['employee_id'])) {
        header("location:viewsales.php");
        exit;
    }
    $sales_id = $_GET['sales_id'];
    $sql = "SELECT * FROM sales WHERE sales_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $sales_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sales_name = $row["sales_name"];
        $quantity = $row["quantity"];
        $email = $row["email"];
        $salary = $row["salary"];
        $position = $row["position"];
    } else {
        header("location:viewemployee.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["edit"])) {
        // Edit functionality
        $sales_id = $_POST["sales_id"];
        $sales_name = $_POST["sales_name"];
        $quantity = $_POST["quantity"];
        $total_price = $_POST["total_price"];
        $mushroom_id = $_POST["mushroom_id"];
        $customer_id = $_POST["customer_id"];
        if (empty($sales_name) || empty($quantity)  ||empty($total_price) || empty($mushroom_id) || empty($customer_id)) {
            echo "All fields are required";
        } else {
            $sql = "UPDATE sales SET sales_name=?,quantity=?,total_price=?, mushroom_id=?, customer_id=? WHERE customer_id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssdsi", $sales_name, $quantity, $total_price, $mushroom_id, $customer_id);
            if ($stmt->execute()) {
                header("location:viewsales.php");
                exit();
            } else {
                echo "Error updating record: " . $connection->error;
            }
        }
    } elseif (isset($_POST["delete"])) {
        // Delete functionality
        $sales_id = $_POST["sales_id"];
        $sql = "DELETE FROM sales WHERE sales_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $sales_id);
        if ($stmt->execute()) {
            header("location:viewsales.php");
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
  <title>Our sales</title>
  <script>
        function confirmUpdate(){
            return confirm('are you sure you want to update this row?');
        }
    </script>
</head>
<body>
    <h1>sales Form</h1>
<form  action="sales.html" method="POST" onsubmit= "confirmUpdate();>
<label for="sales_name">sales_name:</label>
<input type="text" id="sales_name" name="sales_name" required><br><br>

<label for="quantity">quantity:</label>
<input type="text" id="quantity" name="quantity" required><br><br>

<label for="total_price">total_price:</label>
<input type="total_price" id="total_price" name="total_price" required><br><br>

<label for="mushroom_id">mushroom_id:</label>
<input type="text" id="mushroom_id" name="mushroom_id" required><br><br>

<label for="customer_id">customer_id:</label>
<input type="text" id="customer_id" name="customer_id" required><br><br>


<input type="submit" name="add" value="Insert"><br><br>

<a href="./home.html">Go Back to Home</a>

</form>
</body>
</html>
