<?php
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['SignUp'])) {
    $user_name = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    registerCustomer($user_name, $email, $pass);
} else {
    echo "Please retry registration";
}

function registerCustomer($user_name, $email, $pass) {
    $servername = "Localhost";
    $username = "root";
    $password = "";
    $db = "caffeinecanvas";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_name = sanitize_input($user_name); // Sanitize username
    $email = sanitize_input($email); // Sanitize email
    $pass = sanitize_input($pass); // Sanitize password

    $sql = "INSERT INTO Customer (username, email, pass) VALUES ('$user_name', '$email', '$pass')";

    if (mysqli_query($conn, $sql)) {
        echo "Customer registered successfully";
        $redirect_url = "Login.html";
        header("Location: $redirect_url");
        exit();
    } else {
        echo "Error adding Customer: " . $conn->error;
    }

    $conn->close();
}

?>