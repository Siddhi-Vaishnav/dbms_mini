<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <h1>User Information</h1>
    <?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "society"; 
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $resident_id = $_POST['resident_id']; 
    $sql = "SELECT * FROM residents WHERE resident_id = $resident_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Resident ID: " . $row["resident_id"] . "</p>";
            echo "<p>Name: " . $row["name"] . "</p>";
            echo "<p>Contact Details: " . $row["contact_details"] . "</p>";
            echo "<p>Unit Number: " . $row["unit_number"] . "</p>";
            echo "<p>Vehicle Info: " . $row["vehicle_info"] . "</p>";
        }
    } else {
        echo "No user found with the provided Resident ID.";
    }
    $conn->close();
    ?>
</body>
</html>
