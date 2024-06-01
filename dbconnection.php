<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "furni_flex";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Colombo');
?>
