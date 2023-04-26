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
  $ES = findUSinfo($tn);
  if($ES !== null){
  $course =findCourseABV($ES[0]->course);
  $lastname=$ES[0]->lastname;
  $studentnumber=$ES[0]->studentnumber;
  $firstname=$ES[0]->firstname;
  $middlename=$ES[0]->middlename;
  $Mi = substr($middlename, 0, 1);
  $stype=$ES[0]->scholarshiptype;
  $status=$ES[0]->stats;
  $pgrant=$ES[0]->pgrant;
  $email=$ES[0]->email;
  $GWA=$ES[0]->GWA;
  $middleI= substr($middlename,0,1);
  $date = date("d-M-y");
  $sem = getSemester();
  $fullname = $lastname." ". $firstname." ".$middlename;


  $filename="ROF15".getSemester2().$course.$lastname.$firstname.$studentnumber.".pdf";

  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('forms/ROF015.pdf');
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(9);
  $pdf->SetTextColor(0, 0, 0);

  if($status == "New"){
    $pdf->SetXY(15,18);
    $pdf->Write(0,"X");
  }else{
    $pdf->SetXY(15,29);
    $pdf->Write(0,"X");
  }

  $pdf->SetFontSize(7);
  $pdf->SetXY(20,43);
  $pdf->Write(0,$studentnumber);

  $pdf->SetXY(50,43);
  $pdf->Write(0,$lastname);

  // write Firstname
  $pdf->SetXY(92,43);
  if(strlen($firstname) > 25){
    $y = 43;
    foreach( breakString($_POST["Firstname"], 25) as $line){
      $pdf->Write(0,$line);
      $y = $y+2;
      $pdf->SetXY(92,$y);
    }
  }else{
    $pdf->Write(0,$firstname);
  }

  // write Middle Name
  if(!empty($Mi)){
  $pdf->SetXY(132,43);
  $pdf->Write(0,$Mi);
  }
  // $pdf->Output('D');

  $pdf->SetXY(145,43);
  if(strlen($course) > 25){
    $y = 43;
    foreach( breakString($course, 25) as $line){
      $pdf->Write(0,$line);
      $y = $y+2;
      $pdf->SetXY(145,$y);
    }
  }else{
    $pdf->Write(0,$course);
  }

  $pdf->SetXY(185,43);
  $YAS = $_GET["yl"].$_GET['st'];
  $pdf->Write(0,$YAS);


  if($_GET["duration"] !=""){
    $pdf->SetXY(140, 165);
    $pdf->Write(0, $_GET['duration']);
  }

  if($_GET["discount"] !==""){
    $pdf->SetXY(110, 180);
    $pdf->Write(0, $_GET['discount']);
  }


  if(getSemester2() == "2nd Semester"){
    //if first sem
    $pdf->SetXY(67,58);
    $pdf->Write(0,getSY());
    $pdf->SetFontSize(6);
    $pdf->SetXY(14,72);
    if(strlen($_SESSION["grades"][0]["subjectname"]) > 25){
      $y = 72;
      foreach( breakString($_SESSION["grades"][0]["subjectname"], 20) as $line){
        $pdf->Write(0,$line);
        $y = $y+2;
        $pdf->SetXY(14,$y);
      }
    }else{
        $pdf->Write(0,$_SESSION["grades"][0]["subjectname"]);
    }
      //s1rating
      $pdf->SetFontSize(8);
      $pdf->SetXY(57,72);
      $pdf->Write(0,$_SESSION["grades"][0]["grade"]);

      //s1unit
      $pdf->SetXY(75,72);
      $pdf->Write(0,$_SESSION["grades"][0]["unit"]);

      //s1unit
      $pdf->SetXY(95,72);
      $pdf->Write(0,$_SESSION["grades"][0]["wa"]);

      if(!empty($_SESSION["grades"][1]['subjectname']) && !empty($_SESSION["grades"][1]['grade']) && !empty($_SESSION["grades"][1]['unit']) && !empty($_SESSION["grades"][1]['wa'])){
        $pdf->SetFontSize(6);
        //subject1
        $pdf->SetXY(14,79);
        if(strlen($_SESSION["grades"][1]["subjectname"]) > 25){
          $y = 79;
          foreach( breakString($_SESSION["grades"][1]["subjectname"], 20) as $line){
            $pdf->Write(1,$line);
            $y = $y+2;
            $pdf->SetXY(14,$y);
          }
        }else{
              $pdf->Write(0,$_SESSION["grades"][1]["subjectname"]);
          }
          //s1rating
          $pdf->SetFontSize(8);
          $pdf->SetXY(57,80);
          $pdf->Write(0,$_SESSION["grades"][1]["grade"]);

          //s1unit
          $pdf->SetXY(75,80);
          $pdf->Write(0,$_SESSION["grades"][1]["unit"]);

          //s1unit
          $pdf->SetXY(95,80);
          $pdf->Write(0,$_SESSION["grades"][01]["wa"]);
          }
          if(!empty($_SESSION["grades"][2]['subjectname']) && !empty($_SESSION["grades"][2]['grade']) && !empty($_SESSION["grades"][2]['unit']) && !empty($_SESSION["grades"][2]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,86);
            if(strlen($_SESSION["grades"][2]["subjectname"]) > 25){
              $y = 86;
              foreach( breakString($_SESSION["grades"][2]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][2]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,87);
              $pdf->Write(0,$_SESSION["grades"][2]["grade"]);

              //s1unit
              $pdf->SetXY(75,87);
              $pdf->Write(0,$_SESSION["grades"][2]["unit"]);

              //s1unit
              $pdf->SetXY(95,87);
              $pdf->Write(0,$_SESSION["grades"][2]["wa"]);

            }

          if(!empty($_SESSION["grades"][3]['subjectname']) && !empty($_SESSION["grades"][3]['grade']) && !empty($_SESSION["grades"][3]['unit']) && !empty($_SESSION["grades"][3]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,93);
            if(strlen($_SESSION["grades"][3]["subjectname"]) > 25){
              $y = 93;
              foreach( breakString($_SESSION["grades"][3]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][3]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,94);
              $pdf->Write(0,$_SESSION["grades"][3]["grade"]);

              //s1unit
              $pdf->SetXY(75,94);
              $pdf->Write(0,$_SESSION["grades"][3]["unit"]);

              //s1unit
              $pdf->SetXY(95,94);
              $pdf->Write(0,$_SESSION["grades"][3]["wa"]);
          }

          if(!empty($_SESSION["grades"][4]['subjectname']) && !empty($_SESSION["grades"][4]['grade']) && !empty($_SESSION["grades"][4]['unit']) && !empty($_SESSION["grades"][4]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,100);
            if(strlen($_SESSION["grades"][4]["subjectname"]) > 25){
              $y = 100;
              foreach( breakString($_SESSION["grades"][4]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][4]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,101);
              $pdf->Write(0,$_SESSION["grades"][4]["grade"]);

              //s1unit
              $pdf->SetXY(75,101);
              $pdf->Write(0,$_SESSION["grades"][4]["unit"]);

              //s1unit
              $pdf->SetXY(95,101);
              $pdf->Write(0,$_SESSION["grades"][4]["wa"]);
          }

          if(!empty($_SESSION["grades"][5]['subjectname']) && !empty($_SESSION["grades"][5]['grade']) && !empty($_SESSION["grades"][5]['unit']) && !empty($_SESSION["grades"][5]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,107);
            if(strlen($_SESSION["grades"][5]["subjectname"]) > 25){
              $y = 107;
              foreach( breakString($_SESSION["grades"][5]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][5]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,108);
              $pdf->Write(0,$_SESSION["grades"][5]["grade"]);

              //s1unit
              $pdf->SetXY(75,108);
              $pdf->Write(0,$_SESSION["grades"][5]["unit"]);

              //s1unit
              $pdf->SetXY(95,108);
              $pdf->Write(0,$_SESSION["grades"][5]["wa"]);
          }

          if(!empty($_SESSION["grades"][6]['subjectname']) && !empty($_SESSION["grades"][6]['grade']) && !empty($_SESSION["grades"][6]['unit']) && !empty($_SESSION["grades"][6]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,113);
            if(strlen($_SESSION["grades"][6]["subjectname"]) > 25){
              $y = 113;
              foreach( breakString($_SESSION["grades"][6]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][6]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,115);
              $pdf->Write(0,$_SESSION["grades"][6]["grade"]);

              //s1unit
              $pdf->SetXY(75,115);
              $pdf->Write(0,$_SESSION["grades"][6]["unit"]);

              //s1unit
              $pdf->SetXY(95,115);
              $pdf->Write(0,$_SESSION["grades"][6]["wa"]);
          }

          if(!empty($_SESSION["grades"][7]['subjectname']) && !empty($_SESSION["grades"][7]['grade']) && !empty($_SESSION["grades"][7]['unit']) && !empty($_SESSION["grades"][7]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,121);
            if(strlen($_SESSION["grades"][7]["subjectname"]) > 25){
              $y = 121;
              foreach( breakString($_SESSION["grades"][7]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][7]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,122);
              $pdf->Write(0,$_SESSION["grades"][7]["grade"]);

              //s1unit
              $pdf->SetXY(75,122);
              $pdf->Write(0,$_SESSION["grades"][7]["unit"]);

              //s1unit
              $pdf->SetXY(95,122);
              $pdf->Write(0,$_SESSION["grades"][7]["wa"]);
          }

          if(!empty($_SESSION["grades"][8]['subjectname']) && !empty($_SESSION["grades"][8]['grade']) && !empty($_SESSION["grades"][8]['unit']) && !empty($_SESSION["grades"][8]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,128);
            if(strlen($_SESSION["grades"][8]["subjectname"]) > 25){
              $y = 128;
              foreach( breakString($_SESSION["grades"][8]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][8]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,129);
              $pdf->Write(0,$_SESSION["grades"][8]["grade"]);

              //s1unit
              $pdf->SetXY(75,129);
              $pdf->Write(0,$_SESSION["grades"][8]["unit"]);

              //s1unit
              $pdf->SetXY(95,129);
              $pdf->Write(0,$_SESSION["grades"][8]["wa"]);
          }

          if(!empty($_SESSION["grades"][9]['subjectname']) && !empty($_SESSION["grades"][9]['grade']) && !empty($_SESSION["grades"][9]['unit']) && !empty($_SESSION["grades"][9]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,135);
            if(strlen($_SESSION["grades"][9]["subjectname"]) > 25){
              $y = 135;
              foreach( breakString($_SESSION["grades"][9]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][9]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,136);
              $pdf->Write(0,$_SESSION["grades"][9]["grade"]);

              //s1unit
              $pdf->SetXY(75,136);
              $pdf->Write(0,$_SESSION["grades"][9]["unit"]);

              //s1unit
              $pdf->SetXY(95,136);
              $pdf->Write(0,$_SESSION["grades"][9]["wa"]);
          }

          if(!empty($_SESSION["grades"][10]['subjectname']) && !empty($_SESSION["grades"][10]['grade']) && !empty($_SESSION["grades"][10]['unit']) && !empty($_SESSION["grades"][10]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(14,142);
            if(strlen($_SESSION["grades"][10]["subjectname"]) > 25){
              $y = 142;
              foreach( breakString($_SESSION["grades"][10]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(14,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][10]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(57,144);
              $pdf->Write(0,$_SESSION["grades"][10]["grade"]);

              //s1unit
              $pdf->SetXY(75,144);
              $pdf->Write(0,$_SESSION["grades"][10]["unit"]);

              //s1unit
              $pdf->SetXY(95,144);
              $pdf->Write(0,$_SESSION["grades"][10]["wa"]);
            }

  }else{
    //if secondsem or summer
    $pdf->SetXY(167,58);
    $pdf->Write(0,getSY());
    $pdf->SetFontSize(6);
    $pdf->SetXY(109,72);
    if(strlen($_SESSION["grades"][0]["subjectname"]) > 25){
      $y = 72;
      foreach( breakString($_SESSION["grades"][0]["subjectname"], 20) as $line){
        $pdf->Write(0,$line);
        $y = $y+2;
        $pdf->SetXY(109,$y);
      }
    }else{
        $pdf->Write(0,$_SESSION["grades"][0]["subjectname"]);
    }
      //s1rating
      $pdf->SetFontSize(8);
      $pdf->SetXY(152,72);
      $pdf->Write(0,$_SESSION["grades"][0]["grade"]);

      //s1unit
      $pdf->SetXY(170,72);
      $pdf->Write(0,$_SESSION["grades"][0]["unit"]);

      //s1unit
      $pdf->SetXY(190,72);
      $pdf->Write(0,$_SESSION["grades"][0]["wa"]);

      if(!empty($_SESSION["grades"][1]['subjectname']) && !empty($_SESSION["grades"][1]['grade']) && !empty($_SESSION["grades"][1]['unit']) && !empty($_SESSION["grades"][1]['wa'])){
        $pdf->SetFontSize(6);
        //subject1
        $pdf->SetXY(109,79);
        if(strlen($_SESSION["grades"][1]["subjectname"]) > 25){
          $y = 79;
          foreach( breakString($_SESSION["grades"][1]["subjectname"], 20) as $line){
            $pdf->Write(1,$line);
            $y = $y+2;
            $pdf->SetXY(109,$y);
          }
        }else{
              $pdf->Write(0,$_SESSION["grades"][1]["subjectname"]);
          }
          //s1rating
          $pdf->SetFontSize(8);
          $pdf->SetXY(152,80);
          $pdf->Write(0,$_SESSION["grades"][1]["grade"]);

          //s1unit
          $pdf->SetXY(170,80);
          $pdf->Write(0,$_SESSION["grades"][1]["unit"]);

          //s1unit
          $pdf->SetXY(190,80);
          $pdf->Write(0,$_SESSION["grades"][01]["wa"]);
          }
          if(!empty($_SESSION["grades"][2]['subjectname']) && !empty($_SESSION["grades"][2]['grade']) && !empty($_SESSION["grades"][2]['unit']) && !empty($_SESSION["grades"][2]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,86);
            if(strlen($_SESSION["grades"][2]["subjectname"]) > 25){
              $y = 86;
              foreach( breakString($_SESSION["grades"][2]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][2]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,87);
              $pdf->Write(0,$_SESSION["grades"][2]["grade"]);

              //s1unit
              $pdf->SetXY(170,87);
              $pdf->Write(0,$_SESSION["grades"][2]["unit"]);

              //s1unit
              $pdf->SetXY(190,87);
              $pdf->Write(0,$_SESSION["grades"][2]["wa"]);

            }

          if(!empty($_SESSION["grades"][3]['subjectname']) && !empty($_SESSION["grades"][3]['grade']) && !empty($_SESSION["grades"][3]['unit']) && !empty($_SESSION["grades"][3]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,93);
            if(strlen($_SESSION["grades"][3]["subjectname"]) > 25){
              $y = 93;
              foreach( breakString($_SESSION["grades"][3]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][3]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,94);
              $pdf->Write(0,$_SESSION["grades"][3]["grade"]);

              //s1unit
              $pdf->SetXY(170,94);
              $pdf->Write(0,$_SESSION["grades"][3]["unit"]);

              //s1unit
              $pdf->SetXY(190,94);
              $pdf->Write(0,$_SESSION["grades"][3]["wa"]);
          }

          if(!empty($_SESSION["grades"][4]['subjectname']) && !empty($_SESSION["grades"][4]['grade']) && !empty($_SESSION["grades"][4]['unit']) && !empty($_SESSION["grades"][4]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,100);
            if(strlen($_SESSION["grades"][4]["subjectname"]) > 25){
              $y = 100;
              foreach( breakString($_SESSION["grades"][4]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][4]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,101);
              $pdf->Write(0,$_SESSION["grades"][4]["grade"]);

              //s1unit
              $pdf->SetXY(170,101);
              $pdf->Write(0,$_SESSION["grades"][4]["unit"]);

              //s1unit
              $pdf->SetXY(190,101);
              $pdf->Write(0,$_SESSION["grades"][4]["wa"]);
          }

          if(!empty($_SESSION["grades"][5]['subjectname']) && !empty($_SESSION["grades"][5]['grade']) && !empty($_SESSION["grades"][5]['unit']) && !empty($_SESSION["grades"][5]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,107);
            if(strlen($_SESSION["grades"][5]["subjectname"]) > 25){
              $y = 107;
              foreach( breakString($_SESSION["grades"][5]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][5]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,108);
              $pdf->Write(0,$_SESSION["grades"][5]["grade"]);

              //s1unit
              $pdf->SetXY(170,108);
              $pdf->Write(0,$_SESSION["grades"][5]["unit"]);

              //s1unit
              $pdf->SetXY(190,108);
              $pdf->Write(0,$_SESSION["grades"][5]["wa"]);
          }

          if(!empty($_SESSION["grades"][6]['subjectname']) && !empty($_SESSION["grades"][6]['grade']) && !empty($_SESSION["grades"][6]['unit']) && !empty($_SESSION["grades"][6]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,113);
            if(strlen($_SESSION["grades"][6]["subjectname"]) > 25){
              $y = 113;
              foreach( breakString($_SESSION["grades"][6]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(113,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][6]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,115);
              $pdf->Write(0,$_SESSION["grades"][6]["grade"]);

              //s1unit
              $pdf->SetXY(170,115);
              $pdf->Write(0,$_SESSION["grades"][6]["unit"]);

              //s1unit
              $pdf->SetXY(190,115);
              $pdf->Write(0,$_SESSION["grades"][6]["wa"]);
          }

          if(!empty($_SESSION["grades"][7]['subjectname']) && !empty($_SESSION["grades"][7]['grade']) && !empty($_SESSION["grades"][7]['unit']) && !empty($_SESSION["grades"][7]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,121);
            if(strlen($_SESSION["grades"][7]["subjectname"]) > 25){
              $y = 121;
              foreach( breakString($_SESSION["grades"][7]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(114,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][7]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,122);
              $pdf->Write(0,$_SESSION["grades"][7]["grade"]);

              //s1unit
              $pdf->SetXY(170,122);
              $pdf->Write(0,$_SESSION["grades"][7]["unit"]);

              //s1unit
              $pdf->SetXY(190,122);
              $pdf->Write(0,$_SESSION["grades"][7]["wa"]);
          }

          if(!empty($_SESSION["grades"][8]['subjectname']) && !empty($_SESSION["grades"][8]['grade']) && !empty($_SESSION["grades"][8]['unit']) && !empty($_SESSION["grades"][8]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,128);
            if(strlen($_SESSION["grades"][8]["subjectname"]) > 25){
              $y = 128;
              foreach( breakString($_SESSION["grades"][8]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][8]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,129);
              $pdf->Write(0,$_SESSION["grades"][8]["grade"]);

              //s1unit
              $pdf->SetXY(170,129);
              $pdf->Write(0,$_SESSION["grades"][8]["unit"]);

              //s1unit
              $pdf->SetXY(190,129);
              $pdf->Write(0,$_SESSION["grades"][8]["wa"]);
          }

          if(!empty($_SESSION["grades"][9]['subjectname']) && !empty($_SESSION["grades"][9]['grade']) && !empty($_SESSION["grades"][9]['unit']) && !empty($_SESSION["grades"][9]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,135);
            if(strlen($_SESSION["grades"][9]["subjectname"]) > 25){
              $y = 135;
              foreach( breakString($_SESSION["grades"][9]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][9]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,136);
              $pdf->Write(0,$_SESSION["grades"][9]["grade"]);

              //s1unit
              $pdf->SetXY(170,136);
              $pdf->Write(0,$_SESSION["grades"][9]["unit"]);

              //s1unit
              $pdf->SetXY(190,136);
              $pdf->Write(0,$_SESSION["grades"][9]["wa"]);
          }

          if(!empty($_SESSION["grades"][10]['subjectname']) && !empty($_SESSION["grades"][10]['grade']) && !empty($_SESSION["grades"][10]['unit']) && !empty($_SESSION["grades"][10]['wa'])){

            $pdf->SetFontSize(6);
            //subject1
            $pdf->SetXY(109,142);
            if(strlen($_SESSION["grades"][10]["subjectname"]) > 25){
              $y = 142;
              foreach( breakString($_SESSION["grades"][10]["subjectname"], 20) as $line){
                $pdf->Write(0,$line);
                $y = $y+2;
                $pdf->SetXY(109,$y);
              }
            }else{
                  $pdf->Write(0,$_SESSION["grades"][10]["subjectname"]);
              }
              //s1rating
              $pdf->SetFontSize(8);
              $pdf->SetXY(152,144);
              $pdf->Write(0,$_SESSION["grades"][10]["grade"]);

              //s1unit
              $pdf->SetXY(170,144);
              $pdf->Write(0,$_SESSION["grades"][10]["unit"]);

              //s1unit
              $pdf->SetXY(190,144);
              $pdf->Write(0,$_SESSION["grades"][10]["wa"]);
            }
  }


  $pdf->SetFontSize(10);
  $pdf->SetXY(180,158);
  $pdf->Write(0,$GWA);

  $pdf->SetXY(30,167);
  $pdf->Write(0,$stype);

  $pdf->SetXY(85,207);
  $pdf->Write(0,$pgrant);

  $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/universityscholarship/'.$filename);
  session_unset();
  session_destroy();
  $open = 1;
  include "vendor/sendmail3.php";
  header("location:usapplication?tn=$tn&status=Success");
  }else{
    header("HTTP/1.1 403 Forbidden");
  }
}
?>
