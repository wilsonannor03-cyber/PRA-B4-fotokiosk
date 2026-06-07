<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php require_once __DIR__ . '/backend/config.php'; ?>
<?php require_once __DIR__ . '/backend/conn.php'; ?>

<header class="site-header">
    <div class="header-container">

    <img src="<?php echo $base_url; ?>/img/icon.png" width="25%" alt="Logo Developer Land">

    <nav class="header-nav">
        <a href="<?php echo $base_url; ?>/index.php" class="gallery-link">
            Home
        </a>

        <a href="<?php echo $base_url; ?>/fotogalerij.php" class="gallery-link">
            Fotogalerij
        </a>

        <a href="<?php echo $base_url; ?>/formulier.php" class="gallery-link">
            Feedback
        </a>

        <?php if (isset($_SESSION['username'])) : ?>

            <a href="<?php echo $base_url; ?>/logout.php" class="gallery-link">
                Uitloggen
            </a>
        <?php else : ?>
            <a href="<?php echo $base_url; ?>/login.php" class="gallery-link">
                Login
            </a>
        <?php endif; ?>
    </nav>

    <div class="shopping-cart">
        <a href="<?php echo $base_url; ?>/winkelwagen.php" class="cart-emoji">
            🛒
        </a>
    </div>

</div>
</header>