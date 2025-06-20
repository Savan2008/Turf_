<?php
$servername = "localhost";     // or use 127.0.0.1
$username = "root";            // default for XAMPP
$password = "";                // default for XAMPP is empty
$database = "box_booking";    // replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>