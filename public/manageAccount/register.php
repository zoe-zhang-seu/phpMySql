<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use MyProject\Controller\RegisterController;

$controller = new RegisterController();
$response = $controller->handleRegistration();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>

    <main>
        <h1>Register</h1>
<!-- show wether successfully registered an account -->
        <?php if (!empty($response['success'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($response['success']); ?></p>
        <?php endif; ?>

        <?php if (!empty($response['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($response['error']); ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Register</button>
        <p><a href="login.php">Login</a></p>
        <p><a href="../home.php">Back to Home</a></p>
 
        </form>
    </main>

    <?php include '../sharedComponents/footer.php'; ?>
</body>
</html>
