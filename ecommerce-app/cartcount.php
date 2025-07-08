<?php
include 'session.php';
echo array_sum($_SESSION['cart'] ?? []);
?>