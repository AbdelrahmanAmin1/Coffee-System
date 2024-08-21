<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert Barista</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

:root {
    --main-color: #443;
    --border-radius: 95% 4% 97% 5% / 4% 94% 3% 95%;
    --border-radius-hover: 4% 95% 6% 95% / 95% 4% 92% 5%;
    --border: .2rem solid var(--main-color);
    --border-hover: .2rem dashed var(--main-color);
}
.btn {
    display: inline-block;
    padding: .9rem 1.5rem;
    border: var(--border);
    border-radius: var(--border-radius);
    color: var(--main-color);
    background: none;
    cursor: pointer;
    margin-top: 0.5rem;
    font-size: 1rem;
}

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
}

html {
    font-size: larger;
}

body {
    background-image: url(./image/book-bg.jpg);
}

.container {
    display: flex;
    justify-content: center;
    flex-direction: column; /* Added to stack items vertically */
    align-items: center;
    margin-top: 50px; /* Added for spacing */
}

.input-group {
    margin-bottom: 20px; /* Added for spacing between inputs */
    
}
label {
    font-size: larger;
    font-weight: 900px;
}
input[type="text"], select {

            font-size: 1.2rem; /* Adjust the font size of input fields */
            padding: 8px; /* Add padding to input fields */
            width: 300px; /* Adjust the width of input fields */
            border-radius: 5px; /* Add some border radius */
            border: 4px solid #ccc; /* Add border */
            margin-bottom: 10px; /* Add some spacing between elements */
        }
       
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "caffeinecanvas";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO barista (name, phone, address, salary, location) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone, $address, $salary, $location);

    // Execute the statement and handle errors
    if ($stmt->execute()) {
        echo "New record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
  <a href="./admin.php" id="back" class="btn">Back</a>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="input-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="input-group">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" required>
            </div>
            <div class="input-group">
                <label for="location">Location:</label>
                <select id="location" name="location" required>
                    <option value="">Please Select</option>
                    <option value="New Cairo">New Cairo</option>
                    <option value="New York">New York</option>
                    <option value="Los Angeles">Los Angeles</option>
                </select>
            </div>
            <input type="submit" class="btn" value="Insert" name="insert">
        </div>
    </form>
</body>
</html>
