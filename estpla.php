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
    div{ background-color: #FFFFFF;  }
    .centrado {
	position: absolute;
	top: 40%; left: 5%;
	width: 20%; height: 20%;
	text-align: center;  }

    </style>
<center>
<body>
	<h3>CUADRO ESTADISTICO DE CANTIDAD DE PLATILLOS MAS VENDIDOS</h3>
  <div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>

<?php require('config.php');
$query="SELECT platos(id) as c,name FROM ubereat.products where platos(id)>0 order by c  desc limit 5;";
$result=mysqli_query($db_link, $query);
$clie="";
$platos="";
?>
<table class='centrado' border="1"><tr><td colspan="2" bgcolor="#78AB46">LEYENDA</td></tr>
<tr bgcolor="#40BA4D"><td>PLATILLOS</td><td>CANTIDAD</td></tr>


<?php 
while ($row=mysqli_fetch_array($result)){
$clie=$clie."'".$row[1]."',";
$platos=$platos.$row[0].",";
?>
<tr><td><?php echo $row[1]; ?></td><td><?php echo $row[0]; ?></td></tr>
<?php  
}$clie=substr($clie,0,-1);
$platos=substr($platos,0,-1);
 ?>
 </table> 
	<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php echo $platos; ?>
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					<?php echo $clie; ?>
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>


</div>
</body>
</center>
</html>