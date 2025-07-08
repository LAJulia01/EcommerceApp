<?php
include 'session.php';
unset($_SESSION['cart']);
header("Location: cart.php");
exit;
?>