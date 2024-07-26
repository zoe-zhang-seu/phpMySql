1. Steps in development: start from login/register read data from data/users.json, create simple login/register to get users list from json decoded.
```json
[
    {
        "username": "Aaron",
        "password": "$2y$10$z8V5VuAkLWpUYswwCVXl0eSslwJk8EmDzWkttyKcsrwIxNAx0olGC"
    },
]
```

then create the table in sql 

```sql
CREATE TABLE staff (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     username VARCHAR(255) NOT NULL UNIQUE,
    ->     password_hash VARCHAR(255) NOT NULL
    -> );

SELECT * FROM STAFF;

SHOW columns from STAFF;

```
then try whether can connnect to mysql

then try from registerController, check whether the username and password stored in mySql

then try from loginController, check whether able to read from mysql

1. mysql_connect("host","username", "password") is no longer supported in php,so we use pdo. (The mysql_connect i read from book already out of date.)

1. the pdo socket
```php
$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';  // Update with your actual socket path
```


# Using PDO Socket Path for MySQL Connections

When connecting to MySQL using PHP’s PDO, you may need to specify the socket path to ensure proper connectivity, especially if MySQL is configured to use Unix sockets rather than TCP/IP for local connections.

## Why Use the Socket Path?

1. **Local Connections:**
   - **Unix Sockets:** On Unix-based systems (like macOS or Linux), MySQL often uses Unix domain sockets for local connections. This method can be faster and more secure compared to TCP/IP connections.
   - **Socket File Location:** Specifying the correct path to the MySQL socket file ensures that your application connects to the MySQL server using the Unix socket method.

2. **Configuration Details:**
   - **Default Path:** The default socket file path can vary depending on your system and installation method. For example, MAMP (a local development environment for macOS) might use `/Applications/MAMP/tmp/mysql/mysql.sock`.
   - **Custom Path:** If you have a non-standard installation or have customized the path, you need to specify the correct socket path in your connection settings.

## Configuring the Socket Path

When configuring your PDO connection, you can specify the socket in the DSN (Data Source Name). Here’s how to include it in your `Connection` class:

```php
<?php

namespace MyProject\Database;

class Connection
{
    private $pdo;

    public function __construct()
    {
        $host = '...'; // .... 

        $socket = '/Applications/MAMP/tmp/mysql/mysql.sock'; // Update with your actual socket path

        try {
            $dsn = "mysql:host=$host;dbname=$database;unix_socket=$socket";
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

   ...
}
```
## When to Use It

### Local Development

When MySQL is running locally, such as with MAMP or XAMPP, it may be configured to use a Unix socket rather than TCP/IP for local connections. In such cases, specifying the socket path in your PDO connection configuration is necessary. This ensures that your application can connect to the MySQL server properly.


# `$stmt`

```php
$dsn = "mysql:host=$host;dbname=$database";
$pdo = new \PDO($dsn, $username, $password);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
```

```php
$sql = "INSERT INTO staff (username, password_hash) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);

```

```php
$username = 'exampleUser';
$passwordHash = password_hash('examplePassword', PASSWORD_DEFAULT);
$stmt->execute([$username, $passwordHash]);

```