<?php 

// include constants.php for SITEURL 
include('../config/constants.php');
// Destroy all session 
session_destroy();

// Redirect to login page
header('location:'.SITEURL.'admin/login.php');

?>