<?php 
session_start();
require('config.php');
$cod=$_POST['cod'];
$est=$_POST['est'];
$clie=$_POST['clie'];
$register="UPDATE `ubereat`.`sales` SET `est`='$est' WHERE `id`='$cod';" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:listapedidos.php?id='.$clie);
mysqli_close($db_link);



 ?>