<?php
	include 'plantilla2.php';
	require 'conexion.php';
$rec = $_GET['rec'];

	$query = "select s.id,c.username,c.name,c.address,c.contact from sales s join customers c on s.idclie=c.id where md5(s.id)='$rec'";
     
	$resultado = $mysqli->query($query);
	$pdf = new PDF('L','mm', array(180,120));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	while($row = $resultado->fetch_array())
	{
		if($row[0]<10){$bol='B-001-00';}
	if($row[0]<100 && $row[0]>=10){$bol='B-001-0';}
	if($row[0]<1000 && $row[0]>=100){$bol='B-001-';}
	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetX(125);
	$pdf->Cell(25,4, utf8_decode('Recibo N°:'),1,1,'C');
	$pdf->SetX(125);
	$cod=$row[0];
	$pdf->Cell(25,5,utf8_decode($bol.$row[0]),1,1,'C');
	$pdf->SetX(10);
	$pdf->Cell(50,4, 'DNI/RUC Cliente:'.utf8_decode($row[1]),0,1,'C');
	$pdf->SetX(10);
	$pdf->Cell(100,4, 'Nombres y Apellidos/Razon Social:'.utf8_decode($row[2]),0,1,'C');
	$pdf->SetX(10);
	$pdf->Cell(100,4, 'Direccion:'.utf8_decode($row[3]),0,1,'C');
	$pdf->SetX(10);
	$pdf->Cell(100,4, 'Telefono:'.utf8_decode($row[4]),0,1,'C');
	}

	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetX(15);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(25,6,'CANTIDAD',1,0,'C',1);
	$pdf->Cell(25,6,'CATEGORIA',1,0,'C',1);
	$pdf->Cell(40,6,'PLATILLO',1,0,'C',1);
	$pdf->Cell(30,6,'PRECIO UNI. S/',1,0,'C',1);
	$pdf->Cell(30,6,'MONTO TOTAL S/',1,1,'C',1);
	$pdf->SetFont('Arial','',8);
	$query = "SELECT ds.cant,p.category,p.name,p.retail FROM ubereat.det_sales ds join  products p on ds.idprod=p.id where  ds.idsale='$cod'";
     $total=0;
	$resultado = $mysqli->query($query);
while($row = $resultado->fetch_array())
	 {$pdf->SetX(15);
		$pdf->Cell(25,6,$row[0],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row[1]),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row[2]),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row[3]).'.00',1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row[3]*$row[0]).'.00',1,1,'C');
		$total=$total+($row[3]*$row[0]);
	}
	$pdf->SetX(15);
	$pdf->Cell(120,6,'TOTAL:',1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode($total).'.00',1,1,'C',1);
		


	$pdf->Output();
?>