<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
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
        }

        table {
        margin-top: 40px;
       }

    </style>
</head>
<body>

    <a href="./admin.php" id="back" class="btn">Back</a>
  </div>
    <div class="container">
<table border="5" width="50%">
    <?php
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "caffeinecanvas";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM reservation"; // Changed to select from Customer table
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output table header
        echo "<tr><th>Client Name</th><th>Number of Seats</th><th>Addtional Info</th><th>Email</th></tr>";

        // Output data rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["CustomerName"] . "</td>"; // Changed to match the field in the Customer table
            echo "<td>" . $row["CustomerSeats"] . "</td>"; // Changed to match the field in the Customer table
            echo "<td>" . $row["UserMessages"] . "</td>"; // Changed to match the field in the Customer table
            echo "<td>" . $row["EmailCustomer"] . "</td>"; // Changed to match the field in the Customer table
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>0 results</td></tr>";
    }

    // Close connection
    $conn->close();
    
    ?>
</table>
</div>
</body>
</html>
