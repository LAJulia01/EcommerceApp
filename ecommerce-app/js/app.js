function addToCart(productId) {
  $.post('add_to_cart.php', { product_id: productId }, function(response) {
    
    // ✅ Fetch updated count from server
    $.get('cart_count.php', function(count) {
      $('#cart-count').text(count);
    });

    // ✅ Show toast
    const toast = $('<div></div>')
      .text(response)
      .css({
        position: 'fixed',
        bottom: '20px',
        right: '20px',
        background: '#007bff',
        color: '#fff',
        padding: '10px 15px',
        borderRadius: '5px',
        zIndex: 9999,
        boxShadow: '0 2px 6px rgba(0,0,0,0.2)',
        fontSize: '14px'
      });

    $('body').append(toast);
    setTimeout(() => toast.fadeOut(400, () => toast.remove()), 2000);
  });
}
