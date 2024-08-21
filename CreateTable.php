<?php

/*
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE Customer (
    
    username varchar(50),
    pass varchar(50),
	email varchar(50) Primary Key

)";
if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>*/


$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="CREATE TABLE Barista (
    Id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(50),
    phone VARCHAR(11),
    address VARCHAR(100),
    salary VARCHAR(20),
    location VARCHAR(50))";

if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE Orders (\r\n"
. "    Order_ID INT AUTO_INCREMENT PRIMARY KEY,\r\n"
. "    TotalPrice double,\r\n"
. "    OrderDate TIMESTAMP,\r\n"
. "    Id_Barista INT,\r\n"
. "    CONSTRAINT fk_Id_Barista FOREIGN KEY (Id_Barista) REFERENCES Barista(Id))";

if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE Director (\r\n"
    
    .    " id INT AUTO_INCREMENT PRIMARY KEY,\r\n"
	.	 "  name varchar(50),\r\n"
	.    "  phone varchar(11),\r\n"
	.	 "  address varchar(100),\r\n"
	.	 "  salary varchar(20),\r\n"
	.	 "  password varchar(50) ,\r\n"
	.	 "  email varchar(50))";



if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE Products (\r\n"
    
. "    id INT AUTO_INCREMENT PRIMARY KEY , \r\n"
. "    name VARCHAR(50),\r\n"
. "    price double,\r\n"
. "    location varchar(50))";

if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE Reservation (\r\n"
    
. "    id INT AUTO_INCREMENT PRIMARY KEY , \r\n"
. "    CustomerName varchar(50),\r\n"
. "    phone varchar(11),\r\n"
. "    messages varchar(100),\r\n"
. "    Email_Customer varchar(50),\r\n"
. "    constraint fk_Email_Customer foreign key (Email_Customer) references Customer (email))";


if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CaffeineCanvas";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE TABLE Feedback (
    FeedbackID INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(50),
    PhoneNumber VARCHAR(11),
    LocationVisited VARCHAR(50),
    DineIn VARCHAR(20),
    DayVisited VARCHAR(50),
    FoodQuality VARCHAR(20),
    OverallServiceQuality VARCHAR(20),
    Cleanliness VARCHAR(20),
    OrderAccuracy VARCHAR(20),
    SpeedOfService VARCHAR(20),
    OverallExperience VARCHAR(20),
    CONSTRAINT fk_Email FOREIGN KEY (Email) REFERENCES Customer(email)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>