<?php
session_start();
require 'database_handling.php';
$conn = connect_db();
$user_id = $_SESSION['user_id'];

$res = $conn->query("SELECT o.id, p.name, o.qty, o.price, o.status FROM orders o JOIN products p ON o.product_id = p.id WHERE o.user_id = $user_id");
echo "<table border='1'><tr><th>Product</th><th>Qty</th><th>Price</th><th>Status</th><th>Bill</th></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['name']}</td><td>{$row['qty']}</td><td>{$row['price']}</td><td>{$row['status']}</td><td><a href='bill.php?id={$row['id']}'>View Bill</a></td></tr>";
}
echo "</table>";
?>