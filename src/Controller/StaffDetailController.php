<?php

namespace MyProject\Controller;

use MyProject\Database\Connection;
use MyProject\Model\StaffDetail;

class StaffDetailController
{
    private $pdo;

    public function __construct()
    {
        $connection = new Connection();
        $this->pdo = $connection->getPdo(); // Ensure this method returns a valid PDO instance
    }

    public function handleRequest()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: manageAccount/login.php');
            exit();
        }

        // Fetch user ID
        $username = $_SESSION['username'];
        $stmt = $this->pdo->prepare("SELECT id FROM staff WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$user) {
            die('User not found.');
        }

        $userId = $user['id'];

        // Fetch user details using the model
        $staffDetail = StaffDetail::getById($this->pdo, $userId);

        $error = '';
        $success = '';

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'] ?? '';
            $lastName = $_POST['last_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $comment = $_POST['comment'] ?? '';

            if ($staffDetail) {
                $staffDetail->setFirstName($firstName);
                $staffDetail->setLastName($lastName);
                $staffDetail->setEmail($email);
                $staffDetail->setComment($comment);

                if ($staffDetail->save($this->pdo)) {
                    $success = 'Details updated successfully!';
                    // Fetch updated details after update
                    $staffDetail = StaffDetail::getById($this->pdo, $userId);
                } else {
                    $error = 'Failed to update details. Please try again.';
                }
            } else {
                $error = 'Staff details not found.';
            }
        }

        return ['error' => $error, 'success' => $success, 'staffDetail' => $staffDetail];
    }
}
