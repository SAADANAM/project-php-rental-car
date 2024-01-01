<?php
session_start();

// Unset all session variables
//$_SESSION = array();


session_destroy();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
// Redirect to login page
header("Location: login.php");
exit();
?>
