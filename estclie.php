<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Delivery de Comida - UberEat</title>
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">



<?php
  include_once'./cabezera.php'; 
?>
<script src="js/Chart.min.js"></script>
    <script src="js/samples/utils.js"></script>
<br>
<div id="bdcontainer">
<style>
canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    div{ background-color: #FFFFFF;  }
    .centrado {
    position: absolute;
    top: 30%; left: 2%;
    width: 10%; height: 10%;
    text-align: center;  }
    </style>
<center>
<body>
    <div style="width: 70%" backgroundColor="white">
        <canvas id="canvas"></canvas>
    </div>
<?php require('config.php');
$query="select cantcompras(id) as c,name  from customers  order by c desc limit 5";
$result=mysqli_query($db_link, $query);
$clie="";
$compras="";
?>
<table class='centrado' border="1"><tr><td colspan="2" bgcolor="#78AB46">LEYENDA</td></tr>
<tr bgcolor="#40BA4D"><td>CLIENTE</td><td>COMPRAS</td></tr>

<?php 
while ($row=mysqli_fetch_array($result)){
$clie=$clie."'".$row[1]."',";
$compras=$compras.$row[0].",";
?>
<tr><td><?php echo $row[1]; ?></td><td><?php echo $row[0]; ?></td></tr>
<?php  
}$clie=substr($clie,0,-1);
$compras=substr($compras,0,-1);
 ?>
</table> 
    <script>
        var barChartData = {
            labels: [<?php echo $clie; ?>],
            datasets: [{
                label: 'COMPRAS REALIZADAS',
                backgroundColor: [
                    window.chartColors.purple,
                    window.chartColors.red,
                    window.chartColors.blue,
                    window.chartColors.yelow,
                    window.chartColors.green
                ],
                yAxisID: 'y-axis-1',
                data: [
                    <?php echo $compras; ?>
                   
                ]
            }]

        };
        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'GRAFICO ESTADISTICO DE CLIENTES FRECUENTES'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',
                            gridLines: {
                                drawOnChartArea: false
                            }
                        }],
                    }
                }
            });
        };

       
    </script>


</div>
</center>

</body>
</html>

