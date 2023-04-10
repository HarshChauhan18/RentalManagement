<?php
session_start();
include_once('./config.php');
$otp = $_SESSION['otp'];
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$pincode = $_SESSION['pincode'];
$pass = $_SESSION['password'];
// echo $otp;
if (isset($_POST['verify'])) {
    $entered_otp = $_POST['e_otp'];
    // echo $entered_otp;
    if ($otp == $entered_otp) {
        $sql = "INSERT INTO `customer_details` (`name`, `phone`, `email`, `address`, `password`, `pincode`)
                VALUES ('" . $name . "', '" . $phone . "', '" . $email . "', '" . $address . "', '" . $pass . "', '" . $pincode . "')";
        if (mysqli_query($conn, $sql)) {
            session_destroy();
            header("Location: ../login.php");
        }
    } else {
        echo "Invalid";
    }
}

if(!isset($otp)){
    session_destroy();
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/modal.css">
</head>

<body>
    <div class="modal-container">
        <div class="modal">
            <h2>Verification</h2>
            <form method="POST">
                <div class="input-box">
                    <span class="details">Enter OTP</span>
                    <input type="text" name="e_otp" placeholder="Enter your OTP" pattern="[0-9]{6}" required>
                </div>
                <div class="btn"><button name="verify" class="verify-btn">Verify OTP</button></div>
            </form>
        </div>
    </div>
</body>

</html>