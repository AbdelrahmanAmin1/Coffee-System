<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate user input
$email = $_POST['Email'];
$phone_number = $_POST['PhoneNumber'];
$location_visited = $_POST['LocationVisited'];
$dine_in = $_POST['Dine'];
$day_visited = $_POST['DayVisited'];
$food_quality = $_POST['FoodQuality'];
$overall_service_quality = $_POST['OverallServiceQuality'];
$cleanliness = $_POST['Cleanliness'];
$order_accuracy = $_POST['OrderAccuracy'];
$speed_of_service = $_POST['SpeedOfService'];
$overall_experience = $_POST['OverallExperience'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO feedback (Email, PhoneNumber, LocationVisited, Dine, DayVisited, FoodQuality, OverallServiceQuality, Cleanliness, OrderAccuracy, SpeedOfService, OverallExperience) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("ssssdssssss", $email, $phone_number, $location_visited, $dine_in, $day_visited, $food_quality, $overall_service_quality, $cleanliness, $order_accuracy, $speed_of_service, $overall_experience);

// Execute the statement and handle errors
if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error submitting feedback: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>