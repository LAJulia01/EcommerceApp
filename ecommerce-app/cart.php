<?php
include 'db.php';
include 'session.php';
$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    echo "Cart is empty.";
    exit;
}
$total = 0;
foreach ($cart as $id => $qty) {
    $res = $conn->query("SELECT * FROM products WHERE id=$id");
    if ($row = $res->fetch_assoc()) {
        $subtotal = $qty * $row['price'];
        echo "{$row['name']} x $qty = \${$subtotal}<br>";
        $total += $subtotal;
    }
}
echo "<br><strong>Total: \${$total}</strong>";
?>