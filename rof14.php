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
  $ES2= findESinfoData($ES[0]->studentnumber);
  if($ES !== null){
  $course =findCourseABV($ES[0]->course);
  $lastname=$ES[0]->lastname;
  $studentnumber=$ES[0]->studentnumber;
  $firstname=$ES[0]->firstname;
  $middlename=$ES[0]->middlename;
  $stype=$ES[0]->scholarshiptype;
  $formerschool=$ES2[0]->formerschool;
  $formerschooladdress=$ES2[0]->addressfs;
  $haddress=$ES2[0]->haddress;
  $caddress=$ES2[0]->caddress;
  $contacts=$ES2[0]->contacts;
  $fathername=$ES2[0]->fathername;
  $mothername=$ES2[0]->mothername;
  $foccupation=$ES2[0]->foccupation;
  $moccupation=$ES2[0]->moccupation;
  $femployer=$ES2[0]->femployer;
  $memployer=$ES2[0]->memployer;
  $fincome=$ES2[0]->fincome;
  $mincome=$ES2[0]->mincome;
  $genave=$ES2[0]->genave;
  $honors=$ES2[0]->honors;
  $rank=$ES2[0]->rank;
  $pob=$ES2[0]->birthplace;
  $awards1=$ES2[0]->awards1;
  $awards2=$ES2[0]->awards2;
  $awards3=$ES2[0]->awards3;
  $school1=$ES2[0]->school1;
  $school2=$ES2[0]->school2;
  $school3=$ES2[0]->school3;
  $org1=$ES2[0]->org1;
  $org2=$ES2[0]->org2;
  $org3=$ES2[0]->org3;
  $org4=$ES2[0]->org4;
  $position1=$ES2[0]->position1;
  $position2=$ES2[0]->position2;
  $position3=$ES2[0]->position3;
  $position4=$ES2[0]->position4;
  $dob = date_create($ES2[0]->dob);
  $dob=date_format($dob,"F-d-y");
  $middleI= substr($middlename,0,1);
  $date = date("d-M-y");
  $sem = getSemester();
  $fullname ="$firstname $middleI $lastname";
  $email = $ES2[0]->email;


  $filename="ROF14".$course.$lastname.$firstname.$studentnumber.".pdf";

  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('forms/ROF014.pdf');
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(9);
  $pdf->SetTextColor(0, 0, 0);

  $pdf->SetXY(110,39);
  if(strlen($formerschool) > 25){
    $y = 39;
    foreach( breakString($formerschool, 50) as $line){
      $pdf->Write(0,$line);
      $y = $y+3;
      $pdf->SetXY(110,$y);
      }
    }else{
      $pdf->Write(0,$formerschool);
    }

  $pdf->SetXY(110,50);
  if(strlen($formerschooladdress) > 25){
    $y = 50;
    foreach( breakString($formerschooladdress, 50) as $line){
      $pdf->Write(0,$line);
      $y = $y+3;
      $pdf->SetXY(110,$y);
      }
    }else{
      $pdf->Write(0,$formerschooladdress);
    }

    $pdf->SetXY(45,63);
    $pdf->Write(0,$lastname);

    $pdf->SetXY(85,63);
    if(strlen($firstname) > 25){
      $y = 63;
      foreach( breakString($firstname, 25) as $line){
        $pdf->Write(0,$line);
        $y = $y+3;
        $pdf->SetXY(85,$y);
        }
      }else{
        $pdf->Write(0,$firstname);
      }

      $pdf->SetXY(125,63);
      $pdf->Write(0,$middlename);

      $pdf->SetXY(165,63);
      $pdf->Write(0,$date);

      $pdf->SetXY(50,80);
      $pdf->Write(0,$dob);

      $pdf->SetXY(135,80);
      $pdf->Write(0,$pob);

      $pdf->SetXY(52,88);
      $pdf->Write(0,$haddress);
      $pdf->SetXY(61,96);
      $pdf->Write(0,$caddress);

      $pdf->SetXY(79,104);
      $pdf->Write(0,$contacts);

      $pdf->SetXY(40,115);
      $pdf->Write(0,$fathername);

      $pdf->SetXY(119,115);
      $pdf->Write(0,$mothername);

      $pdf->SetXY(46,124);
      $pdf->Write(0,$foccupation);

      $pdf->SetXY(124,124);
      $pdf->Write(0,$moccupation);

      $pdf->SetXY(55,132);
      $pdf->Write(0,$femployer);

      $pdf->SetXY(132,132);
      $pdf->Write(0,$memployer);

      $pdf->SetXY(55,140);
      $pdf->Write(0,$fincome);

      $pdf->SetXY(132,140);
      $pdf->Write(0,$mincome);

      $pdf->SetXY(90,148);
      $pdf->Write(0,$course);

      $pdf->SetXY(65,157);
      $pdf->Write(0,$honors);

      $pdf->SetXY(165,149);
      $pdf->Write(0,$rank);

      $pdf->SetXY(165,156);
      $pdf->Write(0,$genave);

      $pdf->SetXY(40,170);
      $pdf->Write(0,$awards1);
      $pdf->SetXY(40,175);
      $pdf->Write(0,$awards2);
      $pdf->SetXY(40,180);
      $pdf->Write(0,$awards3);

      $pdf->SetXY(115,170);
      $pdf->Write(0,$school1);
      $pdf->SetXY(115,175);
      $pdf->Write(0,$school2);
      $pdf->SetXY(115,180);
      $pdf->Write(0,$school3);

      $pdf->SetXY(115,206);
      $pdf->Write(0,$org1);
      $pdf->SetXY(115,211);
      $pdf->Write(0,$org2);
      $pdf->SetXY(115,216);
      $pdf->Write(0,$org3);
      $pdf->SetXY(115,222);
      $pdf->Write(0,$org4);

      $pdf->SetXY(35,206);
      $pdf->Write(0,$position1);
      $pdf->SetXY(35,211);
      $pdf->Write(0,$position2);
      $pdf->SetXY(35,216);
      $pdf->Write(0,$position3);
      $pdf->SetXY(35,222);
      $pdf->Write(0,$position4);

      $pdf->SetXY(35,232);
      $pdf->Write(0,$fullname."(SGD)");


      $pdf->SetXY(145,232);
      $pdf->Write(0,$date);



  // $pdf->Output('D');
    $open = 1;
    include "vendor/sendmail.php";
  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/entrancescholarship/'.$filename);
  header("location:esapplication?tn=$tn&status=Success");

  }else{
    header("HTTP/1.1 403 Forbidden");
  }
}
?>
