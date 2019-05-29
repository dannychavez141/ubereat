<!DOCTYPE html>
<?php error_reporting(0);
 include_once'./cabezera.php';  ?>
<br>

<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
      
      <tr>
      <form action="salesreport.php" method="get" ecntype="multipart/data-form">
        <td width="48%" height="37" align="right"><input type="text" name="d1" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="2015-05-13" required /></td>
        <td width="15%" align="left"> <input type="text" name="d2" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="2015-06-13" required  /> </td>
        <td width="0%" align="left"><input type="submit" id="btnsearch" value="Buscar" name="search" /></td>
        </form>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Resumen de Ventas </th>
    </tr>
    
      <tr height="30px">
      	<th style="border-bottom:1px solid #333;"> Fecha </th>
      	<th style="border-bottom:1px solid #333;"> Clientes </th>
        <th style="border-bottom:1px solid #333;"> Producto Vendido </th>
        <th style="border-bottom:1px solid #333;"> Cantidad Vendida </th>
        <th style="border-bottom:1px solid #333;"> Monto Pagado </th>
        <th style="border-bottom:1px solid #333;"> Ganancias </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');

if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];
			
$query="SELECT * FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['dates']; ?> </td>
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['customers']; ?> </td>
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row['total']; ?> </td>
        <td style="border-bottom:1px solid #333;">$ <?php echo $row['profit']; ?> </td>
      </tr>
   <?php
}}?>
      
    </table>
    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom-color: #030; border-right-color: #030; border-bottom-style: solid; border-right-style: solid; border-bottom-width: 1px; border-right-width: 1px;">
      <tr>
        <td width="20%" style="border-left-color: #030; border-left-style: solid; border-left-width: 1px;">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="39%">&nbsp;</td>
        <td width="11%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px; border-left-color: #030; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px; height:35px;">Ventas</td>
        <td width="10%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px ; height:35px;">Ganancia</td>
      </tr>
      <tr>
        <td style="border-bottom-color: #030; border-bottom-style: none; border-bottom-width: 1px; border-right-width: 1px; border-top-width: 1px; border-left-color: #030; border-left-style: solid; border-left-width: 1px;">Total Ingresos:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="border-left-color: #030; height:35px; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px;">
        
        <?php
			if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];
				$view1 = "SELECT sum(total) FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
				$results=mysqli_query($db_link, $view1);
				for($i=0; $rows = mysqli_fetch_array($results); $i++){
				$total=$rows['sum(total)'];
				echo "$"." ".$total;
				}
			}
	  ?>
        
        </td>
        <td height = "35px">
        
        <?php
		if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];

				$view2 = "SELECT sum(profit) FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
				$results1=mysqli_query($db_link, $view2);
				for($i=0; $rowss = mysqli_fetch_array($results1); $i++){
				$profit=$rowss['sum(profit)'];
				echo "$"." ".$profit;
				}
		}
	  ?>
        
        </td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
  </tr>
</table>

<br>
<br><br>
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