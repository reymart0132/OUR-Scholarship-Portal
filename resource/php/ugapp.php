<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';

if(!empty($_POST)) {

  if($_POST['captcha'] != $_SESSION['digit']){
  session_destroy();
  header("location:../../ugapplication?status=captchaError");
  die();
  }


  $studentnumber=sanitize(strtoupper($_POST['studentN']));
  $Lastname=sanitize(strtoupper($_POST['Lastname']));
  $Firstname=sanitize(strtoupper($_POST['Firstname']));
  $Middlename=sanitize(strtoupper($_POST['Middlename']));
  $cgrant=sanitize($_POST['cgrant']);
  $pgrant=sanitize($_POST['pgrant']);
  $Status=sanitize($_POST['Status']);
  $ylevel=sanitize($_POST['ylevel']);
  $Section=sanitize($_POST['Section']);
  $dateapplied= date("Y-m-d H:i:s");
  $email=$_POST['email'];
  $course=sanitize($_POST['Course']);
  $college=findCollegeName(findCollege($course));
  $transnumber = uniqid('ceuUGA');
  $email = $_POST['email'];
  $awa = [];
  $au = [];
  $grades= [];
  $semester = getSemester2();


  if(!empty($_POST['Subject1']) && !empty($_POST['s1rating']) && !empty($_POST['s1unit'])){
    $wa1 = $_POST['s1rating'] * $_POST['s1unit'];
    $awa[]=$wa1;
    $au[]=$_POST['s1unit'];
    $grades[] = array("subjectname" => $_POST['Subject1'] ,"grade" => $_POST['s1rating'], "unit" => $_POST['s1unit'],"wa"=>$wa1);
  }
  if(!empty($_POST['Subject2']) && !empty($_POST['s2rating']) && !empty($_POST['s2unit'])){
    $wa2 = $_POST['s2rating'] * $_POST['s2unit'];
    $awa[]=$wa2;
    $au[]=$_POST['s2unit'];
    $grades[] = array("subjectname" => $_POST['Subject2'] ,"grade" => $_POST['s2rating'], "unit" => $_POST['s2unit'],"wa"=>$wa2);
  }
  if(!empty($_POST['Subject3']) && !empty($_POST['s3rating']) && !empty($_POST['s3unit'])){
    $wa3 = $_POST['s3rating'] * $_POST['s3unit'];
    $awa[]=$wa3;
    $au[]=$_POST['s3unit'];
    $grades[] = array("subjectname" => $_POST['Subject3'] ,"grade" => $_POST['s3rating'], "unit" => $_POST['s3unit'],"wa"=>$wa3);
  }
  if(!empty($_POST['Subject4']) && !empty($_POST['s4rating']) && !empty($_POST['s4unit'])){
    $wa4 = $_POST['s4rating'] * $_POST['s4unit'];
    $awa[]=$wa4;
    $au[]=$_POST['s4unit'];
    $grades[] = array("subjectname" => $_POST['Subject4'] ,"grade" => $_POST['s4rating'], "unit" => $_POST['s4unit'],"wa"=>$wa4);
  }
  if(!empty($_POST['Subject5']) && !empty($_POST['s5rating']) && !empty($_POST['s5unit'])){
    $wa5 = $_POST['s5rating'] * $_POST['s5unit'];
    $awa[]=$wa5;
    $au[]=$_POST['s5unit'];
    $grades[] = array("subjectname" => $_POST['Subject5'] ,"grade" => $_POST['s5rating'], "unit" => $_POST['s5unit'],"wa"=>$wa5);
  }
  if(!empty($_POST['Subject6']) && !empty($_POST['s6rating']) && !empty($_POST['s6unit'])){
    $wa6 = $_POST['s6rating'] * $_POST['s6unit'];
    $awa[]=$wa6;
    $au[]=$_POST['s6unit'];
    $grades[] = array("subjectname" => $_POST['Subject6'] ,"grade" => $_POST['s6rating'], "unit" => $_POST['s6unit'],"wa"=>$wa6);
  }
  if(!empty($_POST['Subject7']) && !empty($_POST['s7rating']) && !empty($_POST['s7unit'])){
    $wa7 = $_POST['s7rating'] * $_POST['s7unit'];
    $awa[]=$wa7;
    $au[]=$_POST['s7unit'];
    $grades[] = array("subjectname" => $_POST['Subject7'] ,"grade" => $_POST['s7rating'], "unit" => $_POST['s7unit'],"wa"=>$wa7);
  }
  if(!empty($_POST['Subject8']) && !empty($_POST['s8rating']) && !empty($_POST['s8unit'])){
    $wa8 = $_POST['s8rating'] * $_POST['s8unit'];
    $awa[]=$wa8;
    $au[]=$_POST['s8unit'];
    $grades[] = array("subjectname" => $_POST['Subject8'] ,"grade" => $_POST['s8rating'], "unit" => $_POST['s8unit'],"wa"=>$wa8);
  }
  if(!empty($_POST['Subject9']) && !empty($_POST['s9rating']) && !empty($_POST['s9unit'])){
    $wa9 = $_POST['s9rating'] * $_POST['s9unit'];
    $awa[]=$wa9;
    $au[]=$_POST['s9unit'];
    $grades[] = array("subjectname" => $_POST['Subject9'] ,"grade" => $_POST['s9rating'], "unit" => $_POST['s9unit'],"wa"=>$wa9);
  }
  if(!empty($_POST['Subject10']) && !empty($_POST['s10rating']) && !empty($_POST['s10unit'])){
    $wa10 = $_POST['s10rating'] * $_POST['s10unit'];
    $awa[]=$wa10;
    $au[]=$_POST['s10unit'];
    $grades[] = array("subjectname" => $_POST['Subject10'] ,"grade" => $_POST['s10rating'], "unit" => $_POST['s10unit'],"wa"=>$wa10);
  }
  if(!empty($_POST['Subject11']) && !empty($_POST['s11rating']) && !empty($_POST['s11unit'])){
    $wa11 = $_POST['s11rating'] * $_POST['s11unit'];
    $awa[]=$wa11;
    $au[]=$_POST['s11unit'];
    $grades[] = array("subjectname" => $_POST['Subject11'] ,"grade" => $_POST['s11rating'], "unit" => $_POST['s11unit'],"wa"=>$wa11);
  }

  $_SESSION['grades']=$grades;
  $totalunit= array_sum($au);
  $totalweightave =  array_sum($awa);
  $GWA = $totalweightave/$totalunit;
  $GWA =number_format((float)$GWA, 3, '.', '');


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "email invalid";
    header("location:../../ugapplication?status=tamper");
    die();
    }else{
    echo "email valid";
  }


  $required = array('Lastname','Firstname','Middlename','email');
  $error = false;

  foreach($required as $field) {
    if (empty($_POST[$field])) {
      $error = true;
    }
  }

  if ($error) {
    echo "taena script kiddies";
    header("location:../../ugapplication?status=tamper");
    die();
  }

  if(datevalidationUGA($studentnumber) == false){
    header("location:../../ugapplication?status=MultipleTrans");
    die();
  }

  if($_FILES['file']['error'] == 0) {
    $file = true;
  }else{
    $file = false;
  }

  $reds=0;

  require_once('uguploadfile.php');
  if($reds ==1){
    header("location:../../ugapplication?status=upload1");
    die();
  }


  $transaction = new uginsert( $studentnumber, $Lastname, $Firstname, $Middlename, $cgrant,$pgrant, $college,$dateapplied,$email,$course, $GWA,$transnumber,$file,$Status,$semester);
  $transaction->insertUGApplication();
  header("location:../../rof65?yl=$ylevel&st=$Section&tn=".urlencode(base64_encode($transnumber)));
}
 ?>
