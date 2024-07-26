<?php

namespace MyProject\Controller;

use MyProject\Database\Connection;
use MyProject\Model\Staff;

class RegisterController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Connection())->getPdo();
    }

    public function handleRegistration()
    {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = 'Username and password are required.';
            } else {
                // Check if username already exists
                $stmt = $this->pdo->prepare("SELECT id FROM staff WHERE username = ?");
                $stmt->execute([$username]);

                if ($stmt->rowCount() > 0) {
                    $error = 'Username already exists.';
                } else {
                    // Hash the password
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    // Insert new user into the database
                    $stmt = $this->pdo->prepare("INSERT INTO staff (username, password_hash) VALUES (?, ?)");
                    if ($stmt->execute([$username, $passwordHash])) {
                        $success = 'Registration successful!';
                    } else {
                        $error = 'Failed to register user. Please try again.';
                    }
                }

                $this->pdo = null; // Close connection
            }
        }

        return ['error' => $error, 'success' => $success];
    }
}
