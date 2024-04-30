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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL EMPLOYEE </h4>
    <a href="employee.html" class="btn btn-primary" style="margin-top: 0px;">New employee</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>employee_id</th>
                    <th>employee_name</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>salary</th>
                    <th>position</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "databaseconnection.php";
                $sql = "SELECT * FROM employee";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['employee_id']}</td>
                        <td>{$row['employee_name']}</td> 
                        <td>{$row['telephone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['salary']}</td>
                        <td>{$row['position']}</td>
                        <td>
                            <a href='editemployees.php?employee_id={$row['employee_id']} class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='deletesales.php?employee_id={$row['employee_id']} class='btn btn-danger btn-sm'>Delete</a>
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