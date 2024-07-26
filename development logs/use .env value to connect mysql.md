# Want to set connection value in .env file

1. Install vlucas/phpdotenv

```sh
composer require vlucas/phpdotenv

```
2. Create env file, must have DB_HOST='' , '' is important


```bash
DB_HOST='localhost'
DB_USERNAME='root'
DB_PASSWORD='root'
DB_DATABASE='mydatabase'
DB_SOCKET='/Applications/MAMP/tmp/mysql/mysql.sock'
```

3.  replace the variable in the connection.php

4. set .env in .gitignore file