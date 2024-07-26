<?php
ob_start();
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use MyProject\Controller\LoginController;

$controller = new LoginController();
$error = $controller->handleLogin();

if (isset($_SESSION['username'])) {
    header('Location: ../staffDetail.php');
    exit();
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form action="" method="post">
        <h1>Login</h1>
        <?php if (!empty($error)): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
        <p><a href="register.php">Register</a></p>
        <p><a href="../home.php">Back to Home</a></p>
    </form>
</body>
</html>
