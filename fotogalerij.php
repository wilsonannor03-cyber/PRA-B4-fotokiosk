<?php
session_start();

if (isset($_POST['add_to_cart'])) {

    $foto = $_POST['foto'];

    if (!isset($_SESSION['winkelwagen'])) {
        $_SESSION['winkelwagen'] = [];
    }

    if (!in_array($foto, $_SESSION['winkelwagen'])) {
        $_SESSION['winkelwagen'][] = $foto;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php require_once 'header.php'; ?>
    <title>Fotogalerij</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php
    $filterDag = isset($_GET['filter_dag']) ? $_GET['filter_dag'] : '';

    $images = [];

    $folders = glob("fotos/fotos/*", GLOB_ONLYDIR);

    foreach ($folders as $folder) {
        $folderName = basename($folder);

        if ($filterDag !== '') {
            if (strpos($folderName, $filterDag . '_') !== 0) {
                continue;
            }
        }

        $imgs = glob($folder . "/*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE);
        $images = array_merge($images, $imgs);
    }

    $perPage = 30;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    if ($page < 1) {
        $page = 1;
    }

    $total = count($images);
    $pages = ceil($total / $perPage);

    $start = ($page - 1) * $perPage;
    $imagesPage = array_slice($images, $start, $perPage);

    $filterParam = $filterDag !== '' ? "&filter_dag=" . $filterDag : '';
    ?>

    <div style="display:flex;justify-content:flex-end;padding:10px 0;margin-bottom:15px;">
        <form method="GET">
            <label for="filter_dag" style="margin-right:8px;font-weight:bold;">
                Filter op dag:
            </label>

            <select
                name="filter_dag"
                id="filter_dag"
                onchange="this.form.submit()"
                style="padding:6px;border-radius:4px;cursor:pointer;">

                <option value="">-- Alle dagen --</option>
                <option value="1" <?= $filterDag === '1' ? 'selected' : '' ?>>Maandag</option>
                <option value="2" <?= $filterDag === '2' ? 'selected' : '' ?>>Dinsdag</option>
                <option value="3" <?= $filterDag === '3' ? 'selected' : '' ?>>Woensdag</option>
                <option value="4" <?= $filterDag === '4' ? 'selected' : '' ?>>Donderdag</option>
                <option value="5" <?= $filterDag === '5' ? 'selected' : '' ?>>Vrijdag</option>
                <option value="6" <?= $filterDag === '6' ? 'selected' : '' ?>>Zaterdag</option>
                <option value="0" <?= $filterDag === '0' ? 'selected' : '' ?>>Zondag</option>
            </select>
        </form>
    </div>

    <div class="grid">

        <?php foreach ($imagesPage as $img): ?>

            <div class="photo-card">

                <img
                    src="<?= htmlspecialchars($img) ?>"
                    alt="Foto">

                <div class="photo-overlay">

                    <form method="post">

                        <input
                            type="hidden"
                            name="foto"
                            value="<?= htmlspecialchars($img) ?>">

                        <button
                            type="submit"
                            name="add_to_cart"
                            class="cart-btn">

                            Toevoegen aan winkelwagen

                        </button>

                    </form>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <div class="pagination">
        <?php

        $range = 2;

        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . $filterParam . "'>←</a> ";
        }

        echo "<a href='?page=1" . $filterParam . "'>1</a> ";

        if ($page - $range > 2) {
            echo "... ";
        }

        for ($i = max(2, $page - $range); $i <= min($pages - 1, $page + $range); $i++) {

            if ($i == $page) {
                echo "<a style='font-weight:bold;color:red;' href='?page=$i" . $filterParam . "'>$i</a> ";
            } else {
                echo "<a href='?page=$i" . $filterParam . "'>$i</a> ";
            }
        }

        if ($page + $range < $pages - 1) {
            echo "... ";
        }

        if ($pages > 1) {
            echo "<a href='?page=$pages" . $filterParam . "'>$pages</a> ";
        }

        if ($page < $pages) {
            echo "<a href='?page=" . ($page + 1) . $filterParam . "'>→</a>";
        }

        ?>
    </div>

</body>
</html>