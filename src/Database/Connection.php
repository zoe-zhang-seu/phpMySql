<?php

namespace MyProject\Database;

class Connection
{
    public $pdo;

    public function __construct()
    {
        $host = 'localhost';  // Use localhost
        $username = 'root';
        $password = 'root';
        $database = 'mydatabase';
        $socket = '/Applications/MAMP/tmp/mysql/mysql.sock';  // Update with your actual socket path

        try {
            $dsn = "mysql:host=$host;dbname=$database;unix_socket=$socket";
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // echo 'Connected successfully to the MySQL database';
        } catch (\PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function close()
    {
        $this->pdo = null;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
