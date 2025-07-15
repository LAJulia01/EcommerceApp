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
    
    .logout-link {
        color: #dc3545 !important;
        font-weight: 500;
    }

    .logout-link:hover {
        color: #b52a2a !important;
    }
</style>



<nav class="navbar navbar-expand-lg">
  <div class="container-fluid d-flex justify-content-between align-items-center px-4">
    <a class="navbar-brand" href="index.php">TECH REPAIR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Products</a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'cart.php' ? 'active' : '' ?>" href="cart.php">
            Cart
            <span id="cart-count"><?= array_sum($_SESSION['cart'] ?? []) ?></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'order_history.php' ? 'active' : '' ?>" href="order_history.php">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link logout-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
function fetchCartCount() {
  $.get('cartcount.php', function(count) {
    $('#cart-count').text(count);
  });
}


fetchCartCount();
setInterval(fetchCartCount, 3000);
</script>