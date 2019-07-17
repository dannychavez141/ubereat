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
  echo $row[2];
          
              ?>
      <center><table>
        <tr><td><h1>EVALUAR COMPRA</h1></td></tr>

      </table></center>
   
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