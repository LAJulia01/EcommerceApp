<?php
session_start();

$products = [
    1 => ['name' => 'Sample Product', 'price' => 100],
    // Add more products as needed
];

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    echo "Cart is empty.";
    exit;
}

$total = 0;
foreach ($cart as $id => $qty) {
    $name = $products[$id]['name'] ?? 'Unknown';
    $price = $products[$id]['price'] ?? 0;
    $subtotal = $price * $qty;
    $total += $subtotal;

    echo "<p>{$name} - Qty: {$qty} - Subtotal: \${$subtotal}</p>";
}

echo "<hr><strong>Total: \${$total}</strong>";
?>