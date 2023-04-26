<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('fpdf.php');
require_once('fpdi/src/autoload.php');

$filename=$_POST["ln"].$_POST['stdnumber'].'.pdf';
$course = $_POST['course'];

$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile('forms/ROF013.pdf');
$template = $pdf->importPage(1);
$pdf->useTemplate($template);
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(9);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(20,43);
$pdf->Write(0, $_POST["ln"]);
$pdf->SetXY(52,43);
$pdf->Write(0, $_POST["fn"]);
// $pdf->Output('D');

$pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/pdfprototype/application/'.$filename);
header('Location: index.php');
?>
