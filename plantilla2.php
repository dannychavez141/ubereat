<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logorec.png', 2, 2, 40 );
			$this->SetFont('Arial','B',8);
			$this->Cell(3);
			$this->Cell(150,6, 'BOLETA DE VENTA',0,0,'C');
			$this->Line(50,15,130,15);
			$this->Line(2,105,200,105);
			$this->Ln(6);
			


		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Conserve Su Recibo',0,0,'C' );
		}		
	}
?>