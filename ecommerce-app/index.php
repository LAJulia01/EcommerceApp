<?php
include 'db.php';
include 'session.php';
include 'navbar.php'; 
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List - ECOMMERCE-APP</title>
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
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
            text-align: center;
        }

        .product-card strong {
            display: block;
            font-size: 18px;
            margin-bottom: 8px;
            color: #333;
        }

        .product-card span {
            display: block;
            margin-bottom: 15px;
            color: #666;
        }

        .product-card button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .product-card button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Product List</h2>
    
    <div class="product-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <strong><?= htmlspecialchars($row['name']) ?></strong>
                <span>$<?= htmlspecialchars($row['price']) ?></span>
                <button onclick="addToCart(<?= $row['id'] ?>)">Add to Cart</button>
            </div>
        <?php endwhile; ?>
    </div>
    <div style="text-align:center; margin-top: 30px;">
    <a href="cart.php">
        <button style="
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        " onmouseover="this.style.background='#218838'" onmouseout="this.style.background='#28a745'">
            View Cart
        </button>
    </a>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>
