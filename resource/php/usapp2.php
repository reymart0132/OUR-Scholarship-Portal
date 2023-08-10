<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';

if(!empty($_POST)) {

  if($_POST['captcha'] != $_SESSION['digit']){
  session_destroy();
  header("location:../../usapplication2?status=captchaError");
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
  $transnumber = uniqid('ceuUSA');
  $email = $_POST['email'];
  $awa = [];
  $au = [];
  $grades= [];
  $grades2= [];
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
  if(!empty($_POST['Subject12']) && !empty($_POST['s12rating']) && !empty($_POST['s12unit'])){
    $wa12 = $_POST['s12rating'] * $_POST['s12unit'];
    $awa[]=$wa12;
    $au[]=$_POST['s12unit'];
    $grades2[] = array("subjectname" => $_POST['Subject12'] ,"grade" => $_POST['s12rating'], "unit" => $_POST['s12unit'],"wa"=>$wa12);
  }
  if(!empty($_POST['Subject13']) && !empty($_POST['s13rating']) && !empty($_POST['s13unit'])){
    $wa13 = $_POST['s13rating'] * $_POST['s13unit'];
    $awa[]=$wa13;
    $au[]=$_POST['s13unit'];
    $grades2[] = array("subjectname" => $_POST['Subject13'] ,"grade" => $_POST['s13rating'], "unit" => $_POST['s13unit'],"wa"=>$wa13);
  }
  if(!empty($_POST['Subject14']) && !empty($_POST['s14rating']) && !empty($_POST['s14unit'])){
    $wa14 = $_POST['s14rating'] * $_POST['s14unit'];
    $awa[]=$wa14;
    $au[]=$_POST['s14unit'];
    $grades2[] = array("subjectname" => $_POST['Subject14'] ,"grade" => $_POST['s14rating'], "unit" => $_POST['s14unit'],"wa"=>$wa14);
  }
  if(!empty($_POST['Subject15']) && !empty($_POST['s15rating']) && !empty($_POST['s15unit'])){
    $wa15 = $_POST['s15rating'] * $_POST['s15unit'];
    $awa[]=$wa15;
    $au[]=$_POST['s15unit'];
    $grades2[] = array("subjectname" => $_POST['Subject15'] ,"grade" => $_POST['s15rating'], "unit" => $_POST['s15unit'],"wa"=>$wa15);
  }
  if(!empty($_POST['Subject16']) && !empty($_POST['s16rating']) && !empty($_POST['s16unit'])){
    $wa16 = $_POST['s16rating'] * $_POST['s16unit'];
    $awa[]=$wa16;
    $au[]=$_POST['s16unit'];
    $grades2[] = array("subjectname" => $_POST['Subject16'] ,"grade" => $_POST['s16rating'], "unit" => $_POST['s16unit'],"wa"=>$wa16);
  }
  if(!empty($_POST['Subject17']) && !empty($_POST['s17rating']) && !empty($_POST['s17unit'])){
    $wa17 = $_POST['s17rating'] * $_POST['s17unit'];
    $awa[]=$wa17;
    $au[]=$_POST['s17unit'];
    $grades2[] = array("subjectname" => $_POST['Subject17'] ,"grade" => $_POST['s17rating'], "unit" => $_POST['s17unit'],"wa"=>$wa17);
  }
  if(!empty($_POST['Subject18']) && !empty($_POST['s18rating']) && !empty($_POST['s18unit'])){
    $wa18 = $_POST['s18rating'] * $_POST['s18unit'];
    $awa[]=$wa18;
    $au[]=$_POST['s18unit'];
    $grades2[] = array("subjectname" => $_POST['Subject18'] ,"grade" => $_POST['s18rating'], "unit" => $_POST['s18unit'],"wa"=>$wa18);
  }
  if(!empty($_POST['Subject19']) && !empty($_POST['s19rating']) && !empty($_POST['s19unit'])){
    $wa19 = $_POST['s19rating'] * $_POST['s19unit'];
    $awa[]=$wa19;
    $au[]=$_POST['s19unit'];
    $grades2[] = array("subjectname" => $_POST['Subject19'] ,"grade" => $_POST['s19rating'], "unit" => $_POST['s19unit'],"wa"=>$wa19);
  }
  if(!empty($_POST['Subject20']) && !empty($_POST['s20rating']) && !empty($_POST['s20unit'])){
    $wa20 = $_POST['s20rating'] * $_POST['s20unit'];
    $awa[]=$wa20;
    $au[]=$_POST['s20unit'];
    $grades2[] = array("subjectname" => $_POST['Subject20'] ,"grade" => $_POST['s20rating'], "unit" => $_POST['s20unit'],"wa"=>$wa20);
  }
  if(!empty($_POST['Subject21']) && !empty($_POST['s21rating']) && !empty($_POST['s21unit'])){
    $wa21 = $_POST['s21rating'] * $_POST['s21unit'];
    $awa[]=$wa21;
    $au[]=$_POST['s21unit'];
    $grades2[] = array("subjectname" => $_POST['Subject21'] ,"grade" => $_POST['s21rating'], "unit" => $_POST['s21unit'],"wa"=>$wa21);
  }
  if(!empty($_POST['Subject22']) && !empty($_POST['s22rating']) && !empty($_POST['s22unit'])){
    $wa22 = $_POST['s22rating'] * $_POST['s22unit'];
    $awa[]=$wa22;
    $au[]=$_POST['s22unit'];
    $grades2[] = array("subjectname" => $_POST['Subject22'] ,"grade" => $_POST['s22rating'], "unit" => $_POST['s22unit'],"wa"=>$wa22);
  }

  $_SESSION['grades']=$grades;
  $_SESSION['grades2']=$grades2;
  $totalunit= array_sum($au);
  $totalweightave =  array_sum($awa);
  $GWA = $totalweightave/$totalunit;
  $GWA =number_format((float)$GWA, 3, '.', '');


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "email invalid";
    header("location:../../usapplication2?status=tamper");
    die();
    }else{
    echo "email valid";
  }


  $required = array('Lastname','Firstname','email');
  $error = false;

  foreach($required as $field) {
    if (empty($_POST[$field])) {
      $error = true;
    }
  }

  if ($error) {
    echo "taena script kiddies";
    header("location:../../usapplication2?status=tamper");
    die();
  }

  $discount ="";
  $duration = "";

  if ($cgrant == "University Academic Scholarship" || $cgrant == "University Academic Scholarship (Graduating)") {
      if($GWA <= 1.204 ){
        $cgrant = "University Full Academic Scholarship";
        $duration = "Entire ".getSY2();
        $discount = "100";
      }elseif ($GWA <= 1.504) {
        $cgrant = "University Partial Academic Scholarship";// code...
        $duration = "Entire ".getSY2();
        $discount = "50";
      }elseif ($GWA >= 1.505) {
        header("location:../../usapplication2?status=notElig");
        die();
      }else{

      }
  }elseif ($cgrant == "University Academic Scholarship (Medicine)") {
      if($GWA <= 1.504 ){
        $cgrant = "University Full Academic Scholarship (Medicine)";
        $duration = "Valid for 1 School Year";
        $discount = "100";
      }elseif ($GWA <= 2.04) {
        $cgrant = "University Partial Academic Scholarship (Medicine)";// code...
        $duration ="Valid for 1 School Year";
        $discount = "50";
      }elseif ($GWA >= 2.05) {
        header("location:../../usapplication2?status=notElig");
        die();
      }else{

      }
  }elseif ($cgrant == "University Academic Scholarship (GS)") {
      if($GWA <= 1.154 ){
        $cgrant = "University Full Academic Scholarship (GS)";
        $duration = getSemester2()." ".getSY2();
        $discount = "100";
      }elseif ($GWA >= 1.155) {
        header("location:../../usapplication2?status=notElig");
        die();
      }else{

      }
  }else{
    
  }



  if(datevalidationUSA($studentnumber) == false){
    header("location:../../usapplication2?status=MultipleTrans");
    die();
  }

  if($_FILES['file']['error'] == 0) {
    $file = true;
  }else{
    $file = false;
  }

  $reds=0;

  require_once('usuploadfile.php');
  if($reds ==1){
    header("location:../../usapplication2?status=upload1");
    die();
  }


  $transaction = new usinsert( $studentnumber, $Lastname, $Firstname, $Middlename, $cgrant,$pgrant, $college,$dateapplied,$email,$course, $GWA,$transnumber,$file,$Status,$semester);
  $transaction->insertUSApplication();
  header("location:../../rof152?yl=$ylevel&st=$Section&discount=$discount&duration=$duration&tn=".urlencode(base64_encode($transnumber)));
}
 ?>
