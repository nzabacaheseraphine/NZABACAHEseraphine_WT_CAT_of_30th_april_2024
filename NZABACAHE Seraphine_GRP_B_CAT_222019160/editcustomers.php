<?php
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['customer_id'])) {
        header("location:viewcustomer.php");
        exit;
    }
    $customer_id = $_GET['customer_id'];
    $sql = "SELECT * FROM customer WHERE customer_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customer_id = $row["customer_id"];
        $customer_name = $row["customer_name"];
        $phone = $row["phone"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
        $gender = $row["gender"];
    } else {
        header("location:viewcustomer.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["edit"])) {
        // Edit functionality
        $customer_id = $_POST["customer_id"];
        $customer_name = $_POST["customer_name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $gender = $_POST["gender"];
        if (empty($customer_name) || empty($phone) || empty($email) ||empty($username)empty($password)|| empty($gender)) {
            echo "All fields are required";
        } else {
            $sql = "UPDATE customer SET customer_name=?, email=?, phone=?, username= ? password= ? gender= ?WHERE customer_id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssdsi", $customer_name, $phone, $email, $username, $password,$gender, $customer_id);
            if ($stmt->execute()) {
                header("location:viewcustomer.php");
                exit();
            } else {
                echo "Error updating record: " . $connection->error;
            }
        }
    } elseif (isset($_POST["delete"])) {
        // Delete functionality
        $customer_id = $_POST["customer_id"];
        $sql = "DELETE FROM customer WHERE customer_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $customer_id);
        if ($stmt->execute()) {
            header("location:editcustomers.php");
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
    <title>customer</title>
    <script>
        function confirmUpdate(){
            return confirm('are you sure you want to update this row?');
        }
    </script>
</head>
<body>
    <center>
        <h1>Update customer Information</h1>
        <form method="POST" action="editcustomer.php" onsubmit= "confirmUpdate();">
            <label>customer-id:</label>
            <input type="text" id="customer_id" name="customer_id" readonly value="<?php echo $customer_id; ?>"><br><br>
            <label>customer_name:</label>
            <input type="text" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>"><br><br>

            <label>phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"><br><br>

            <label>email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

            <label>username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>"><br><br>

            <label>password:</label>
            <input type="text" id="password" name="password" value="<?php echo $password; ?>"><br><br>

            <label>gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>"><br><br>
            
            <!-- Edit and Delete buttons -->
            <input type="submit" name="edit" value="Update">
            <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this customer?');">
        </form>
    </center>
</body>
</html>
