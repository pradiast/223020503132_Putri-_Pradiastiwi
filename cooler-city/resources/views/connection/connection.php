<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "coolercity";

$conn = new mysqli($server_name, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
