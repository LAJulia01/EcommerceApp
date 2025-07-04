<?php
include 'db.php';
include 'session.php';
$user_id = $_SESSION['user_id'] ?? null;
$cart = $_SESSION['cart'] ?? [];
if (!$user_id || empty($cart)) {
    die("Login or cart required.");
}
$conn->query("INSERT INTO orders (user_id, created_at) VALUES ($user_id, NOW())");
$order_id = $conn->insert_id;
foreach ($cart as $id => $qty) {
    $conn->query("INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $id, $qty)");
}
unset($_SESSION['cart']);
echo "Order placed!";
?>