
<?php
session_start();
$cant=$_POST['cant'];
$idplato=$_POST['idplato'];
$_SESSION['plato'][]=$idplato;
$_SESSION['cant'][]=$cant;
header('location:sales2.php?tconf=true');
?>
	
