<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
    <div class="header-container">
            <div class="logo">
                <a href="home.php">
                    <img src="../image/logo.png" alt="Company Logo">
                </a>
            </div>
            <nav>
                <a href="home.php">Home</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="showTables.php">Database</a>
                    <a href="staffDetail.php">Staff Details</a>
                    <a href="manageAccount/logout.php">Logout</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main>
