<?php

$dbHost = 'localhost';
$dbName = 'fotokiosk';
$dbUser = 'root';
$dbPass = '';

$base_url = 'http://localhost/PRA-B4-fotokiosk';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Databaseverbinding mislukt: " . $conn->connect_error);
}