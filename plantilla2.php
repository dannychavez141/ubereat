<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logounu.jpeg', 1, 1, 10 );
			$this->SetFont('Arial','B',7);
			$this->Cell(3);
			$this->Cell(20,6, 'BOLETA DE RECARGA',0,0,'C');
			$this->Line(2,15,42,15);
			$this->Line(2,80,42,80);
			$this->Ln(6);
			


		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Conserve Su Ticket',0,0,'C' );
		}		
	}
?>