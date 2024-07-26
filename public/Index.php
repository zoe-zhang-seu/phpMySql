<?php
session_start();

// Determine the action based on the query parameter
$action = $_GET['action'] ?? '';

if ($action === 'register') {
    include 'register.php';
} elseif ($action === 'login') {
    include 'login.php';
} else {
    include 'home.php';
}
