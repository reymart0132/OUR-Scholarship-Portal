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
  $ES = findESinfo($tn);
  if($ES !== null){
  $course =findCourseABV($ES[0]->course);
  $lastname=$ES[0]->lastname;
  $studentnumber=$ES[0]->studentnumber;
  $firstname=$ES[0]->firstname;
  $middlename=$ES[0]->middlename;
  $stype=$ES[0]->scholarshiptype;
  $middleI= substr($middlename,0,1);
  $date = date("d-M-y");
  $sem = getSemester();


  $filename="ROF13".$course.$lastname.$firstname.$studentnumber.".pdf";

  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('forms/ROF013.pdf');
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(9);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->SetXY(15,40);
  $pdf->Write(0, $lastname);
  $pdf->SetXY(65,40);
  $pdf->Write(0, $firstname);
  $pdf->SetXY(119,40);
  $pdf->Write(0, $middleI);
  $pdf->SetXY(139,40);
  $pdf->Write(0, $course);
  $pdf->SetXY(174,40);
  $pdf->Write(0, $date);
  $pdf->SetXY(25,53);
  $pdf->Write(0, $stype);
  $pdf->SetXY(115,53);
  $pdf->Write(0, "1st and 2nd Sem ".$sem);
  // $pdf->Output('D');

  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/entrancescholarship/'.$filename);
    header("location:rof14?tn=".urlencode(base64_encode($tn)));
  }else{
    header("HTTP/1.1 403 Forbidden");
  }
}
?>
