<?php
include 'db.php';
include 'session.php';
include 'navbar.php';

$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart - ECOMMERCE-APP</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: 16px;
            color: #333;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: #007bff;
        }

        .actions {
            text-align: right;
            margin-top: 30px;
        }

        .actions button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            margin-left: 10px;
        }

        .actions button:hover {
            background: #0056b3;
        }

        .empty {
            text-align: center;
            padding: 40px;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Your Shopping Cart</h2>

    <?php if (empty($cart)): ?>
        <div class="empty">Your cart is empty.</div>
    <?php else: ?>
        <?php
        $total = 0;
        foreach ($cart as $id => $qty):
            $res = $conn->query("SELECT * FROM products WHERE id=$id");
            if ($row = $res->fetch_assoc()):
                $subtotal = $qty * $row['price'];
                $total += $subtotal;
        ?>
            <div class="cart-item">
                <div><?= htmlspecialchars($row['name']) ?> x <?= $qty ?></div>
                <div>₱<?= number_format($subtotal, 2) ?></div>
            </div>
        <?php endif; endforeach; ?>

        <div class="total">Total: ₱<?= number_format($total, 2) ?></div>

        <div class="actions">
            <form method="post" action="checkout.php" style="display:inline;">
                <button type="submit">Checkout</button>
            </form>
            <form method="post" action="clearcart.php" style="display:inline;">
                <button type="submit" style="background:#dc3545;">Clear Cart</button>
            </form>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
