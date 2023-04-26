<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';

if(!empty($_POST)) {

  if($_POST['captcha'] != $_SESSION['digit']){
  session_destroy();
  header("location:../../esapplication?status=captchaError");
  die();
  }


  $studentnumber=sanitize(strtoupper($_POST['studentN']));
  $lastname=sanitize(strtoupper($_POST['lastname']));
  $firstname=sanitize(strtoupper($_POST['firstname']));
  $middlename=sanitize(strtoupper($_POST['middlename']));
  $formerschool=sanitize(strtoupper($_POST['formerschool']));
  $awardtitle=sanitize($_POST['awardtitle']);
  $year=sanitize($_POST['ylevel']);
  $section=sanitize($_POST['Section']);
  $addressfs=sanitize(strtoupper($_POST['addressfs']));
  $dateapplied= date("Y-m-d H:i:s");
  $dob=sanitize($_POST['dob']);
  $birthplace=sanitize(strtoupper($_POST['birthplace']));
  $haddress=sanitize(strtoupper($_POST['haddress']));
  $caddress=sanitize(strtoupper($_POST['caddress']));
  $contacts=sanitize($_POST['contactnumber']);
  $email=$_POST['email'];
  $fathername=sanitize(strtoupper($_POST['fathername']));
  $foccupation=sanitize(strtoupper($_POST['foccupation']));
  $femployer=sanitize(strtoupper($_POST['femployer']));
  $fincome=sanitize(strtoupper($_POST['fincome']));
  $mothername=sanitize(strtoupper($_POST['mothername']));
  $moccupation=sanitize(strtoupper($_POST['moccupation']));
  $memployer=sanitize(strtoupper($_POST['memployer']));
  $mincome=sanitize(strtoupper($_POST['mincome']));
  $course=sanitize($_POST['Course']);
  $college=findCollegeName(findCollege($course));
  $rank=sanitize($_POST['rank']);
  $honors=sanitize($_POST['honor']);
  $genave=sanitize($_POST['genave']);
  $awards1=sanitize(strtoupper($_POST['awards1']));
  $school1=sanitize(strtoupper($_POST['school1']));
  $awards2=sanitize(strtoupper($_POST['awards2']));
  $school2=sanitize(strtoupper($_POST['school2']));
  $awards3=sanitize(strtoupper($_POST['awards3']));
  $school3=sanitize(strtoupper($_POST['school3']));
  $org1=sanitize(strtoupper($_POST['org1']));
  $position1=sanitize(strtoupper($_POST['position1']));
  $org2=sanitize(strtoupper($_POST['org2']));
  $position2=sanitize(strtoupper($_POST['position2']));
  $org3=sanitize(strtoupper($_POST['org3']));
  $position3=sanitize(strtoupper($_POST['position3']));
  $org4=sanitize(strtoupper($_POST['org4']));
  $position4=sanitize(strtoupper($_POST['position4']));
  $transnumber = uniqid('ceuESA');

  $email = $_POST['email'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "email invalid";
    header("location:../../esapplication?status=tamper");
    die();
    }else{
    echo "email valid";
  }


  $required = array( 'lastname', 'firstname', 'formerschool', 'awardtitle', 'ylevel', 'Section', 'addressfs', 'dob', 'birthplace', 'haddress', 'caddress', 'contactnumber','email', 'fathername', 'foccupation', 'femployer', 'fincome', 'mothername', 'moccupation', 'memployer', 'mincome', 'Course', 'rank', 'honor', 'genave');
  $error = false;

  foreach($required as $field) {
    if (empty($_POST[$field])) {
      $error = true;
    }
  }
  if ($error) {
    echo "taena script kiddies";
    header("location:../../esapplication?status=tamper");
    die();
  }

  if(datevalidationESA($studentnumber) == false){
    header("location:../../esapplication?status=MultipleTrans");
    die();
  }

  $reds=0;
  require_once('esuploadfile.php');
  if($reds ==1){
    header("location:../../esapplication?status=upload1");
    die();
  }
  $transaction = new esainsert($studentnumber, $lastname, $firstname, $middlename, $formerschool, $college, $awardtitle, $year, $section, $addressfs, $dateapplied, $dob, $birthplace, $haddress, $caddress, $contacts,$email, $fathername, $foccupation, $femployer, $fincome, $mothername, $moccupation, $memployer, $mincome, $course, $rank, $honors, $genave, $awards1, $school1, $awards2, $school2, $awards3, $school3, $org1, $position1, $org2, $position2, $org3, $position3, $org4, $position4,$transnumber);
  $transaction->insertESApplicationData();
  $transaction->insertESApplication();
  header("location:../../rof13?tn=".urlencode(base64_encode($transnumber)));
}
 ?>
