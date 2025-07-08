<?php
include 'db.php';
include 'session.php';
include 'navbar.php';

$user_id = $_SESSION['user_id'] ?? 0;
$res = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order History - ECOMMERCE-APP</title>
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
            margin-bottom: 30px;
        }

        .order {
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }

        .order h3 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .item {
            margin-left: 20px;
            font-size: 15px;
            color: #555;
        }

        .empty {
            text-align: center;
            color: #666;
            font-size: 18px;
            padding: 40px;
        }

        
    </style>
</head>
<body>


<div class="container">
    <h2>Order History</h2>

    <?php
    if ($res->num_rows === 0) {
        echo "<div class='empty'>You have no past orders.</div>";
    } else {
        while ($order = $res->fetch_assoc()) {
            echo "<div class='order'>";
            echo "<h3>Order #{$order['id']} <small style='color:#666;'>({$order['created_at']})</small></h3>";

            $items = $conn->query("SELECT p.name, oi.quantity 
                                   FROM order_items oi 
                                   JOIN products p ON oi.product_id = p.id 
                                   WHERE oi.order_id = {$order['id']}");
            
            while ($item = $items->fetch_assoc()) {
                $name = htmlspecialchars($item['name']);
                $qty = (int)$item['quantity'];
                echo "<div class='item'>• {$name} x {$qty}</div>";
            }

            echo "</div>";
        }
    }
    ?>

</div>

<script>
function fetchCartCount() {
  $.get('cartcount.php', function(count) {
    $('#cart-count').text(count);
  });
}

fetchCartCount();
setInterval(fetchCartCount, 3000);
</script>


</body>
</html>