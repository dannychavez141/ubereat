
<?php
session_start();
require('config.php');

$cant=$_POST['cant'];
$idplato=$_POST['idplato'];
$id=$_POST['id'];
$_SESSION['plato'][]=$idplato;
$_SESSION['cant'][]=$cant;


echo $cant.$idplato.$id;
header('location:process_sales.php?id='.$id.'&&tconf=true');
?>
	
