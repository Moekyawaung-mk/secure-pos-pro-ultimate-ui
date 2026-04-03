
```php
<?php
require_once "config/db.php";
require_once "includes/header.php";

$productCount = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
$customerCount = $conn->query("SELECT COUNT(*) as total FROM customers")->fetch_assoc()['total'];
$supplierCount = $conn->query("SELECT COUNT(*) as total FROM suppliers")->fetch_assoc()['total'];
$salesCount = $conn->query("SELECT COUNT(*) as total FROM sales")->fetch_assoc()['total'];
$salesSum = $conn->query("SELECT IFNULL(SUM(grand_total),0) as total FROM sales")->fetch_assoc()['total'];
?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="fw-bold">Dashboard</h2>
    <p class="text-muted">Store Overview / ဆိုင်အခြေအနေ အကျဉ်းချုပ်</p>
  </div>
</div>

<div class="row g-4">
  <div class="col-md-4">
    <div class="card dashboard-card bg-success text-white border-0 shadow">
      <div class="card-body">
        <h5>Total Sales</h5>
        <h3>MMK <?php echo number_format($salesSum, 2); ?></h3>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card dashboard-card bg-primary text-white border-0 shadow">
      <div class="card-body">
        <h5>Total Products</h5>
        <h3><?php echo $productCount; ?></h3>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card dashboard-card bg-warning text-dark border-0 shadow">
      <div class="card-body">
        <h5>Total Invoices</h5>
        <h3><?php echo $salesCount; ?></h3>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card border-0 shadow">
      <div class="card-body">
        <h5>Customers</h5>
        <h3><?php echo $customerCount; ?></h3>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card border-0 shadow">
      <div class="card-body">
        <h5>Suppliers</h5>
        <h3><?php echo $supplierCount; ?></h3>
      </div>
    </div>
  </div>
</div>

<div class="card border-0 shadow mt-4">
  <div class="card-body">
    <h5 class="fw-bold">Sales Chart Placeholder</h5>
    <p class="text-muted">Chart.js integration can be added here for daily / weekly / monthly sales.</p>
    <div class="chart-placeholder">📊</div>
  </div>
</div>

<?php require_once "includes/footer.php"; ?>
```

---

# 9) `customers/index.php`

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

---
