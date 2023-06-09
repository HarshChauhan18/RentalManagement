<?php
// Initialize variables to store user inputs
session_start();
$name = "";
$phone = "";
$email = "";
$address = "";
$password = "";
$pincode = "";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve user inputs and sanitize them to prevent SQL injection and other attacks
  $name = test_input($_POST["name"]);
  $phone = test_input($_POST["phone"]);
  $email = test_input($_POST["email"]);
  $address = test_input($_POST["address"]);
  $pass = test_input($_POST["password"]);
  $pincode = test_input($_POST["pincode"]);

  // Validate user inputs
  $errors = array();
  if (empty($name)) {
    $errors["name"] = "Full name is required";
  }
  if (empty($phone)) {
    $errors["phone"] = "Phone number is required";
  }
  // You can add more validation rules for other fields

  // If there are no errors, insert the user inputs into the database
  if (count($errors) == 0) {
    // Replace the database credentials with your own
    include("./include/config.php");
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;
    $_SESSION['password'] = $pass;
    $_SESSION['pincode'] = $pincode;

    if (isset($_SESSION['email']) && $_SESSION['phone']) {
      $verify = "SELECT * FROM `customer_details` WHERE email = '$email' OR phone = '$phone'";
      $result = mysqli_query($conn, $verify);
      if (mysqli_num_rows($result) > 0) {
        // the email or number already exists in the database, so give an error message
        echo "Error: The email or number already exists in the database.";
      } else {
        header('Location: ./include/send_otp_mail.php');
        
        // Prepare a SQL statement to insert the user inputs into the database
        // $sql = "INSERT INTO `customer_details` (`name`, `phone`, `email`, `address`, `password`, `pincode`)
        //         VALUES ('". $name ."', '".$phone."', '".$email."', '".$address."', '".$pass."', '".$pincode."')";

        // Execute the SQL statement
        // if (mysqli_query($conn,$sql)) {
        //   header('Location: login.php');
        // } else {
        //   echo "Error: " . mysqli_error($conn);
        // }
      }
    }
  }
}

// Sanitize user inputs to prevent SQL injection and other attacks
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./assets/css/registration.css">
  <link rel="stylesheet" href="./assets/css/modal.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Sign Up</div>
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your Number" pattern="[6789][0-9]{9}" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Enter your Address" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Enter pincode</span>
            <input type="text" name="pincode" placeholder="Enter your pincode" pattern="[0-9]{6}" required>
          </div>
        </div>
        <!-- <div class="gender-details">
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
        </div> -->
        <?php $_SESSION['otp'] = rand(100000, 999999); ?>
        <div class="button submit">
          <input type="submit" value="Sign up" name="submit">
        </div>
      </form>
    </div>
  </div>
</body>

</html>