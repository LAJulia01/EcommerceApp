<?php
include 'session.php';
$id = $_POST['product_id'];
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
echo 'Added to cart';
?>