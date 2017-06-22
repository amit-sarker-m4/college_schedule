
<?php
require_once("fpdf/dbcontroller.php");


$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT teacher_code, teacher_name, teacher_image, qualification, department, subject.subject_name FROM teacher, subject WHERE subject.subject_id=teacher.subject_id ");


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage(); //$pdf->AddPage('A4');



// Logo
$pdf->SetXY (50,10);
$pdf->Image('img/dbcl.jpg',10,6,12);

//Header
$pdf->SetXY (25,10);
$pdf->SetFont('Arial','B',16);	
$pdf->Write(5,'Dhaka Boys College');

//horizental line
$pdf->Line(10, 20, 250-50, 20);

//address
$pdf->SetXY (25,15);
$pdf->SetFont('Arial','',10);	
$pdf->Write(15,'Rd No 12, Dhaka 1230, Bangladesh');

//phone
$pdf->SetXY (25,19);
$pdf->SetFont('Arial','',10);
$pdf->Write(15,'Phone:+880 1712-549333');

//horizental line
$pdf->Line(10, 29, 250-50, 29);

//phone
$pdf->SetXY (25,30);
$pdf->SetFont('Arial','B',14);
$pdf->Write(15,'Teacher Information');




$pdf->SetXY (10,44);

$pdf->Cell(27,12,"Code",1);
$pdf->Cell(27,12,"Teacher",1);
$pdf->Cell(27,12,"Photo",1);
$pdf->Cell(27,12,"Qualification",1);
$pdf->Cell(27,12,"Department",1);
$pdf->Cell(27,12,"Subject",1);

$pdf->SetXY (90,44);
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(27,12,$column,1);
}




$pdf->Output();
?>
