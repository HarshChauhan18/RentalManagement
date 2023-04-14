<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_id = $_POST["vehicle_id"];

    // Create connection
    $conn = mysqli_connect("localhost", "username", "password", "dbname");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete the selected vehicle from the database
    $sql = "DELETE FROM `vehicles` WHERE id = '$vehicle_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Vehicle deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
