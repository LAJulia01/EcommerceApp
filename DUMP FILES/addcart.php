<?php
session_start();
$product_id = $_POST['product_id'] ?? null;

if (!$product_id) exit;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] = 1;
} else {
    $_SESSION['cart'][$product_id]++;
}

echo 'Product added to cart.';
?>