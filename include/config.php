<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "rentalmanagement";

// Connect to database
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>