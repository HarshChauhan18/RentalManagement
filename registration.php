<?php
// start session
session_start();

// check if user is already logged in
if(isset($_SESSION['email'])) {
  header("Location: index.php"); // redirect to home page
}

// check if login form is submitted
if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // validate inputs (you can add more validation if needed)
  if(empty($email) || empty($password)) {
    $error = "Please fill all fields.";
  }
  else {
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

    // select user from database
    $sql = "SELECT * FROM customer_details WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // verify password
    if(password_verify($password, $row['password'])) {
      // set session variables
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $row['name'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['address'] = $row['address'];
      $_SESSION['pincode'] = $row['pincode'];

      // redirect to home page
      header("Location: index.php");
    }
    else {
      $error = "Invalid email or password.";
    }

    mysqli_close($conn);
  }
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="./assets/css/registration.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Sign Up</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your Number" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button submit">
          <input type="submit" value="Register" name="submit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
