<!DOCTYPE html>
<html>
<head>
  <title>E-Commerce App</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Product List</h2>
<div id="products">
  <div>
    <h3>Sample Product</h3>
    <p>Price: $100</p>
    <button onclick="addToCart(1)">Add to Cart</button>
  </div>
</div>

<hr>
<h3>Cart</h3>
<div id="cart"></div>

<script>
function addToCart(productId) {
  $.ajax({
    url: 'addcart.php',
    method: 'POST',
    data: { product_id: productId },
    success: function(response) {
      loadCart();
    }
  });
}

function loadCart() {
  $.ajax({
    url: 'viewcart.php',
    method: 'GET',
    success: function(response) {
      $('#cart').html(response);
    }
  });
}

$(document).ready(function() {
  loadCart();
});
</script>

</body>
</html>