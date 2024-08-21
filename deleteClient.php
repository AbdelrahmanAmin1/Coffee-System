<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "caffeinecanvas";

$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete'])) {
    foreach ($_POST['email'] as $x) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("DELETE FROM Customer WHERE email = ?");
        $stmt->bind_param("s", $x);
        
        // Execute the statement and handle errors
        if ($stmt->execute()) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Client</title>
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
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="container">
        <table border="1" width="50%">
            <?php
            $sql = "SELECT * FROM Customer";
            $result = mysqli_query($conn, $sql);
            $i = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($i == 1) { //print table header
                        echo "<tr>";
                        echo "<td> Select </td>";
                        foreach ($row as $key => $value)
                            echo "<td>".$key."</td>";
                        echo "</tr>";
                    }
                    if ($i % 2 == 1)
                        echo "<tr> ";
                    else
                        echo "<tr > ";
                    echo "<td> <input type='checkbox' name='email[]' value='".$row['email']."'></td>"; // Checkbox for selecting
                    foreach ($row as $key => $value) {
                        echo "<td>".$value."</td>"; // Display other fields
                    }
                    echo "</tr>";
                    $i++;
                }
                echo "</table>";
                echo "<input type='submit' class='btn' value='Delete' name='delete'>";
                echo "</form>";
            } else {
                echo "0 results";
            }
            ?>
    </div>
</body>
</html>
