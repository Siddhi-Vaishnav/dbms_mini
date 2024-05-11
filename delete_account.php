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

$sql = "DELETE FROM residents WHERE resident_id = $resident_id";

if ($conn->query($sql) === TRUE) {
    echo "Account deleted successfully";
} else {
    echo "Error deleting account: " . $conn->error;
}

$conn->close();
?>
