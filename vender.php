
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

//Agregamos la libreria para genera códigos QR
  require "phpqrcode/qrlib.php";    
  
  //Declaramos una carpeta temporal para guardar la imagenes generadas
  $dir = 'qr/';
  
  //Si no existe la carpeta la creamos
  if (!file_exists($dir))
        mkdir($dir);
  
        //Declaramos la ruta y nombre del archivo a generar
  $filename = $dir.$codventa.'.png';
 
        //Parametros de Condiguración
  
  $tamaño = 10; //Tamaño de Pixel
  $level = 'H'; //Precisión Baja
  $framSize = 3; //Tamaño en blanco
  $contenido = "http://192.168.1.38:81/ubereat/pdfrecibo.php?rec=".md5($codventas); //Texto
  
        //Enviamos los parametros a la Función para generar código QR 
  QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
  
header('location:sales.php?tconf=true');
?>
	