<?php 
	include("libs/fpdf/fpdf.php");
	include("class/markup.class.php");
	include("class/adapter.class.php");

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Image('assets/0d905155af27e4c0c8dca40d6d992318.jpg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());
	$pdf->SetFont('Times','',12);

	$pdf->Cell(50,5,'NOMBRE',1,0,'L',0);
	$pdf->Cell(50,5,'APELLIDO',1,0,'L',0);
	$pdf->Cell(40,5,'CIUDAD',1,0,'L',0);
	$pdf->Cell(40,5,'DIRECCION',1,0,'L',0);

	$results = Adapter::getUsers();
	if($results){
		while( $fila = $results->fetch_assoc() ){
			$pdf->Ln();
			$pdf->Cell(50,5,$fila['name'],1,0,'L',0);
			$pdf->Cell(50,5,$fila['surname'],1,0,'L',0);
			$pdf->Cell(40,5,$fila['city'],1,0,'L',0);
			$pdf->Cell(40,5,$fila['adress'],1,0,'L',0);
		}
	}else{
		$pdf->Cell(180,5,'NO DATA',1,0,'L',0);
	}
	
	$pdf->Output();

?>