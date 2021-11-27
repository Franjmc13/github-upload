<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('ToolAdmin1.png',87,8,33);
			$this->Ln(25);
			$this->SetFont('Arial','B',10);
			$this->Cell(80);
			$this->Cell(30,10,'Herramientas',0,0,'C');
			$this->Ln(20);
			$this->Cell(25,10,'Categoria',1,0,'C',0);
			$this->Cell(40,20,'Tipo',1,0,'C',0);
			$this->Cell(95,10,'Nombre',1,2,'C',0);
			$this->Cell(35,10,'Marca',1,0,'C',0);
			$this->Cell(25,10,'Medida',1,0,'C',0);
			$this->Cell(20,10,'Cantidad',1,0,'C',0);
			$this->Cell(15,10,'Sitio',1,1,'C',0);
		}	
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	require "conexion.php";
	$herramientas="SELECT * FROM herramientas";
	$resHerramientas=$conexion->query($herramientas);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',10);

	while($row = $resHerramientas->fetch_assoc())
	{
		$pdf->Cell(25,10,$row['Categoria'],1,0,'C',0);
		$pdf->Cell(40,10,$row['Tipo'],1,0,'C',0);
		$pdf->Cell(95,10,$row['Nombre'],1,2,'C',0);
		$pdf->Cell(35,10,$row['Marca'],1,0,'C',0);
		$pdf->Cell(25,10,$row['Medida'],1,0,'C',0);
		$pdf->Cell(20,10,$row['Cantidad'],1,0,'C',0);
		$pdf->Cell(15,10,$row['Sitio'],1,1,'C',0);
	}
	$pdf->Output();
?>
