<?php
// Start session for guest access
session_start();

// Set guest session variables or perform any necessary actions
$_SESSION['guest_user'] = true;

// Redirect to your main page for guest access
header('Location: ../index.html');
exit;
?>