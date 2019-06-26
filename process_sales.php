<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas</title>
</head>
<?php error_reporting(0);
 include_once'./cabezera.php'; include 'config.php'; 
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
<table width="80%" border="0"  cellpadding="0" cellspacing="0"  align="center" >
      
      <tr>
        <td height="20" align="right">
        
        <form action="process_sales.php" method="get" ecntype="multipart/data-form">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Platillos..." /><input type="submit" id="btnsearch" value="Buscar" name="search" /> <a href="carrito.php?id=<?php echo $id;?>"><input type="button" id="btnsearch" value="Ver carrito" name="search" /></a>
        </form>
      </td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
      
    <table border="1" cellpadding="0" cellspacing="0"  width="80%" align="center">
    
     <tr>
     <th colspan="8"  height="30px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Seleccionar Platillos </th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Categoria </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Precio </th>
        <th style="border-bottom:1px solid #333;"> Stock </th>
        <th style="border-bottom:1px solid #333;"> Local </th>
         <th style="border-bottom:1px solid #333;"> Referencia </th>
         <th style="border-bottom:1px solid #333;"> Cantidad </th>
        <th style="border-bottom:1px solid #333;">Hacer Pedido</th>
      </tr>
      
        <!-- Search goes here! -->
 

  
      <!-- Search end here -->
      
       <?php
require('config.php');
if(isset($_GET['search'])){
            $query = $_GET['query'];

            $sql = "select * from products where category like '%$query%' or name like '%$query%'";

            $result = $db_link->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_array()){?>
            <tr align="center" style="height:35px">
        <td style="border-bottom:1px solid #333;"><?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"><?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">S/<?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"><?php echo $row['quantity']; ?>uni. </td>
        <td style="border-bottom:1px solid #333;"><?php echo $row['supplier']; ?> </td>
         <td style="border-bottom:1px solid #333;"> <img src="imgplatos/<?php echo $row['id'].'.'.$row['ext'];?>"width="150" height="150"> </td>
         <td style="border-bottom:1px solid #333;"><input type="number" name="cant" placeholder="Cantidad"></td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="process_sales.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Agregar" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>
        
        </td>
      </tr>
            <?php
          
              }

            }else{
              echo "<center>No records</center>";
            }
          }else{
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      <form action="agregar.php" method="post" ecntype="multipart/data-form">
      <tr align="center" style="height:35px">
        <td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> uni. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
         <td style="border-bottom:1px solid #333;"> <img src="imgplatos/<?php echo $row['id'].'.'.$row['ext'];?>"width="150" height="150"> </td>
          <td style="border-bottom:1px solid #333;width: 50px;">
            <select name="cant">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select></td>
        <td style="border-bottom:1px solid #333;">
<input type="hidden" name="idplato" value="<?php echo $row['id']; ?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Agregar" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;">
      
        </td>
      </tr>
       </form>
   <?php
}}?>
      
    </table>
    </form>
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
