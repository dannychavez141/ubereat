<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Delivery de Comida - UberEat</title>
<script language="JavaScript"> 
function mueveReloj(){ 
      momentoActual = new Date() 
      hora = momentoActual.getHours() 
      minuto = momentoActual.getMinutes() 
      segundo = momentoActual.getSeconds() 

      str_segundo = new String (segundo) 
      if (str_segundo.length == 1) 
         segundo = "0" + segundo 

      str_minuto = new String (minuto) 
      if (str_minuto.length == 1) 
         minuto = "0" + minuto 

      str_hora = new String (hora) 
      if (str_hora.length == 1) 
         hora = "0" + hora 
 if (str_hora > 12) 
       { hora =hora -12;

  mon="PM";}else mon="AM"


      horaImprimible = hora + " : " + minuto + " : " + segundo +" "+mon;

      document.form_reloj.reloj.value = horaImprimible 

      setTimeout("mueveReloj()",1000) 
} 
</script> 
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">

<body onload="mueveReloj()">

<?php
session_start();
if(!isset($_SESSION['username'])){
   header('location:login.php');
   }
?>

<?php

if($_SESSION['access']=='Salesperson'){
   header('location:sales1.php');
   }
?>

<div id="container">
<div id="header">
<table cellspacing="0" width="100%" border="0" cellpadding="20px">
<tr>
   <td width="56%">
    <table width="41%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td width="80%" align="left"> <font size="12px">D</font><span style="font-size: 18px;">elivery <b>D</b>e <b>C</b>omida</span></td>
       </tr>
     </table></td>
    <td style="font-size:14px;">
      <table width="93%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         <th scope="col">Bienvenido: <?php echo $_SESSION['access'];?></th>
            <th scope="col">
         <?php
         
         include_once("date1.php"); 
         ?></th>
            <th scope="col" width="20px"><a href="logout.php">
            <input type="button" id="btnadd" value="Cerrar Sesión" align="middle" src="" />
            </a></th>
        </tr>
  </table></td>
    </tr>

</table>
</div>

<br><br><br><br><br>
<!-- Footer -->
<div id = "headnav"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>

   <td width="1053" height="62">
   <table width="669" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <th width="90" height="62" scope="col"><a href="index.php">Tablero</a></th>
       <th width="50" scope="col"><a href="sales.php">Ventas</a></th>
       <th width="80" scope="col"><a href="products.php">Platillos</a></th>
       <th width="90" scope="col"><a href="customers.php">Clientes</a></th>
       <th width="90" scope="col"><a href="supplier.php">Proveedor</a></th>
       <th width="112" scope="col"><a href="salesreport.php">Reporte de Ventas</a></th>
       </tr>
     </table>
      </td>
      
      <td width="13">
      <table border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td align="left" style="color:#FFF">
           <form name="form_reloj"> 
<input type="text" name="reloj" size="15" style="background-color : Black; color : White; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()"> 
</form> 
            </td>
        </tr>
      </table>
      </td>

</tr>
</table>
</div>
</body>

</html>