<?php require_once __DIR__ . '/backend/config.php'; ?>
<?php require_once __DIR__ . '/backend/conn.php'; ?>

<header class="site-header">
    <div class="header-container">

        <div class="page-title">
            <a href="<?php echo $base_url; ?>/home.php">
                <img src="<?php echo $base_url; ?>/img/icon.png" width="50%" alt="Logo Developer Land">
            </a>
        </div>

        <nav class="header-nav">
            <a href="<?php echo $base_url; ?>/fotogalerij.php" class="gallery-link">
                Fotogalerij
            </a>
        </nav>

        <div class="shopping-cart">
            <a href="<?php echo $base_url; ?>/winkelwagen.php" class="cart-emoji">
                🛒
            </a>
        </div>

    </div>
</header>