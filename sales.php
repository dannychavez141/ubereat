<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas</title>
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
        <td height="37" align="right">
        
        <form action="result_sales.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
        </form>
     	</td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Seleccionar Productos </th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Categoria </th>
        <th style="border-bottom:1px solid #333;"> Nombre </th>
        <th style="border-bottom:1px solid #333;"> Precio </th>
        <th style="border-bottom:1px solid #333;"> Cantidad Stock </th>
        <th style="border-bottom:1px solid #333;"> Proveedor </th>
        <th style="border-bottom:1px solid #333;"> Hacer Pedido </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">S/ <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> uni. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="process_sales.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Pedir" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>
        
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

</body>
</html>
