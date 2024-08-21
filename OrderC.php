<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE `order` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `address` TEXT NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    `card_number` VARCHAR(20),
    `cvv` VARCHAR(4),
    `expiration` VARCHAR(7),
    `total_price` DECIMAL(10, 2) NOT NULL,
    `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>