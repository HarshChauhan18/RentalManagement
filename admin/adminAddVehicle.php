<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Connect to the database
	include("./include/config.php");

	// Get the form data
	$name = $_POST["name"];
	$type = $_POST["type"];
	$about = $_POST["about"];
	$price = $_POST["price"];
	$image = $_FILES["image"]["name"];

	// Upload the image to the server
	$target_dir = "../assets/images/";
	$target_file = $target_dir . basename($image);
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

	// Insert the data into the database
	$sql = "INSERT INTO `vehicles`(`vehicle_name`, `vehicle_type`, `vehicle_about`, `vehicle_price`, `vehicle_image`) VALUES ('$name', '$type', '$about', '$price', '$image')";
	if ($conn->query($sql) === TRUE) {
		echo "Vehicle added successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the database connection
	$conn->close();

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Vehicle</title>
	<style>
		form {
			margin: 20px;
		}
		input, textarea, select {
			margin-bottom: 10px;
			display: block;
			width: 100%;
			font-size: 1.2rem;
			padding: 5px;
		}
		img {
			max-width: 400px;
		}
		button {
			background-color: #008CBA;
			color: white;
			border: none;
			padding: 10px;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>
</head>
<body>

	<h1>Add a Vehicle</h1>

	<form action="adminAdd.php" method="post" enctype="multipart/form-data">
		<label for="name">Vehicle Name:</label>
		<input type="text" name="name" id="name" required>

		<label for="type">Vehicle Type:</label>
		<select name="type" id="type" required>
			<option value="">-- Select a Type --</option>
			<option value="car">Car</option>
			<option value="premium_car">Premium Car</option>
			<option value="bike">Bike</option>
			<option value="taxi">Taxi</option>
		</select>

		<label for="about">About:</label>
		<textarea name="about" id="about" required></textarea>

		<label for="price">Price:</label>
		<input type="number" name="price" id="price" required>

		<label for="image">Image:</label>
		<input type="file" name="image" id="image" accept="image/*" required>

		<button type="submit">Add Vehicle</button>
	</form>

</body>
</html>
