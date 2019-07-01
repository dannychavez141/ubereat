<?php
	include 'plantilla2.php';
	require 'conexion.php';
$cod = $_GET['cod'];
$rec = $_GET['rec'];

	$query = "SELECT r.CodAlumno,concat(a.ApepaAlum,' ',ApemaAlum,' ',a.NombreAlum) ,r.Fecha as fecha,r.Hora as hora,r.Monto  as monto,r.idUsuario, concat(NombreUsu,' ',ApepaUsu,' ',ApemaUsu) as tipo,r.Idrecarga FROM bdcontrolcomedor.controlrecarga r join usuario u on r.idUsuario=u.idUsuario join alumno a on r.CodAlumno=a.CodAlumno where r.Idrecarga='$rec' ";
     
	$resultado = $mysqli->query($query);
	
	while($row = $resultado->fetch_array())
	{
		if($row[7]<10){$bol='B-001-00';}
	if($row[7]<100 && $row[7]>=10){$bol='B-001-0';}
	if($row[7]<1000 && $row[7]>=100){$bol='B-001-';}
	$pdf = new PDF('P','mm', array(45,100));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetX(10);
	$pdf->Cell(25,4, utf8_decode('Recibo N°:'),0,1,'C');
	$pdf->Cell(25,5,utf8_decode($bol.$row[7]),0,1,'C');
	$pdf->SetX(10);
	$pdf->Cell(10,4, 'Codigo Alumno:',0,1,'C');
	$pdf->Cell(20,5,utf8_decode($row[0]),0,1,'C');
	$pdf->SetX(10);
	$pdf->Cell(20,4, 'Apellidos y Nombres:',0,1,'C');
	$pdf->SetX(15);
	$pdf->Cell(15,5,utf8_decode($row[1]),0,1,'C');
		$pdf->SetX(10);
	$pdf->SetX(10);
	$pdf->Cell(25,4, 'Fecha:',0,1,'C');
		$pdf->Cell(25,5,utf8_decode($row[2]),0,1,'C');
	
		$pdf->SetX(10);
		$pdf->Cell(25,4, 'Hora:',0,1,'C');
		$pdf->Cell(25,5,utf8_decode($row[3]),0,1,'C');
		
		$pdf->SetX(10);
		$pdf->Cell(25,5, 'Monto Recargado:',0,1,'C');
		$pdf->Cell(25,4,utf8_decode($row[4]).'.00',0,1,'C');
	
		$pdf->SetX(10);
		$pdf->Cell(25,4, 'Usuario:',0,1,'C');
		$pdf->Cell(25,5,utf8_decode($row[6]),0,1,'C');
	}

	$pdf->Output();
?>