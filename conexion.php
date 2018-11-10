<?php
$servername = getenv("MYSQL_SERVICE_HOST");
$db_port = getenv("MYSQL_SERVICE_PORT");
$username = "michelch";
$password = "michel123";
$database = "michelangelotrucking";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
