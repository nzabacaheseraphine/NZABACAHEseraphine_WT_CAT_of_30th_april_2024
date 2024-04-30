<?php
session_start(); // Start the session

$host = "localhost";
$user = "seraphine";
$pass = "222019160";
$database = "mushroommanagementsystem";
$connection = new mysqli($host, $user, $pass, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'"; 
    $result=$connection->query($sql);
    if ($result->num_rows == 1) {
        $row=$result->fetch_assoc();
        echo "done";
        header("location:home.html");
        exit();
    }
else {
        echo "Username or password are incorrect";
    }
}

$connection->close();
?>
