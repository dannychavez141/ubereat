<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas</title>
</head>
<?php error_reporting(0);
 include_once'./cabezera.php'; include 'config.php'; 
 $conf=$_GET['tconf'];
if ($conf) {
 echo "<script>alert('No se puede realizar la operacion por que no hay productos en el carrito');</script>";

}?>

<script>
  function toggle_visibility(id){
    var e = document.getElementById(id);
    if(e.style.display=='block')
      e.style.display = 'none';
    else
      e.style.display = 'block';
    }
</script>

<body>
<br>
<?php  
$id = $_GET['id'];
          $query="SELECT * FROM ubereat.customers where md5(id) = '$id';";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){
?>
<table align="center" border="1">
  <tr>
     <th colspan="2" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;">DATOS DE CLIENTE</th>
    </tr>
    <tr><td>Cliente:</td><td><?php echo $row[1]; ?></td></tr>
<tr><td>DNI O RUC:</td><td><?php echo $row[5]; ?></td></tr>
<tr><td>Direccion:</td><td><?php echo $row[3]; ?></td></tr></table>
<?php } ?>
<br>
<table border="1" cellpadding="0" cellspacing="0"  width="40%" style="border:1px solid #033; color:#033;" align="center">
    
     <tr>
     <th colspan="8"  height="50px" style="border-bottom:1px solid #030; background: #030; color:#FFF;">Platillos Seleccionados</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Categoria </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Precio </th>
         <th style="border-bottom:1px solid #333;"> Cantidad </th>
         <th style="border-bottom:1px solid #333;"> SubTotal </th>
        <th style="border-bottom:1px solid #333;">Accion</th>
      </tr>
      
        <!-- Search goes here! -->
 
      <!-- Search end here -->
      
       <?php
$platos=$_SESSION['plato'];
if ($platos!= null) {$suma=0;
  for ($i=0; $i < count($platos); $i++) { 
    if ($platos[$i]!=null) {
      # code...
    
$cant=$_SESSION['cant'][$i];
$query="SELECT * FROM products where id=$platos[$i]";
$result=mysqli_query($db_link, $query);

while ($row=mysqli_fetch_array($result)){
$stotal=$row['retail']*$cant;
  ?>
      
      <tr align="center" style="height:35px">
        <td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $cant; ?> uni. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo 'S/'.$stotal ?></td>
        <td style="border-bottom:1px solid #333;">

        <a href="quitar.php?idplato=<?php echo $i;?>&&id=<?php echo $id;?>"><input type="button" value="Quitar" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>
        
        </td>
      </tr>
   <?php
 $suma=$suma+$stotal;
}}}?>
      <tr align="center" style="height:35px">
        <td colspan="4" style="border-bottom:1px solid #333;">TOTAL A PAGAR</td>
        <td style="border-bottom:1px solid #333;"> <?php echo 'S/'.$suma ?> </td>
        
      </tr>
      <tr align="center" style="height:35px">
        
        <td colspan="3" style="border-bottom:1px solid #333;"><a href="process_sales.php?id=<?php echo $id;?>"><input type="button" value="Atras" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a></td>
        <td colspan="3" style="border-bottom:1px solid #333;"><a href="vender.php?id=<?php echo $id;?>"><input type="button" value="Hacer Pedido" style="width:90px; height:30px; color:#FFF; background: #40ADBA; border:1px solid #40ADBA; border-radius:3px;"></a></td>
      </tr>
<?php } else{?>
  <tr align="center" style="height:35px">
        <td colspan="6" style="border-bottom:1px solid #333;">NO HAY PLATOS EN LA LISTA <a href="process_sales.php?id=<?php echo $id;?>"><input type="button" value="VOLVER" style="width:90px; height:30px; color:#FFF; background: #40ADBA; border:1px solid #40ADBA; border-radius:3px;"></a></td>
        
      </tr>
   <?php } ?>
    </table>
    
  </td>
  </tr>
</table>
<br><br><br>
<div id="bdcontainer"></div>

<div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
<tr>
  <td>
     &copy;2019 Todos los Derechos Reservados.  |  Diseñada por:<a href="https://www.facebook.com/repp0rt">Franco CV</a>
    </td>
</tr>
</table>
</div>

</div>

</body>
</html>