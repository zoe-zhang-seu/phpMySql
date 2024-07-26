<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use MyProject\Database\Connection;

$connection = new Connection();
$tables = [];

// Fetch table names
$stmt = $connection->pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

$connection->close();

 // Include the header
 include 'sharedComponents/header.php';

?>
<head>
    <meta charset="UTF-8">
    <title>Show Tables</title>
    <link rel="stylesheet" href="css/showTables.css"> <!-- Link to CSS file -->
</head>
<h1>Tables in Database</h1>
<?php if (!empty($tables)): ?>
    <ul>
        <?php foreach ($tables as $table): ?>
            <li><?php echo htmlspecialchars($table); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No tables found in the database.</p>
<?php endif; ?>

<?php include 'sharedComponents/footer.php'; // Include the footer ?>
