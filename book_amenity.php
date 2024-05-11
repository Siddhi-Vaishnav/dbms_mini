<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amenity = $_POST["amenity"];
    $time = $_POST["time"];


    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "society"; 
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO amenities (name, schedule) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $amenity, $time);

    if ($stmt->execute()) {
        echo "Amenity booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
