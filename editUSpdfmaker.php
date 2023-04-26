<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
if($_POST){
  require_once('resource/php/class/config.php');
  require_once('resource/php/functions/funct.php');
  $filename = findUSfile($_POST['tn']);
  require_once('fpdf.php');
  require_once('fpdi/src/autoload.php');
  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('application/universityscholarship/'.$filename);
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(8);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Image("signature/dr.png", "140","162", "45","4");
  $pdf->SetXY(140, 165);
  $pdf->Write(0, $_POST['duration']);
  $pdf->Image("signature/dr.png", "30","163", "60","6");
  $pdf->SetXY(30, 165);
  $pdf->Write(0, $_POST['ta']);
  $pdf->Image("signature/dr.png", "110","179", "10","3.5");
  $pdf->SetXY(110, 180);
  $pdf->Write(0, $_POST['tf']);
  $pdf->Image("signature/dr.png", "110","185", "10","3.5");
  $pdf->SetXY(110, 188);
  $pdf->Write(0, $_POST['mf']);
  $pdf->Image("signature/dr.png", "110","193", "10","3.5");
  $pdf->SetXY(110, 196);
  $pdf->Write(0, $_POST['of']);
  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/universityscholarship/'.$filename);
  header('Location: admus.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}
 ?>
