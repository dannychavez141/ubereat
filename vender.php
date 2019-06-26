
<?php
session_start();
require('config.php');

$id=$_GET['id'];
$query="SELECT * FROM ubereat.customers where md5(id) = '$id';";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){
$cod=$row[0]; 
 } 
$register="INSERT INTO `ubereat`.`sales` (`dates`, `idclie`) VALUES (now(), '$cod');" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);

$venta="SELECT count(id) FROM ubereat.sales;";
$result=mysqli_query($db_link, $venta);

while ($row=mysqli_fetch_array($result)){
$codventa=$row[0]; 

}
$platos=$_SESSION['plato'];
if ($platos!= null) {$suma=0;
  for ($i=0; $i < count($platos); $i++) { 
    if ($platos[$i]!=null) {  
$cant=$_SESSION['cant'][$i];
$resta = "UPDATE products set quantity = quantity - '$cant' where id = '$platos[$i]'";
$actualizar=mysqli_query($db_link,$resta);
$detalle = "INSERT INTO `ubereat`.`det_sales` (`idsale`, `idprod`, `cant`) VALUES ('$codventa', '$platos[$i]', '$cant');";
$actualizar=mysqli_query($db_link,$detalle);
 //$suma=$suma+$stotal;
}}}else{header('location:carrito.php?tconf=true');}

unset($_SESSION['plato']);
unset($_SESSION['cant']);
header('location:sales.php?tconf=true');
?>
	