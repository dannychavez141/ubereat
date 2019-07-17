<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas</title>
</head>
<?php 
 include_once'./cabezera.php'; 
 ?>

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
$id = $_GET['rec'];

require('config.php');
$sql="SELECT * FROM ubereat.sales s join customers c on s.idclie=c.id join estado e on s.est=e.idestado join evalucion ev on s.id=ev.idsale where md5(s.id)='$id'";
$result=mysqli_query($db_link, $sql);
while ($row=mysqli_fetch_array($result)){
 
          
              ?><form action="add_eval.php" method="post">
      <center><table>
        <tr><td colspan="2"><h1>EVALUACION Y ESTADO DE  COMPRA</h1></td></tr>
<tr><td><h2>ESTADO DE PEDIDO:</h2></td><td>
  <select style="font-size:18pt" name="est">
    <option value="<?php echo $row[12]; ?>"><?php echo $row[13]; ?></option>
    <option value="2">EN CAMINO</option>
     <option value="1">ENTREGADO</option>
     <option value="3">PEDIDO</option>
  </select>
  <input type="hidden" name="cod" value="<?php echo $row[0]; ?>">
  <input type="hidden" name="clie" value="<?php echo md5($row[2]); ?>">
</td></tr>

<tr><td><h2>EVALUACION:</h2></td><?php if ($row[15]==0) {
        $eval='SIN EVALUACION';
      ?>
      <td style="border-bottom:1px solid #333;"> <?php echo $eval; ?> </td>
<?php }else{ 
  
?><td> 
<?php for ($i=0; $i < $row[15]; $i++) {  ?>
<img src="images/star.jpg"width="30" height="30">
<?php }?>
</td> 
<?php } ?></tr>
<tr><td colspan="2"><button><h2>GUARDAR CAMBIO</h2></button></td></tr>
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