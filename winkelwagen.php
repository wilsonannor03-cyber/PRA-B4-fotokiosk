<<?php
session_start();

$winkelwagen = $_SESSION['winkelwagen'] ?? [];
$aantalArtikelen = count($winkelwagen);

if (isset($_POST['remove_item'])) {

    $index = (int)$_POST['index'];

    if (isset($_SESSION['winkelwagen'][$index])) {
        unset($_SESSION['winkelwagen'][$index]);
        $_SESSION['winkelwagen'] = array_values($_SESSION['winkelwagen']);
    }
}

$bestellingAfgerond = false;

if (isset($_POST['bestellen_afronden'])) {

    $_SESSION['winkelwagen'] = [];
    $winkelwagen = [];
    $aantalArtikelen = 0;

    $bestellingAfgerond = true;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php require_once 'header.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelpagina - Developer Land</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="order-page-body">
    <div class="order-container">

        <div class="order-header">
            <h2>Bestelpagina</h2>
            <a href="index.php" class="order-home-icon">🏠</a>
        </div>

        <?php if ($bestellingAfgerond): ?>

            <h2 style="text-align:center; padding:60px;">
                🎉 Bestelling afgerond
            </h2>

        <?php else: ?>

        <div class="order-content">

            <div class="order-left-column">

                <div class="order-section-title">
                    Jouw bestelling
                </div>

                <div class="order-price-row">
                    <span class="order-label">
                        Totaal artikelen (<?= $aantalArtikelen ?>)
                    </span>
                    <span class="order-price">
                        <?= $aantalArtikelen ?>
                    </span>
                </div>

                <div class="order-price-row">
                    <span class="order-label">Korting</span>
                    <span class="order-price">0,00</span>
                </div>

                <div class="order-price-row">
                    <span class="order-label">Betaalkosten</span>
                    <span class="order-price">0,00</span>
                </div>

                <div class="order-price-row order-total-row">
                    <span class="order-label">Totaal</span>
                    <span class="order-price">
                        <?= $aantalArtikelen ?>
                    </span>
                </div>

                <div class="order-section-title" style="margin-top:20px;">
                    Geselecteerde foto's
                </div>

                <?php if ($aantalArtikelen > 0): ?>

                    <?php foreach ($winkelwagen as $index => $foto): ?>

                        <div style="margin-top:15px;">

                            <img
                                src="<?= htmlspecialchars($foto) ?>"
                                alt="Foto"
                                style="width:120px;height:120px;object-fit:cover;border:1px solid #ccc;border-radius:6px;">

                            <form method="post">

                                <input
                                    type="hidden"
                                    name="index"
                                    value="<?= $index ?>">

                                <button
                                    type="submit"
                                    name="remove_item"
                                    class="remove-btn">

                                    Verwijderen

                                </button>

                            </form>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p>Er zitten nog geen foto's in je winkelwagen.</p>

                <?php endif; ?>

                <div class="order-terms">
                    <label>
                        <input type="checkbox" id="voorwaarden">
                        Ja, ik ga akkoord met betaalvoorwaarden
                    </label>
                </div>

                <form method="post">
                    <button type="submit" name="bestellen_afronden" class="order-finish-btn">
                        Bestellen afronden
                    </button>
                </form>

            </div>

            <div class="order-right-column">
                <div class="order-payment-methods">

                    <label class="order-radio-label">
                        <input type="radio" name="payment" value="ideal">
                        iDEAL
                    </label>

                    <label class="order-radio-label">
                        <input type="radio" name="payment" value="paypal">
                        Paypal
                    </label>

                </div>
            </div>

        </div>

        <?php endif; ?>

    </div>
</div>

</body>
</html>