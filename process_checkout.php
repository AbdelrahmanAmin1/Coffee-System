<?php
// Process checkout form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['paymentMethod'];
    $cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    $expiration = isset($_POST['expiration']) ? $_POST['expiration'] : '';
    $totalPrice = $_POST['totalPrice'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "CaffeineCanvas";
    
    $conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO `order` (name, phone, email, address, payment_method, card_number, cvv, expiration, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssd", $name, $phone, $email, $address, $paymentMethod, $cardNumber, $cvv, $expiration, $totalPrice);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Order placed successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
