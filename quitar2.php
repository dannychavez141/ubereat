
<?php
session_start();
require('config.php');
$idplato=$_GET['idplato'];
$id=$_GET['id'];
$_SESSION['plato'][$idplato]=null;
$_SESSION['cant'][$idplato]=null;
echo $idplato.$id;
header('location:carrito2.php?id='.$id);
?>
	
