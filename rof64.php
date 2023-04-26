<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('fpdf.php');
require_once('fpdi/src/autoload.php');
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init2.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/config.php';

if(empty($_GET['tn'])){
  header("HTTP/1.1 403 Forbidden");
}else{
  $tn = base64_decode(urldecode($_GET['tn']));
  $ES = findEGinfo($tn);
  if($ES !== null){
  $course =findCourseABV($ES[0]->course);
  $lastname=$ES[0]->lastname;
  $studentnumber=$ES[0]->studentnumber;
  $firstname=$ES[0]->firstname;
  $middlename=$ES[0]->middlename;
  $stype=$ES[0]->scholarshiptype;
  $middleI= substr($middlename,0,1);
  $date = date("d-M-y");


  $filename="ROF64".$course.$lastname.$firstname.$studentnumber.".pdf";

  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('forms/ROF064.pdf');
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(9);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->SetXY(35,45);
  $pdf->Write(0, $lastname);
  $pdf->SetXY(80,45);
  $pdf->Write(0, $firstname);
  $pdf->SetXY(128,45);
  $pdf->Write(0, $middleI);
  $pdf->SetXY(139,45);
  $pdf->Write(0, $course);
  $pdf->SetXY(174,45);
  $pdf->Write(0, $date);
  $pdf->SetXY(35,56);
  $pdf->Write(0, $stype);
  $pdf->SetXY(115,56);
  $pdf->Write(0,getSemester2()." ".getSY());
  // $pdf->Output('D');

  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/entrancegrant/'.$filename);
    header("location:rof63?tn=".urlencode(base64_encode($tn)));
  }else{
    header("HTTP/1.1 403 Forbidden");
  }
}
?>
