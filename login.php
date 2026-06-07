<?php
session_start();
require_once 'backend/config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('Location: index.php');
            exit;
        }
    }

    $error = "Ongeldige gebruikersnaam of wachtwoord.";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="login-wrapper">
    <div class="login-card">

        <h2>Inloggen</h2>

        <?php if (!empty($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">

            <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-btn">
                Inloggen
            </button>

        </form>

    </div>
</div>
<div class="login-extra">
    <p>Nog niet ingelogd? Meld je aan!</p>
    <a href="<?php echo $base_url; ?>/registratie.php" class="register-btn">
        Registreren
    </a>
</div>
</body>
</html>