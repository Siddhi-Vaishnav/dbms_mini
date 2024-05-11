<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];  
    $contact = $_POST["contact"];
    $unit = $_POST["unit"];
    $vehicle = $_POST["vehicle"];
    $password = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "society"; 

   if (!preg_match("/^[A-Z]{2}\d{2}[A-Z]{1,2}\d{4}$/", $vehicle)) {
        echo "Error: Invalid vehicle format. Please enter a valid vehicle number.";
     exit();
}

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO residents (name, email, contact_details, unit_number, vehicle_info, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
     

    $stmt->bind_param("ssssss", $name, $email, $contact, $unit, $vehicle, $password); 

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: Unable to execute statement. Please try again later.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: submit_resident.php");
    exit();
}
?>
