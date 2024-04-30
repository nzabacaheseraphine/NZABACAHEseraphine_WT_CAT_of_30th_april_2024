<?php
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['harvest_id'])) {
        header("location:viewharvest.php");
        exit;
    }
    $harvest_id = $_GET['harvest_id'];
    $sql = "SELECT * FROM harvest WHERE harvest_id= ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $harvest_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $harvest_name = $row["harvest_name"];
        $quantity = $row["quantity"];
        $unit_price = $row["unit_price"];
        $total_price = $row["total_price"];
        $mushroom_id = $row["mushroom_id"];
    } else {
        header("location:viewharvest.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $harvest_id = $_POST["harvest_id"];
    $harvest_name = $_POST["harvest_name"];
    $quantity = $_POST["quantity"];
    $unit_price = $_POST["unit_price"];
    $total_price = $_POST["total_price"];
    $mushroom_id = $_POST["mushroom_id"];
    if (empty($harvest_name) || empty($quantity) || empty($unit_price) || empty($total_price) || empty($mushroom_id)) {
        echo "All fields are required";
    } else {
        $sql = "UPDATE harvest SET harvest_name=?, quantity=?, unit_price=?, total_price=?, mushroom_id=? WHERE harvest_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sddiii", $harvest_name, $quantity, $unit_price, $total_price, $mushroom_id, $harvest_id);
        if ($stmt->execute()) {
            echo "OK";
            header("location:viewharvest.php");
            exit();
        } else {
            echo "Error updating record" . $connection->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our harvest</title>
    <script>
        function confirmUpdate(){
            return confirm('are you sure you want to update this row?');
        }
    </script>
</head>
<body>
    <center>
<h1>Update here</h1>
<form method="POST" action="editharvest.php" onsubmit= "confirmUpdate();">
    <label>harvest_id:</label>
    <input type="text" id="harvest_id" name="harvest_id" readonly value="<?php echo $harvest_id; ?>"><br><br>
    <label>harvest_name:</label>
    <input type="text" id="harvest_name" name="harvest_name" value="<?php echo $harvest_name; ?>"><br><br>

    <label>quantity:</label>
    <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>"><br><br>

    <label>unit_price:</label>
    <input type="text" id="unit_price" name="unit_price" value="<?php echo $unit_price; ?>"><br><br>

    <label>total_price:</label>
    <input type="text" id="total_price" name="total_price" value="<?php echo $total_price; ?>"><br><br>

    <label>mushroom_id:</label>
    <input type="text" id="mushroom_id" name="mushroom_id" value="<?php echo $mushroom_id; ?>"><br><br>

    <input type="submit" name="submit" value="Update"><br><br>
</form>
</center>
</body>
</html>
