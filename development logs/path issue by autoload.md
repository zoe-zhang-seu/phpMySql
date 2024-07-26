# Why want to use it
want to separate php part to loginController under src/controller, make public/login.php lighter

# Configuring Composer for PSR-4 Autoloading

To set up PSR-4 autoloading with Composer in your PHP project, follow these steps:

## 1. Update `composer.json`

Add the following configuration to the `autoload` section of your `composer.json` file to set up PSR-4 autoloading. This tells Composer how to map namespaces to directories.

### Example `composer.json` Configuration

```json
{
    "autoload": {
        "psr-4": {
            "MyProject\\": "src/"
        }
    }
}
// it makes when i declare MyProject, that path starts from src/ folder
```

## 2. Define Namespaces in Your PHP Files
```php
<?php

namespace MyProject\Controller; // here its myproject/src/Controller

class LoginController
{
    // Class implementation
}

```

## 3. Regenerate Autoload Files

in vscode terminal under myproject 
```bash
composer dump-autoload
```

# Summary
- Update `composer.json`: Add the PSR-4 autoload configuration.
- Use Correct Namespaces: Ensure PHP files use the namespaces as configured.
- Run `composer dump-autoload`: Regenerate the autoload files to apply the changes.
