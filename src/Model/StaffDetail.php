<?php

namespace MyProject\Model;

class StaffDetail
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $comment;

    public function __construct($id, $firstName, $lastName, $email, $comment = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->comment = $comment;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getComment()
    {
        return $this->comment;
    }

    // Setters
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    // Method to save details to the database
    public function save(\PDO $pdo)
    {
        $stmt = $pdo->prepare(
            "INSERT INTO staff_detail (id, first_name, last_name, email, comment)
             VALUES (?, ?, ?, ?, ?)
             ON DUPLICATE KEY UPDATE
             first_name = VALUES(first_name),
             last_name = VALUES(last_name),
             email = VALUES(email),
             comment = VALUES(comment)"
        );

        return $stmt->execute([$this->id, $this->firstName, $this->lastName, $this->email, $this->comment]);
    }

    // Method to fetch details from the database
    public static function getById(\PDO $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT id, first_name, last_name, email, comment FROM staff_detail WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new self($data['id'], $data['first_name'], $data['last_name'], $data['email'], $data['comment']);
        }

        return null;
    }
}
