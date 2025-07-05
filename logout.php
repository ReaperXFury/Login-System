<?php
session_start();         // Start the session
session_unset();         // Remove all session variables
session_destroy();       // Destroy the session

// Optionally redirect to login or home page
header("Location: login.php");
exit();
?>
