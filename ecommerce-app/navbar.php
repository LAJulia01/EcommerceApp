<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECOMMERCE NAVBAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            padding: 12px 24px;
        }

        .navbar-brand {
            font-size: 22px;
            font-weight: bold;
            color: #007bff !important;
        }

        .nav-link {
            color: #555 !important;
            margin-right: 20px;
            font-size: 15px;
            transition: color 0.2s;
            position: relative;
        }

        .nav-link:hover {
            color: #0056b3 !important;
        }

        .nav-link.active {
            font-weight: bold;
            color: #007bff !important;
        }

        #cart-count {
            background: #dc3545;
            color: white;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
            position: absolute;
            top: -6px;
            right: -10px;
        }

        .navbar-toggler {
            border: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">ECOMMERCE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Products</a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link" href="cart.php">
            Cart
            <span id="cart-count"><?= array_sum($_SESSION['cart'] ?? []) ?></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order_history.php">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- JS CDNs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Auto-refresh cart count using AJAX -->
<script>
function fetchCartCount() {
  $.get('cart_count.php', function(count) {
    $('#cart-count').text(count);
  });
}

// Fetch immediately, then every 3 seconds
fetchCartCount();
setInterval(fetchCartCount, 3000);
</script>

</body>
</html>