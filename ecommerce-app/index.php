<?php
include 'db.php';
include 'session.php';
include 'navbar.php'; 
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List - ECOMMERCE-APP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding-top: 80px; /* give breathing space */
        }

        /* Ensure navbar container matches other pages */
        .navbar .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Main content container */
        .main-container {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
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

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: none;
            border-radius: 8px;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        .modal-header {
            color: #28a745;
            margin-bottom: 15px;
        }

        .modal-footer {
            margin-top: 20px;
        }

        .modal-footer button,
        .modal-footer a {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 5px;
            cursor: pointer;
        }

        .modal-footer button:hover,
        .modal-footer a:hover {
            background: #0056b3;
        }

        .modal-footer .btn-secondary {
            background: #6c757d;
        }

        .modal-footer .btn-secondary:hover {
            background: #545b62;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }
        @media (max-width: 576px) {
            .product-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<!-- Page Content -->
<div class="main-container">
    <h2>Product List</h2>
    
    <div class="product-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <strong><?= htmlspecialchars($row['name']) ?></strong>
                <span>₱<?= htmlspecialchars($row['price']) ?></span>
                <button onclick="addToCart(<?= $row['id'] ?>)">Add to Cart</button>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Modal Notification -->
<div id="cartModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeModal()">&times;</span>
            <h5>🛒 Cart Update</h5>
        </div>
        <div id="cartModalMessage">Item added to cart.</div>
        <div class="modal-footer">
            <a href="cart.php">Go to Cart</a>
            <button onclick="closeModal()">Continue Shopping</button>
        </div>
    </div>
</div>

<script>
function addToCart(productId) {
    $.post('add_to_cart.php', { product_id: productId }, function(response) {
        // Refresh cart count
        $.get('cartcount.php', function(count) {
            $('#cart-count').text(count);
        });

        // Show modal with response message
        $('#cartModalMessage').text(response);
        $('#cartModal').show();
    });
}

function closeModal() {
    $('#cartModal').hide();
}

// Close modal when clicking outside of it
$(document).ready(function() {
    $(window).click(function(event) {
        if (event.target.id === 'cartModal') {
            $('#cartModal').hide();
        }
    });
});

// Auto-refresh cart count every 10 seconds
setInterval(() => {
    $.get('cartcount.php', function(count) {
        $('#cart-count').text(count);
    });
}, 10000);
</script>

</body>
</html>