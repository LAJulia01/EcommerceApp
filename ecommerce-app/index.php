<?php
include 'db.php';
include 'session.php';
$result = $conn->query("SELECT * FROM products");
echo '<h2>Product List</h2>';
while ($row = $result->fetch_assoc()) {
    echo "<div><strong>{$row['name']}</strong> - \${$row['price']} <button onclick='addToCart({$row['id']})'>Add to Cart</button></div>";
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/app.js"></script>