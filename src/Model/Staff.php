<?php
namespace MyProject\Model;

class Staff {
    private $id;
    private $username;
    private $passwordHash;

    public function __construct($id, $username, $passwordHash) {
        $this->id = $id;
        $this->username = $username;
        $this->passwordHash = $passwordHash;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

}
