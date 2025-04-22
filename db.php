<?php
// Database connection settings
$host = "sql201.infinityfree.com";
$username = "if0_38786324";
$password = "inchristalone7G";
$database = "if0_38786324_crud_app";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
