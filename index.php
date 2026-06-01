<!DOCTYPE html>
<html lang="nl">
<head>
    <?php require_once 'header.php'; ?>
    <title>Takenbord</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        $images = glob("images/*.jpg");

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
    <div class="pagination">

        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">←</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="?page=<?= $i ?>" 
            style="<?= $i == $page ? 'font-weight:bold;color:red;' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $pages): ?>
            <a href="?page=<?= $page + 1 ?>">→</a>
        <?php endif; ?>

    </div>
</body>
</html>