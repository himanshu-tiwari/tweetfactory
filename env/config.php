<?php

$server = "127.0.0.1";
$username = "root";
$password = "";
$db = "factory";

// Connecting to server
$conn = new mysqli($server, $username, $password, $db);

// Checking connection
if ($conn->connect_error) {
    die("No DB connection. Error: " . $conn->connect_error);
}

?>