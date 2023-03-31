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
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <?php if(isset($error)) { echo "<div class='error'>$error</div>"; } ?>
    <form method="POST" action="">
      <label>Email:</label>
      <input type="email" name="email">
      <br>
      <label>Password:</label>
      <input type="password" name="password">
      <br>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>
