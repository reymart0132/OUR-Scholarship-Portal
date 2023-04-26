<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
if($_POST){
  require_once('resource/php/class/config.php');
  require_once('resource/php/functions/funct.php');
  $filename = findEGfile($_POST['tn']);
  require_once('fpdf.php');
  require_once('fpdi/src/autoload.php');
  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('application/entrancegrant/'.$filename);
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(8);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Image("signature/dr2.png", "115","53");
  $pdf->SetXY(118, 56);
  $pdf->Write(0, $_POST['duration']);
  $pdf->Image("signature/dr.png", "115","65", "10","3");
  $pdf->SetXY(115, 67);
  $pdf->Write(0, $_POST['tf']);
  $pdf->Image("signature/dr.png", "115","73", "10","3");
  $pdf->SetXY(115, 75);
  $pdf->Write(0, $_POST['mf']);
  $pdf->Image("signature/dr.png", "115","80", "10","3");
  $pdf->SetXY(115, 82);
  $pdf->Write(0, $_POST['of']);
  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/entrancegrant/'.$filename);
  header('Location: admeg.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}
 ?>
