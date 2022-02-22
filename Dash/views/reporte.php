<?php
if(isset($_GET['fecha_inicio'])>0 and isset($_GET['fecha_fin'])>0 and isset($_GET['id_us'])>0){
	$id_us = $_GET['id_us'];
	$fecha_inicio = $_GET['fecha_inicio'];
	$fecha_fin = $_GET['fecha_fin'];
}

require('../../fpdf184/fpdf.php');
require_once "../../Models/select_user.php";

class PDF extends FPDF{
	function Header()
{
    // Logo
    $this->Image('../public/logocecyt3.png',10,5,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,2,"REPORTE DE ASISTENCIA.",0,1,'C',0);
	$this->Cell(195,11,"DESDE: "  . $_GET['fecha_inicio'] . "  HASTA: " . $_GET['fecha_fin'],0,1,'C',0);

	$this->SetFont("Arial", "", 10);
	$this->Cell(20);
	$id_us = $_GET['id_us'];
	$articulo = new CEmpleadosM();
	$rspta = $articulo->ReportInUs($id_us);
	foreach($rspta as $row){
	$this->Cell(40,25,"NOMBRE: " . utf8_decode($row['nombre']),0,0,'C');
	$this->Cell(1,25,utf8_decode($row['apellidoPaterno']),0,0,'C');
	$this->Cell(28,25,utf8_decode($row['apellidoMaterno']),0,0,'C');
	$this->Cell(40,25,"CORREO: " . $row['correo'],0,0,'C');
	}
	$this->Cell(45,25, "FECHA: " . date('d-m-Y'), 0, 1, "C");	
	
}

    // Salto de línea

	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'PAGINA'.$this->PageNo().'/{nb}',0,0,'C');
	}
}


$pdf = new PDF("P", "mm", "letter");


$pdf->AliasNbPages();


$pdf->AddPage();


$pdf->Image('../public/sep.png',10,35,195,15);

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(158, 158, 158);
$pdf->Cell(7);
	$pdf->Cell(5,5,'Id',1, 0, 'C',true);
	$pdf->Cell(30,5, 'Num. Empleado',1, 0, 'C', true);
	$pdf->Cell(10,5, 'Area',1, 0, 'LR', true);
	$pdf->Cell(15,5, 'Puesto',1, 0, 'LR', 'C', true);
	$pdf->Cell(30,5, 'Hora Entrada',1, 0, 'C', true);
	$pdf->Cell(30,5, 'Fecha Entrada',1, 0, 'C', true);
	$pdf->Cell(30,5, 'Hora Salida',1, 0, 'C', true);
	$pdf->Cell(30,5, 'Fecha Salida',1, 0, 'C',true);


$pdf->Ln(5);


$articulo = new CEmpleadosM();
$rspta = $articulo->ReportIn($id_us,$fecha_inicio,$fecha_fin);



foreach($rspta as $row)
{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(7);
	$pdf->Cell(5,5, $row['id'],1, 0, 'C');
	$pdf->Cell(30,5, $row['numEmpleado'],1, 0, 'C');
	$pdf->Cell(10,5, $row['area'],1, 0, 'C');
	$pdf->Cell(15,5, $row['puesto'],1, 0, 'C');
	$pdf->Cell(30,5, $row['horaEntrada'],1, 0, 'C');
	$pdf->Cell(30,5, $row['fechaEntrada'],1, 0, 'C');
	$pdf->Cell(30,5, $row['horaSalida'],1, 0, 'C');
	$pdf->Cell(30,5, $row['fechaSalida'],1, 0, 'C');
	
	

	$pdf->Ln();
}




$pdf->Output();
?>