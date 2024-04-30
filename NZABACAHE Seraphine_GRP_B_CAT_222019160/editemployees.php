<?php
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['employee_id'])) {
        header("location:viewemployee.php");
        exit;
    }
    $employee_id = $_GET['employee_id'];
    $sql = "SELECT * FROM employee WHERE employee_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $employee_name = $row["employee_name"];
        $telephone = $row["telephone"];
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
        $employee_id = $_POST["employee_id"];
        $employee_name = $_POST["employee_name"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $salary = $_POST["salary"];
        $position = $_POST["position"];
        if (empty($employee_name) || empty($email) || empty($salary) || empty($position)) {
            echo "All fields are required";
        } else {
            $sql = "UPDATE employee SET employee_name=?, email=?, salary=?, position=? WHERE employee_id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssdsi", $employee_name, $email, $salary, $position, $employee_id);
            if ($stmt->execute()) {
                header("location:viewemployee.php");
                exit();
            } else {
                echo "Error updating record: " . $connection->error;
            }
        }
    } elseif (isset($_POST["delete"])) {
        // Delete functionality
        $employee_id = $_POST["employee_id"];
        $sql = "DELETE FROM employee WHERE employee_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $employee_id);
        if ($stmt->execute()) {
            header("location:viewemployee.php");
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
    <title>Employee</title>
    <script>
        function confirmUpdate(){
            return confirm('are you sure you want to update this row?');
        }
    </script>
</head>
<body>
    <center>
        <h1>Update Employee Information</h1>
        <form method="POST" action="editemployee.php" onsubmit= "confirmUpdate();">
            <label>Employee ID:</label>
            <input type="text" id="employee_id" name="employee_id" readonly value="<?php echo $employee_id; ?>"><br><br>
            <label>Employee Name:</label>
            <input type="text" id="employee_name" name="employee_name" value="<?php echo $employee_name; ?>"><br><br>

            <label>Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

            <label>Salary:</label>
            <input type="text" id="salary" name="salary" value="<?php echo $salary; ?>"><br><br>

            <label>Position:</label>
            <input type="text" id="position" name="position" value="<?php echo $position; ?>"><br><br>
            
            <!-- Edit and Delete buttons -->
            <input type="submit" name="edit" value="Update">
            <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this employee?');">
        </form>
    </center>
</body>
</html>
