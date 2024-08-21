<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

function storeDirector($conn) {
    $Directorupdated = 0;

    $bpstmt = $conn->prepare("INSERT INTO Director(name,phone,address,salary,email,pass) VALUES(?,?,?,?,?,?)");

    // Declare and initialize variables
    $name = "";
    $phone = "";
    $location = "";
    $salary = "";
    $email = "";
    $username = "";

    // Bind parameters
    $bpstmt->bind_param("ssssss", $name, $phone, $location, $salary, $email, $username);

    $directors = array(
        array("Jana Sherif", "01082333657", "New Cairo", "10000", "janasherif@gmail.com", "jana"),
        array("Abdelrahman Tarek", "01082333658", "Mokattam", "15000", "atarek@gmail.com", "tarek"),
        array("Abdelrahman Amin", "01082333659", "Heliopolis", "15000", "aamin@gmail.com", "amin"),
        array("Belal Maged", "01082333650", "New Cairo", "20000", "belalmaged@gmail.com", "belal")
    );

    foreach ($directors as $director) {
        // Assign values to variables
        list($name, $phone, $location, $salary, $email, $username) = $director;
        // Execute prepared statement
        $bpstmt->execute();
        // Increment count of updated directors
        $Directorupdated += $conn->affected_rows;
    }

    return $Directorupdated;
}

$result = storeDirector($conn);

$conn->close();

echo "Directors stored: " . $result;
?>