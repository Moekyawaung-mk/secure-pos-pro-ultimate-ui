```php
<?php
session_start();
require_once "../config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: /secure-pos-pro-ultimate-ui/index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Secure POS Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/style.css" rel="stylesheet">
</head>
<body class="login-page">
  <div class="login-wrapper">
    <div class="card shadow-lg border-0 login-card">
      <div class="card-body p-4">
        <h2 class="fw-bold mb-2 text-center">POS Login</h2>
        <p class="text-muted text-center mb-4">Mini Market & Shop Management</p>

        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Username / အသုံးပြုသူ</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password / လျှို့ဝှက်နံပါတ်</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button class="btn btn-warning w-100 fw-bold" type="submit">Login</button>
        </form>

        <div class="mt-3 text-center small text-muted">
          Demo Login: <strong>admin / 1234</strong>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
```
