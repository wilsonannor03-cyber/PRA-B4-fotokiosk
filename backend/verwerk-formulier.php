<?php

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];

    $sql = "INSERT INTO feedback (naam, email, bericht)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $naam, $email, $bericht);

    if ($stmt->execute()) {
        header("Location: ../formulier.php?success=1");
        exit;
    } else {
        echo "Er is iets misgegaan.";
    }

    $stmt->close();
    $conn->close();
}