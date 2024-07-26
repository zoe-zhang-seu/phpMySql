we add htmlspecialchars in login page

# Why use htmlspecialchars
## Preventing XSS Attacks


One of the main uses of htmlspecialchars is to prevent XSS attacks.

```php
$error = '<script>alert("XSS")</script>';  // Example of malicious input

echo htmlspecialchars($error);
// Output: &lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;

```

https://www.php.net/manual/en/function.htmlspecialchars.php

# Where to use

- Form submissions
- URL parameters
- Database queries containing user input
- API responses with user input

### without , it will be 

```php
<p><script>alert("Error")</script></p>
```

### with, it will be

```php
<p>&lt;script&gt;alert(&quot;Error&quot;)&lt;/script&gt;</p>
```

