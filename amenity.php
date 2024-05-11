<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amenity = $_POST["amenity"];
    $time = $_POST["time"];

    $servername = "localhost";
    $username = "your_username"; 
    $password = ""; 
    $dbname = "your_database"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Bookings WHERE amenity = ? AND time_slot = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $amenity, $time);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Sorry, the selected amenity is not available at the specified time.";
    } else {
        $sql = "INSERT INTO Bookings (amenity, time_slot) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $amenity, $time);

        if ($stmt->execute()) {
            echo "Amenity booked successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
