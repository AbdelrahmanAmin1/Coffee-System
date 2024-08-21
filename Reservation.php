<?php
// Add this line at the beginning of your PHP script to check if it's being executed
echo "PHP script is executed!";

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
$customer_name = $_POST['CustomerName'];
$customer_seats = isset($_POST['CustomerSeats']) ? $_POST['CustomerSeats'] : ''; // Initialize to empty string if not set
$user_message = $_POST['UserMessages'];
$email_customer = $_POST['EmailCustomer'];

// Check if the email address exists in the customer table
$email_check_query = "SELECT email FROM customer WHERE email = ?";
$stmt_check_email = $conn->prepare($email_check_query);
$stmt_check_email->bind_param("s", $email_customer);
$stmt_check_email->execute();
$result_email = $stmt_check_email->get_result();

if ($result_email->num_rows === 0) {
    // Email address doesn't exist, insert it into the customer table
    $insert_customer_query = "INSERT INTO customer (email) VALUES (?)";
    $stmt_insert_customer = $conn->prepare($insert_customer_query);
    $stmt_insert_customer->bind_param("s", $email_customer);
    $stmt_insert_customer->execute();
}

// Prepare and bind the SQL statement for inserting into the reservation table
$stmt = $conn->prepare("INSERT INTO reservation (CustomerName, CustomerSeats, UserMessages, EmailCustomer) VALUES (?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("ssss", $customer_name, $customer_seats, $user_message, $email_customer);

// Execute the statement and handle errors
if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error submitting feedback: " . $stmt->error;
}

// Close the statements and the connection
$stmt->close();
$stmt_check_email->close();

// Close the $stmt_insert_customer only if it's initialized
if (isset($stmt_insert_customer)) {
    $stmt_insert_customer->close();
}
$conn->close();
?>
