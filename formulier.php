<?php include 'header.php'; ?>
<?php if (isset($_GET['success'])) : ?>
    <p style="color: green;">Bedankt voor je feedback!</p>
<?php endif; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Land - Formulier</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
</head>
<body>

<main class="form-page-wrapper">
    <div class="form-card">
        <h2>Feedback</h2>

        <form action="backend/verwerk-formulier.php" method="POST" class="site-form">
            <div class="form-group">
                <label for="naam">Volledige naam:</label>
                <input type="text" id="naam" name="naam" required>
            </div>

            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="bericht">Feedback:</label>
                <textarea id="bericht" name="bericht" rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Verzenden</button>
        </form>
    </div>
</main>

</body>
</html>