<?php
$servername = "sql200.infinityfree.com";
$username = "if0_36985611"; // Your database username
$password = "pLfnNihm5lyQbK5"; // Your database password
$dbname = "if0_36985611_fishmart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
