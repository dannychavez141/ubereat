<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas</title>
</head>
<?php error_reporting(0);
 include_once'./cabezera2.php'; include 'config.php'; 
 $conf=$_GET['tconf'];
if ($conf) {
 echo "<script>alert('Platillo agregado al carrito');</script>";

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
$id = $_SESSION['id'];
          $query="SELECT * FROM ubereat.customers where id = '$id';";
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

<?php  
$rec = $_GET['rec'];

require('config.php');
$sql="SELECT * FROM ubereat.sales s join customers c on s.idclie=c.id join estado e on s.est=e.idestado join evalucion ev on s.id=ev.idsale where md5(s.id)='$rec'";
$result=mysqli_query($db_link, $sql);
while ($row=mysqli_fetch_array($result)){
 
          
              ?><form action="add_eval2.php" method="post">
      <center><table>
        <tr><td colspan="2"><h1>EVALUACION Y ESTADO DE  COMPRA</h1></td></tr>
<tr><td><h2>ESTADO DE PEDIDO:</h2></td><td><h2><?php echo $row[13]; ?></h2></td></tr>
<?php if ($row[15]==0) {
        $eval='SIN EVALUACION';
      }else{$eval=$row[15];}
      ?>
<tr><td><h2>EVALUACION ACTUAL:</h2></td><?php if ($row[15]==0) {
        $eval='SIN EVALUACION';
      ?>
      <td style="border-bottom:1px solid #333;"> <?php echo $eval; ?> </td>
<?php }else{ $eval=$row[15];;
  
?><td> 
<?php for ($i=0; $i < $row[15]; $i++) {  ?>
<img src="images/star.jpg"width="40" height="40">
<?php }?>
</td> 
<?php } ?></tr>
<input type="hidden" name="cod" value="<?php echo $row[0]; ?>">
<tr><td><h2>CAMBIAR EVALUACION:</h2></td><td><select style="font-size:18pt" name="est">
    <option value="<?php echo $row[15]; ?>"><?php echo $eval; ?></option>
    <option value="1">1 ESTRELLA</option>
     <option value="2">2 ESTRELLAS</option>
     <option value="3">3 ESTRELLAS</option>
      <option value="4">4 ESTRELLAS</option>
     <option value="5">5 ESTRELLAS</option>
  
  </select></td></tr>
<tr><td colspan="2"><button><h2>GUARDAR EVALUACION</h2></button></td></tr>
      </table></center>
   </form>
    <?php } ?>
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
