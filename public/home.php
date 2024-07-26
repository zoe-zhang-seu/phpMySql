<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
?>

<?php include 'sharedComponents/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

<main>
    <h1>Home Page</h1>

    <?php if (!isset($_SESSION['username'])): ?>
            <p>Welcome! If you don't have an account, please register:</p>
            <p><a href="manageAccount/register.php" class="link">Register</a></p>
            <p><a href="manageAccount/login.php" class="link">Login</a></p>
        <?php else: ?>
            <p class="welcome-message">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <?php endif; ?>
</main>

<?php include 'sharedComponents/footer.php'; ?>

</body>
</html>
