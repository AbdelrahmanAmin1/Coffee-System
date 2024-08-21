<?php
$host = "localhost"; // Your MySQL host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "caffeinecanvas"; // Your MySQL database name

// Create connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$email = $_POST["email"];
$token = bin2hex(random_bytes(16)); // convert to hex
$token_hash = hash("sha256", $token); // return a 64 character string
$expiry = date("Y-m-d H:i:s", time() + 60 * 30); // token expire time

// Assuming database.php contains your database connection logic
$mysqli = new mysqli("localhost", "username", "password", "caffeinecanvas");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "UPDATE Customer
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

$stmt->close();

echo "Password reset token generated and sent to email.";
?>
