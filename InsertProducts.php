<?php
$servername="localhost";
$username="root";
$password="";
$db = "CaffeineCanvas";

$conn= new mysqli($servername,$username,$password,$db);
if($conn->connect_error)
{
    die("connection failed: ".$conn->connect_error);
}
function storeProduct($conn) {
    $productsUpdated = 0;
    $productData = array(
        array("Caffeinated Canvas Signature Latte", 89.99, "New Cairo"),
        array("Decadent Mocha", 99.99, "New Cairo"),
        array("Classic Cappuccino", 80.00, "New Cairo"),
        array("Hot Chocolate", 120.0, "New Cairo"),
        array("Artisan Flat White", 110.00, "New Cairo"),
        array("Velvet Machiato", 100.00, "New Cairo"),
        array("Canvas Cookies", 49.99, "New Cairo"),
        array("Canvas Cupcakes", 59.99, "New Cairo"),
        array("Canvas Tarte", 119.99, "New Cairo"),
        array("Canvas Cheesecake", 120.00, "New Cairo"),
        array("Canvas Crepe", 109.99, "New Cairo"),
        array("Canvas Croissant", 49.99, "New Cairo"),
        array("Caffeinated Canvas Signature Latte", 10.99, "Los Angeles"),
        array("Decadent Mocha", 12.99, "Los Angeles"),
        array("Classic Cappuccino", 9.99, "Los Angeles"),
        array("Hot Chocolate", 14.99, "Los Angeles"),
        array("Artisan Flat White", 12.99, "Los Angeles"),
        array("Velvet Machiato", 10.99, "Los Angeles"),
        array("Canvas Cookies", 4.99, "Los Angeles"),
        array("Canvas Cupcakes", 7.99, "Los Angeles"),
        array("Canvas Tarte", 10.99, "Los Angeles"),
        array("Canvas Cheesecake", 12.99, "Los Angeles"),
        array("Canvas Crepe", 19.99, "Los Angeles"),
        array("Canvas Croissant", 10.99, "Los Angeles"),
        array("Caffeinated Canvas Signature Latte", 10.99, "London"),
        array("Decadent Mocha", 12.99, "London"),
        array("Classic Cappuccino", 9.99, "London"),
        array("Hot Chocolate", 14.99, "London"),
        array("Artisan Flat White", 12.99, "London"),
        array("Velvet Machiato", 10.99, "London"),
        array("Canvas Cookies", 4.99, "London"),
        array("Canvas Cupcakes", 7.99, "London"),
        array("Canvas Tarte", 10.99, "London"),
        array("Canvas Cheesecake", 12.99, "London"),
        array("Canvas Crepe", 19.99, "London"),
        array("Canvas Croissant", 10.99, "London")
    );

    foreach ($productData as $product) {
        $ppstmt = $conn->prepare("INSERT INTO Products (name, price, location) VALUES (?, ?, ?)");
        $ppstmt->bind_param("sds", $product[0], $product[1], $product[2]);
        $productsUpdated += $ppstmt->execute();
    }
    return $productsUpdated;
}
$result = storeProduct($conn);
echo "Products stored: " . $result;
?>
