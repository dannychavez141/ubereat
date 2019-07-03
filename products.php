<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Platillos</title>
</head>
<?php error_reporting(0);
 include_once'./cabezera.php';  ?>

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

<table width="83%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="741" align="right">
        
        <form action="products.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Platillo..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
        
        </td>
        
        <td width="131" height="37">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" id="btnadd" value="+Agregar Platillo" /></a>
        </td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="1" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
    
     <tr>
     <th colspan="9" align="center" height="55px" style="border-bottom:1px solid #033; background: #033; color:#FFF;"> Tabla - Informacion de Platillos</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Categoria </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Detalles </th>
        <th style="border-bottom:1px solid #333;"> Cantidad Stock </th>
        <th style="border-bottom:1px solid #333;"> Precio de Compra </th>
        <th style="border-bottom:1px solid #333;"> Precio Venta </th>
        <th style="border-bottom:1px solid #333;"> Proveedor </th>
        <th style="border-bottom:1px solid #333;"> Imagen </th>
        <th style="border-bottom:1px solid #333;"> Accion </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');
if(isset($_GET['search'])){
            $query = $_GET['query'];
        $query="SELECT * FROM products where concat(category,name,supplier) like '%$query%'";
$result=mysqli_query($db_link, $query);
if($result->num_rows > 0){
while ($row=mysqli_fetch_array($result)){?>

<tr align="center" style="height:25px">
        <td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['detalle']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> uni. </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['purchase']; ?> </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
         <td style="border-bottom:1px solid #333;"> <img src="imgplatos/<?php echo $row['id'].'.'.$row['ext'];?>"width="100" height="100"> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>
        </td>
      </tr>

            <?php
}
            }else{
              echo "<center>No Resultados</center>";
            }
          }else{
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['detalle']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> uni. </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['purchase']; ?> </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
         <td style="border-bottom:1px solid #333;"> <img src="imgplatos/<?php echo $row['id'].'.'.$row['ext'];?>"width="100" height="100"> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>
        </td>
      </tr>
   <?php
}}?>
      
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


<div id="popup-box1" class="popup-position">
<div id="popup-wrapper">
<div id="popup-container">
    <div id="popup-head-color1">
    <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">Formulario de Platillos y Bebidas</p>
    </div>
    <form action="add_item.php" method="POST" enctype="multipart/form-data">
    <table border="0" align="center">
    <tr>
    <td align="right">Categoria:</td>
    <td>
    <select name="category" id="txtbox">
    <option> Comida Rapida</option>
    <option> Postre </option>
    <option> Almuerzos</option>
    <option> Antojitos</option>
    <option> Chifa</option>
    <option> Parrilla</option>
    <option> Bebidas</option>
    </select>
    </td>
    </tr>
    <tr>
    <td align="right">Nombre:</td>
    <td><input type="text" id="txtbox" name="name" placeholder="Nombre" required maxlength="30"><br></td>
    </tr>
    <tr>
    <td align="right">Detalle:</td>
    <td>
   <textarea name="det" rows="2" cols="25" placeholder="Escribir detalle aqui" maxlength="150"></textarea>
    </tr>
    <tr>
    <td align="right">Cantidad:</td>
    <td><input type="number" id="txtbox" min="1" name="quantity" maxlength="11" placeholder="Cantidad" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Precio de Compra:</td>
    <td><input type="number" id="txtbox" name="purchase" maxlength="11" placeholder="Precio de Compra" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Precio de Venta:</td>
    <td><input type="number" id="txtbox" name="retail" maxlength="11" placeholder="Precio de Venta" required><br></td>
    </tr>
    <tr>
    <td align="right">Proveedor:</td>
    <td>
    <select name="supplier" id="txtbox">
    <?php
	$query="SELECT * FROM supplier";
	$result=mysqli_query($db_link, $query);
	while ($row=mysqli_fetch_array($result)){?>
    
	<option><?php echo $row['suppliername']; ?></option>
    					
	<?php
}?>
	</select>
</td>
<tr><td>Imagen Referencial</td><td><input type="file" id="txtbox" name="imgref"  required accept=".jpg, .png"></td></tr>


    </tr>
    
    <br>
    <tr  align="left">
    <td>&nbsp;  </td>
    <td><input type="SUBMIT" id="btnnav" value="Enviar"></a></td>
    </tr>
    
    </table>
    </form>

</div>
</div>
</div>

</body>
</html>
