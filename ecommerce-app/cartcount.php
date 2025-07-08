<?php
// Start or resume session
session_start();

// Output the total number of items in the cart
echo array_sum($_SESSION['cart'] ?? []);