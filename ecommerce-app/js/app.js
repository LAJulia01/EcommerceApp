function addToCart(productId) {
  $.post('add_to_cart.php', { product_id: productId }, function(response) {
    alert(response);
  });
}