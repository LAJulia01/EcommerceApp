<?php
include 'db.php';
include 'session.php';
$user_id = $_SESSION['user_id'] ?? 0;
$res = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");
while ($order = $res->fetch_assoc()) {
    echo "<h3>Order #{$order['id']} ({$order['created_at']})</h3>";
    $items = $conn->query("SELECT p.name, oi.quantity FROM order_items oi JOIN products p ON oi.product_id = p.id WHERE oi.order_id = {$order['id']}");
    while ($item = $items->fetch_assoc()) {
        echo "{$item['name']} x {$item['quantity']}<br>";
    }
}
?>