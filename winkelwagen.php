<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelpagina - Developer Land</title>
    <!-- Zorg dat dit pad exact naar je CSS-bestand verwijst -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- Blauwe Site Header -->
    <header class="site-header">
        <div class="header-container">
            <div class="page-title">
                <!-- Mocht je logo in de hoofdmap staan, haal dan 'img/' hieronder weg -->
                <img src="img/logo.png" alt="Developer Land Logo" class="site-logo">
            </div>
            <a href="winkelwagen.php" class="cart-emoji">🛒</a>
        </div>
    </header>

    <!-- Hoofdcontainer van de bestelpagina -->
    <div class="order-page-body">
        <div class="order-container">
            
            <!-- Header binnen het bestelblok -->
            <div class="order-header">
                <h2>bestelpagina</h2>
                <a href="index.php" class="order-home-icon">🏠</a>
            </div>

            <!-- Inhoud verdeeld in twee kolommen -->
            <div class="order-content">
                
                <!-- Linkerkolom: Besteloverzicht -->
                <div class="order-left-column">
                    <div class="order-section-title">Jouw bestelling</div>
                    
                    <div class="order-price-row">
                        <span class="order-label">Totaal artikelen (1)</span>
                        <span class="order-price">25,00</span>
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
                        <span class="order-price">25,00</span>
                    </div>

                    <div class="order-terms">
                        <label>
                            <input type="checkbox" id="voorwaarden"> 
                            Ja, ik ga akkoord met betaalvoorwaarden
                        </label>
                    </div>

                    <button class="order-finish-btn">Bestellen afronden</button>
                </div>

                <!-- Rechterkolom: Betaalmethoden -->
                <div class="order-right-column">
                    <div class="order-payment-methods">
                        <label class="order-radio-label">
                            <input type="radio" name="payment" value="ideal"> iDEAL
                        </label>
                        <label class="order-radio-label">
                            <input type="radio" name="payment" value="paypal"> Paypal
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
