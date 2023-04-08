<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Connect to database
include("./include/config.php");

// Get user information from database
$email = $_SESSION['email'];

$sql = "SELECT * FROM `customer_details` WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $address = $row['address'];
    $pincode = $row['pincode'];
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    font-size: 32px;
    margin-top: 40px;
    margin-bottom: 20px;
    text-align: center;
}

p {
    margin-bottom: 10px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

a {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #000;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h1>User Profile</h1>
    <p>First Name: <?php echo $name; ?></p>
    <p>Phone Number: <?php echo $phone; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Address: <?php echo $address; ?></p>
    <p>Pincode: <?php echo $pincode; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
