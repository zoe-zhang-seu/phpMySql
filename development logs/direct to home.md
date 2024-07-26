### `.htaccess` Configuration

```
# Enable URL rewriting
RewriteEngine On
<!--
Purpose: This line enables the URL rewriting engine provided by Apache's mod_rewrite module. Without this directive, none of the following rewrite rules will be processed. (but I use nginx, still works)
-->

# Redirect all requests to home.php unless the request is for a specific file or directory
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^$ home.php [L]
```

- Purpose: These conditions check if the requested URL corresponds to a file (-f) or directory (-d) that exists in the filesystem.
Details:
- RewriteCond %{REQUEST_FILENAME} !-f: This condition checks if the requested URL is not a file that exists.
- RewriteCond %{REQUEST_FILENAME} !-d: This condition checks if the requested URL is not a directory that exists.

`RewriteRule ^$ home.php [L]`

**Purpose:**

This rule is applied when the conditions above are met (i.e., when the request is neither a file nor a directory).

**Details:**

- **`^$`**: This matches the root URL (`/`).
- **`home.php`**: This specifies that all requests matching the condition should be redirected to `home.php`.
- **`[L]`**: This flag means "last rule". Once this rule is applied, no further rules will be processed.
