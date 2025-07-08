<?php
// Prevents "session already started" error
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>