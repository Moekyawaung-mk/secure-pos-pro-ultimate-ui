```php
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
```

---

# 5) `includes/header.php`

```php
<?php require_once __DIR__ . '/../auth/check_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Secure POS Pro Ultimate UI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Myanmar:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="/secure-pos-pro-ultimate-ui/assets/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/secure-pos-pro-ultimate-ui/index.php">POS Ultimate UI</a>
    <div class="d-flex align-items-center gap-2 text-white">
      <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
      <a href="/secure-pos-pro-ultimate-ui/auth/logout.php" class="btn btn-warning btn-sm">Logout</a>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <?php include __DIR__ . '/sidebar.php'; ?>
    <main class="col-md-10 ms-sm-auto px-4 py-4">
```
