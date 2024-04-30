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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL SALES OF MUSHROOM </h4>
        <a href="sales.html" class="btn btn-primary" style="margin-top: 0px;">New sales</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>sales_id</th>
                    <th>sales_name</th>
                    <th>quantity</th>
                    <th>total_price</th>
                    <th>mushroom_id</th>
                    <th>customer_id</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "databaseconnection.php";
                $sql = "SELECT * FROM sales";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['sales_id']}</td>
                        <td>{$row['sales_name']}</td> 
                        <td>{$row['quantity']}</td>
                        <td>{$row['total_price']}</td>
                        <td>{$row['mushroom_id']}</td>
                        <td>{$row['customer_id']}</td>
                        <td>
                            <a href='updatesales.php?sales_id={$row['sales_id']} class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='deletesales.php?sales_id={$row['sales_id']} class='btn btn-danger btn-sm'>Delete</a>
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
