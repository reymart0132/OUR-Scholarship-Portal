<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
if($_POST){
  require_once('resource/php/class/config.php');
  require_once('resource/php/functions/funct.php');
  $filename = findESfile($_POST['tn']);
  require_once('fpdf.php');
  require_once('fpdi/src/autoload.php');
  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('application/entrancescholarship/'.$filename);
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(8);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Image("signature/dr2.png", "113","51");
  $pdf->SetXY(113, 51);
  $pdf->Write(0, $_POST['duration']);
  $pdf->Image("signature/dr.png", "110","65", "10","3");
  $pdf->SetXY(110, 67);
  $pdf->Write(0, $_POST['tf']);
  $pdf->Image("signature/dr.png", "110","73", "10","3");
  $pdf->SetXY(110, 75);
  $pdf->Write(0, $_POST['mf']);
  $pdf->Image("signature/dr.png", "110","81", "10","3");
  $pdf->SetXY(110, 83);
  $pdf->Write(0, $_POST['of']);
  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/entrancescholarship/'.$filename);
  header('Location: admes.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}
 ?>
