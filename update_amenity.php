<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "society"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$amenity_id = $_POST['amenity_id'];
$amenity_name = $_POST['amenity_name'];
$description = $_POST['description'];

$sql = "UPDATE amenities SET name='$amenity_name', description='$description' WHERE amenity_id=$amenity_id";

if ($conn->query($sql) === TRUE) {
    echo "Amenity information updated successfully";
} else {
    echo "Error updating amenity information: " . $conn->error;
}

$conn->close();
?>
