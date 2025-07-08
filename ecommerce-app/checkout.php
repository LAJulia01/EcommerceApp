<?php
include 'db.php';
include 'session.php';
include 'navbar.php';

$user_id = $_SESSION['user_id'] ?? null;
$cart = $_SESSION['cart'] ?? [];

if (!$user_id) {
    echo '
    <div style="padding: 60px; font-family: Arial, sans-serif; text-align: center;">
        <h2 style="color: #dc3545;">You must be logged in to checkout.</h2>
        <a href="login.php" style="
            display: inline-block;
            margin-top: 20px;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        ">Login to Continue</a>
    </div>';
    exit;
}

// Create order
$stmt = $conn->prepare("INSERT INTO orders (user_id, created_at) VALUES (?, NOW())");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_id = $conn->insert_id;

// Insert order items
foreach ($cart as $id => $qty) {
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $order_id, $id, $qty);
    $stmt->execute();
}

// Clear cart
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - ECOMMERCE</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            text-align: center;
        }
        h2 {
            color: #28a745;
        }
        a.button {
            display: inline-block;
            margin-top: 25px;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.2s;
        }
        a.button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>✅ Order Successfully Placed!</h2>
    <p>Thank you for your purchase. Your order ID is <strong>#<?= $order_id ?></strong>.</p>
    <a href="index.php" class="button">Continue Shopping</a>
</div>

</body>
</html>
