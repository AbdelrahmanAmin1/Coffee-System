<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

function storeBarista($conn) {
    $Baristaupdated = 0;

    $bpstmt = $conn->prepare("INSERT INTO Barista(name,phone,address,salary,location) VALUES(?,?,?,?,?)");
 // Declare and initialize variables
 $name = "";
 $phone = "";
 $address = "";
 $salary = "";
 $location = "";
 // Bind parameters
    // Bind parameters
    $bpstmt->bind_param("sssss", $name, $phone, $address, $salary, $location);

    $Baristas = array(
        array("Abdelrahman Yasser", "01082333654", "Sheraton", "5000 LE", "New Cairo"),
        array("Abdullah Hany", "01082333655", "zayed", "5500 LE", "New Cairo"),
        array("Ahmed Amr", "01082333656", "Heliopolis", "6000 LE", "New Cairo"),
        array("Samantha Millerr", "5551234567", "Beverly Hills", "3000$", "Los Angeles"),
        array("Michael Johnson", "5559876543", "Sunset Boulevard", "3100$", "Los Angeles"),
        array("Emily Thompson", "5555551234", "Hollywood Boulevard", "3200$", "Los Angeles"),
        array("James Wilson", "42012345678", "Baker Street", "3100€", "London"),
        array("Olivia Taylor", "44 20 8765 432", "Coventry Street", "3200€", "London"),
        array("Benjamin Clarke", "42099998888", "Oxford Street", "3300€", "London")
    );

    foreach ($Baristas as $Barista) {
        list($name, $phone, $address, $salary, $location) = $Barista;
        $bpstmt->execute();
        $Baristaupdated += $bpstmt->affected_rows;
    }

    return $Baristaupdated;
}

$result = storeBarista($conn);

$conn->close();

echo "Baristas stored: " . $result;
?>
