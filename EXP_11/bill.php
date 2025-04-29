<?php
require 'database_handling.php';
$conn = connect_db();
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT o.id, u.name, p.name, o.qty, o.price FROM orders o JOIN users u ON o.user_id = u.id JOIN products p ON o.product_id = p.id WHERE o.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($oid, $uname, $pname, $qty, $price);
$stmt->fetch();
$total = $qty * $price;

echo "<h2>Bill</h2>
Customer: $uname<br>
Product: $pname<br>
Quantity: $qty<br>
Price: ₹$price<br>
<b>Total: ₹$total</b>";
?>
