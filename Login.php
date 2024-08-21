<?php
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$servername = "localhost";
$username = "root";
$password = "";
$db = "caffeinecanvas";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SignIn'])) { 
    $email = htmlspecialchars($_POST["email"]); // Sanitize email
    $pass = htmlspecialchars($_POST["password"]); // Sanitize password
    
    // Query to check if the provided credentials match any user
    $sql = "SELECT * FROM Customer WHERE email='$email' AND pass='$pass'";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM Director WHERE email='$email' AND pass='$pass'";
    $result1 = $conn->query($sql1);

    if ($result->num_rows > 0 ) {
        echo "Login successful";
        header("Location: LocationOut.html"); // Redirect 
        exit();
    } 
   else if ( $result1->num_rows > 0) {
    echo "Welcome Admin";
    header("Location:admin.php"); // Redirect 
    exit();
   }
   else 
  { echo "Invalid email or password";}
} 
?>
