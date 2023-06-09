<?php
// Start session
session_start();

// Database connection variables
include("./include/config.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get email and password from form
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Query database for email and password
    $sql = "SELECT * FROM `admin_details` WHERE admin_email='$email' AND admin_password='$pass'";
    $result = mysqli_query($conn, $sql);

    // Check if query returned any results
    if (mysqli_num_rows($result) == 1) {
        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;

        // Redirect to index.php
        header('Location: adminAdd.php');
        exit;
    } else {
        // Invalid login credentials
        echo "Invalid email or password";
    }
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/login.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Sign In</div>
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button submit">
          <input type="submit" value="Sign in" name="submit">
        </div>
      </form>
	  <!-- <img src="./assets/images/people-traveling.jpg" alt="Illustration"> -->
    </div>
  </div>

</body>
</html>
