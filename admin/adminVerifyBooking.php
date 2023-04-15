<?php
// Create connection
$conn = mysqli_connect("localhost", "username", "password", "dbname");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve all pending booking requests from the database
$sql = "SELECT * FROM `bookings` WHERE status = 'pending'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display a table with the booking requests
    echo "<table>";
    echo "<tr><th>Booking ID</th><th>Customer Name</th><th>Vehicle</th><th>Start Date</th><th>End Date</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["customer_name"] . "</td>";
        echo "<td>" . $row["vehicle"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td><a href='approve_booking.php?id=" . $row["id"] . "'>Approve</a> | <a href='reject_booking.php?id=" . $row["id"] . "'>Reject</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No pending booking requests";
}

mysqli_close($conn);
?>
