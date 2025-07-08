function addToCart(productId) {
  $.post('add_to_cart.php', { product_id: productId }, function(response) {
    // ✅ Update cart count via AJAX
    $.get('cartcount.php', function(count) {
      $('#cart-count').text(count);
    });
    // Set modal message and show it
    $('#cartModalMessage').text(response);
    const modal = new bootstrap.Modal(document.getElementById('cartModal'));
    modal.show();
  });
}
