``php
<?php
require_once "../config/db.php";
require_once "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("INSERT INTO suppliers (name, phone, company) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['name'], $_POST['phone'], $_POST['company']);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<div class="card border-0 shadow">
  <div class="card-body">
    <h2>Add Supplier</h2>
    <form method="POST">
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
      </div>
      <div class="mb-3">
        <label>Company</label>
        <input type="text" name="company" class="form-control">
      </div>
      <button class="btn btn-warning">Save Supplier</button>
    </form>
  </div>
</div>

<?php require_once "../includes/footer.php"; ?>
```

