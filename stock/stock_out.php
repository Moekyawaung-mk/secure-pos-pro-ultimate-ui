```php
<?php
require_once "../config/db.php";
require_once "../includes/header.php";

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = (int)$_POST['product_id'];
    $qty = (int)$_POST['qty'];

    $stmt = $conn->prepare("SELECT stock, name_en FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

    if ($product && $product['stock'] >= $qty) {
        $stmt = $conn->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
        $stmt->bind_param("ii", $qty, $product_id);
        $stmt->execute();
        $message = "Stock removed successfully.";
    } else {
        $error = "Not enough stock.";
    }
}

$products = $conn->query("SELECT id, name_en, stock FROM products ORDER BY name_en ASC");
?>

<div class="card border-0 shadow">
  <div class="card-body">
    <h2>Stock Out</h2>

    <?php if ($message): ?>
      <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label>Product</label>
        <select name="product_id" class="form-select" required>
          <?php while($row = $products->fetch_assoc()): ?>
            <option value="<?php echo $row['id']; ?>">
              <?php echo htmlspecialchars($row['name_en']); ?> (Current: <?php echo $row['stock']; ?>)
            </option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="qty" class="form-control" min="1" required>
      </div>
      <button class="btn btn-danger">Remove Stock</button>
    </form>
  </div>
</div>

<?php require_once "../includes/footer.php"; ?>
```
