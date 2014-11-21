<?php
session_start();
unset($_SESSION['dpd']); 
session_destroy();
header("Location: index.php"); 
?>