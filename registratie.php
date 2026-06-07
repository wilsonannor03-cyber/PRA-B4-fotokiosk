<?php
session_start();
require_once 'backend/config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Gebruikersnaam bestaat al!";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            $success = "Account aangemaakt! Je kunt nu inloggen.";
        } else {
            $error = "Er is iets misgegaan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="login-wrapper">
    <div class="login-card">

        <h2>Registreren</h2>

        <?php if (!empty($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <p class="success-message"><?php echo $success; ?></p>
        <?php endif; ?>

        <form method="POST">

            <div class="form-group">
                <label>Gebruikersnaam</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="login-btn">
                Registreren
            </button>

        </form>

        <div class="login-extra">
            <p>Heb je al een account?</p>
            <a href="login.php" class="register-btn">Inloggen</a>
        </div>

    </div>
</div>

</body>
</html>