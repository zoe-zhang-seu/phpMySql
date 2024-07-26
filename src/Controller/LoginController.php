<?php

namespace MyProject\Controller;

use MyProject\Database\Connection;
use MyProject\Model\Staff;

class LoginController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Connection())->getPdo();
    }

    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                return 'Username and password are required.';
            }

            // Query to find user by username
            $stmt = $this->pdo->prepare("SELECT id, username, password_hash FROM staff WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC); // Get record from staff table

            if ($user) {
                // Create a Staff object
                $staff = new Staff($user['id'], $user['username'], $user['password_hash']);

                // Verify password
                if (password_verify($password, $staff->getPasswordHash())) {
                    $_SESSION['username'] = $staff->getUsername();
                    header('Location: ../home.php');
                    exit();
                }
            }

            return 'Invalid username or password.';
        }

        return '';
    }
}
