<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "society";

$mysqli = new mysqli($servername, $username, $password, $dbname);
memory_limit = 1024M

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
