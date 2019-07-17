<?php 
session_start();
require('config.php');
$cod=$_POST['cod'];
$est=$_POST['est'];
$register="UPDATE `ubereat`.`evalucion` SET `valor`='$est' WHERE `idsale`='$cod';" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:listaventas2.php');
mysqli_close($db_link);



 ?>