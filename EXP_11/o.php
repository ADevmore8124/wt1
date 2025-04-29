<?php
session_start();
require 'database_handling.php';
$conn = connect_db();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];

    $stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $stmt->bind_result($price);
    $stmt->fetch();
    $stmt->close();

    $total = $qty * $price;
    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, qty, price, status, payment_status) VALUES (?, ?, ?, ?, 'Pending', 'Unpaid')");
    $stmt->bind_param("iiid", $user_id, $product_id, $qty, $price);
    $stmt->execute();
    echo "Order placed! <a href='orderedata.php'>View Orders</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
  Product:
  <select name="product_id">
    <?php
    $res = $conn->query("SELECT id, name FROM products");
    while ($row = $res->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
    }
    ?>
  </select><br>
  Quantity: <input type="number" name="qty" min="1" value="1"><br>
  <button type="submit">Order</button>
</form>

</body>
</html>