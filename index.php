<!DOCTYPE html>
<html lang="nl">
<head>
    <?php require_once 'header.php'; ?>
    <title>Takenbord</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php

    $images = [];

    $folders = glob("fotos/fotos/*", GLOB_ONLYDIR);

    foreach ($folders as $folder) {
        $imgs = glob($folder . "/*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE);
        $images = array_merge($images, $imgs);
    }

    $perPage = 30;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;

    $total = count($images);
    $pages = ceil($total / $perPage);

    $start = ($page - 1) * $perPage;
    $imagesPage = array_slice($images, $start, $perPage);
    ?>

    <div class="grid">
        <?php foreach ($imagesPage as $img): ?>
            <img src="<?= $img ?>">
        <?php endforeach; ?>
    </div>
    ]
    <div class="pagination">

        <?php
            $range = 2; 

            if ($page > 1) {
                echo "<a href='?page=" . ($page - 1) . "'>←</a> ";
            }

            echo "<a href='?page=1'>1</a> ";

            if ($page - $range > 2) {
                echo "... ";
            }

            for ($i = max(2, $page - $range); $i <= min($pages - 1, $page + $range); $i++) {
                if ($i == $page) {
                    echo "<a style='font-weight:bold;color:red;' href='?page=$i'>$i</a> ";
                } else {
                    echo "<a href='?page=$i'>$i</a> ";
                }
            }

            if ($page + $range < $pages - 1) {
                echo "... ";
            }

            if ($pages > 1) {
                echo "<a href='?page=$pages'>$pages</a> ";
            }

            if ($page < $pages) {
                echo "<a href='?page=" . ($page + 1) . "'>→</a>";
            }
        ?>

    </div>

</body>
</html>