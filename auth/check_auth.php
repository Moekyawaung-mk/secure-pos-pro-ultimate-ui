```php
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /secure-pos-pro-ultimate-ui/auth/login.php");
    exit();
}
?>
```
