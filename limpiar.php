
<?php
session_start();
require('config.php');
unset($_SESSION['plato']);
unset($_SESSION['cant']);
header('location:sales.php');
?>