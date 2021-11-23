<?php
// Initialize the session
session_start();
session_regenerate_id();
session_destroy();
header('location:index.php');
// Unset all of the session variables

?>