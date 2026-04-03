```php
<?php
require_once "../config/db.php";
require_once "../includes/header.php";

$result = $conn->query("SELECT * FROM customers ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Customers / ဖောက်သည်များ</h2>
  <a href="add.php" class="btn btn-warning">Add Customer</a>
</div>

<div class="card border-0 shadow">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td><?php echo htmlspecialchars($row['address']); ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once "../includes/footer.php"; ?>
```

