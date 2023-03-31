<?php
if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];
  $password = $_POST['password'];
  
  // validate inputs (you can add more validation if needed)
  if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($pincode) || empty($password)) {
    echo "Please fill all fields.";
    exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit();
  }
  else if(!preg_match("/^[789][0-9]{9}$/", $phone)) {
    echo "Invalid phone number.";
    exit();
  }
  else if(!preg_match("/^[0-9]{6}$/", $pincode)) {
    echo "Invalid pincode.";
    exit();
  }
  
  // connect to database (replace values with your own)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "rentalmanagement";
  // create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // check connection
  if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }
  
  // check if email already exists in database
  $sql = "SELECT * FROM `customer_details` WHERE `email`='$email'";
  $result = mysqli_query($conn, $sql);
  // $resultCheck = mysqli_num_rows($result);
  
  if(mysqli_num_rows($result) === 1) {
  echo "Email already exists.";
  exit();
  }
  else{
    $sql = "INSERT INTO customer_details (name, email, password, phone, address, pincode) VALUES ('$name', '$email', '$password', '$phone', '$address', '$pincode')";
  
    if(mysqli_query($conn, $sql)) {
    echo "Registration successful.";
    }
    else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    }
  }
  
  // insert user data into database

  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register Here</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/login.css">
  </head>
  <body>
    <div class="container">
      <form action="login.php" method="POST">
        <h2>User Registration</h2>
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" pattern="[0-9]{10}" required>
        <label for="address">Address</label>
        <textarea name="address" rows="5" required></textarea>
        <label for="pincode">Pincode</label>
        <input type="text" name="pincode" pattern="[0-9]{6}" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <a href="registration.php" class="loginHere">Login Here</a>
        <input type="submit" name="submit" value="Register">
      </form>
    </div>
  </body>
</html>
