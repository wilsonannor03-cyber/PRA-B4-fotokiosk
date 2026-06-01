<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Land - Bestellen</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Zorg dat dit naar jouw CSS-bestand verwijst -->
</head>
<body>

    <!-- Hier laden we jouw mooie blauwe header in -->
    <?php include 'header.php'; ?>

    <!-- De inhoud van het formulier -->
    <main class="form-container">
        <h2>Gegevens Invullen</h2>
        <p>Vul het onderstaande formulier in om je bestelling af te ronden.</p>

        <form action="backend/verwerk-formulier.php" method="POST" class="site-form">
            <div class="form-group">
                <label for="naam">Volledige naam:</label>
                <input type="text" id="naam" name="naam" placeholder="Bijv. Jan Janssen" required>
            </div>

            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" placeholder="jouw@email.com" required>
            </div>

            <div class="form-group">
                <label for="bericht">Opmerkingen (optioneel):</label>
                <textarea id="bericht" name="bericht" rows="4" placeholder="Typ hier je bericht..."></textarea>
            </div>

            <button type="submit" class="submit-btn">Verzenden</button>
        </form>
    </main>

</body>
</html>