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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL HARVEST </h4>
        <a href="harvest.html" class="btn btn-primary" style="margin-top: 0px;">New harvest</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>harvest_id</th>
                    <th>harvest_name</th>
                    <th>quantity</th>
                    <th>unit_price</th>
                    <th>total price</th>
                    <th>mushroom_id</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "databaseconnection.php";
                $sql = "SELECT * FROM harvest";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['harvest_id']}</td>
                        <td>{$row['harvest_name']}</td> 
                        <td>{$row['quantity']}</td>
                        <td>{$row['unit_price']}</td>
                        <td>{$row['total_price']}</td>
                        <td>{$row['mushroom_id']}</td>
                        <td>
                            <a href='editharvest.php?harvest_id={$row['harvest_id']} class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='deleteharvest.php?harvest_id={$row['harvest_id']} class='btn btn-danger btn-sm'>Delete</a>
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