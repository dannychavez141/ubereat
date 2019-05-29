<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proveedor - Platea21</title>
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

<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="750" align="right">
        
        <form action="result_supplier.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Proveedor..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
        
        </td>
        
        <td width="127" height="37" align="right">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Agregar Proveedor" /></a></td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #066; color:#033; border-radius:3px;">
    
     <tr>
     <th colspan="6" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Tabla - Informacion Proveedor</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Nombre de Proveedor </th>
        <th style="border-bottom:1px solid #333;"> Persona de Contacto </th>
        <th style="border-bottom:1px solid #333;"> Direccion </th>
        <th style="border-bottom:1px solid #333;"> Numero Telefonico </th>
        <th style="border-bottom:1px solid #333;"> Notas </th>
        <th style="border-bottom:1px solid #333;"> Accion </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');
$query="SELECT * FROM supplier";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['suppliername']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactperson']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['address']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactno']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['note']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_supplier.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a href="delete_supplier.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Eliminar" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
        
        </td>
      </tr>
   <?php
}?>
      
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
    <div id="popup-head-color2">
    <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Formulario Agregar Proveedor </p>
    </div>
    <br>
    <form action="add_supplier.php" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Nombre Proveedor:</td>
    <td><input type="text" id="txtbox" name="suppliername" placeholder="Proveedor" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Persona de contacto:</td>
    <td><input type="text" id="txtbox" name="contactperson" placeholder="Contacto" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Direccion:</td>
    <td><input type="text" id="txtbox" name="address" placeholder="Direccion" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Numero Telefonico:</td>
    <td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="numero" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Notas:</td>
    <td><input type="text" id="txtbox" name="note" placeholder="note" required><br></td>
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
