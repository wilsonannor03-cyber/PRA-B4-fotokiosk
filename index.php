<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'header.php'; ?>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main class="main-homepage">
    <h1 class="welcome-title">WELKOM</h1>
    <p class="welcome-text">Check onze fotogalerij!</p>

    <button class="btn-fotogalerij"
            onclick="window.location.href='fotogalerij.php'">
        Fotogalerij
    </button>
</main>
</body>
</html>