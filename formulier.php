<?php require_once __DIR__ . '/backend/config.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Land - Formulier</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css"> 
</head>
<body>

    <?php include 'header.php'; ?>

    <main class="form-page-wrapper">
        <div class="form-card">
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
                    <label for="bericht">Feedback:</label>
                    <textarea id="bericht" name="bericht" rows="4" placeholder="Typ hier je bericht..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Verzenden</button>
            </form>
        </div>
    </main>

</body>
</html>