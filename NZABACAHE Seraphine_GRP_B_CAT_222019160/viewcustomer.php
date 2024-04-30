<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mushroom management system</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">MUSHROOM MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL KIND OF MUSHROOM </h4>
        <a href="customer.php" class="btn btn-primary" style="margin-top: 0px;">New customer</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>customer Id</th>
                    <th>customer_name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>username</th>
                    <th>password</th>
                    <th>gender</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "databaseconnection.php";
                $sql = "SELECT * FROM customers";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['customer_name']}</td> 
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['password']}</td>
                        <td>{$row['gender']}</td>
                        <td>
                            <a href='editcustomer.php?customer_id={$row['customer_id']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='deletecustomer.php?customer_id={$row['customer_id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
