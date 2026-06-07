<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "developerland";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Databaseverbinding mislukt: " . $conn->connect_error);
}
?>