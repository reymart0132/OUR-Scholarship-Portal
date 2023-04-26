<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
if(!empty($_POST)){
  $status =checkTransaction($_POST['tn']);
  $remarks = substr_replace($status ,"", -1);
  $type = $status[strlen($status)-1];

}else{
  header('location:scrstatus');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/login.css">
</head>
<body>
  <header>
  <div class="container-fluid navcon">
    <div class="container-fluid slide-in-left">
      <nav class="navbar navbar-expand-md navbar-dark">
        <img src="resource/img/logo.PNG" class="img-fluid logo"/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a href="index" class="nav-item nav-link navitem ml-4">Scholarship Portal </a>
            <a href="scrstatus" class="nav-item nav-link navitem ml-4 active">Status</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
     <div class="container">
      <div class="row justify-content-center mt-lg-5">
          <div class="col-12  mt-lg-5">
            <div class="text-center p-5 slide-in-left shadow bgc">
              <h3 class="headermain2 mb-4"><b class="ceupink">Office of the Registrar</b> Scholarship and Grants Status Checker</h3>
              <?php
               if($remarks =="PENDING"){
                 echo "<p class='text-left'>
                 Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Your scholarship/grant application is currently being reviewed by our scholarship officer.
                 <br />For follow-up you may send an email to <b class='ceupink'>ceuscholarship@ceu.edu.ph</b>.<br /> Thank you and stay safe!</p>";
               }elseif($remarks =="SAO"){
                 echo "<p class='text-left'>
                 Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Your scholarship/grant application  was already forwarded and is currently being reviewed by the <b class='ceupink'>Student Affairs Office</b>.
                 <br />For follow-up you may send an email to <b class='ceupink'>".findOfficerSAOEmail()."</b>. <br /> Thank you and stay safe!</p>";
               }elseif($remarks =="REJ"){
                 echo "<p class='text-left'>
                 Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Your scholarship/grant application  was disapproved</b>.
                 <br />For the reason: <b class='ceupink'>".findReason($_POST['tn'])."</b>
                 <br />For clarification you may send an email to <b class='ceupink'>ceuscholarship@ceu.edu.ph</b>. <br /> Thank you and stay safe!</p>";
               }elseif($remarks =="DEAN"){
                 echo "<p class='text-left'>
                 Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Your scholarship/grant application  was already forwarded and is currently being reviewed by the <b class='ceupink'>Dean's Office</b>.
                 <br />For follow-up you may send an email to <b class='ceupink'>".findOfficerDeanEmail(findCollegeName2($_POST['tn']))."</b>. <br /> Thank you and stay safe!</p>";
               }elseif($remarks =="REG"){
                 echo "<p class='text-left'>
                 Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Your scholarship/grant application  was already forwarded and is currently being reviewed by the <b class='ceupink'>Registrar</b>.
                 <br />For follow-up you may send an email to <b class='ceupink'>ceuscholarship@ceu.edu.ph</b>. <br /> Thank you and stay safe!</p>";
               }elseif($remarks =="APP" || $remarks=="ADJ"){
                 if($type=="1"){
                   echo "<p class='text-left'>
                   Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Conratulations! Your scholarship/grant application  is now approved.
                   <br /> You may now download your scholarship forms below.
                   <br />ROF-13 : <a download='rof13.pdf' href='/ourscholar/application/entrancescholarship/".findROF13($_POST['tn'])."'> Click Here to Download the form.</a>
                   <br />ROF-14 : <a download='rof14.pdf' href='/ourscholar/application/entrancescholarship/".findROF14($_POST['tn'])."'> Click Here to Download the form.</a>
                   <br /> *You may present the approved copy of the scholarship to the CEU Accounting Department if your tuition is not reassessed yet.
                   ";
                 }elseif ($type=="2") {
                   echo "<p class='text-left'>
                   Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Conratulations! Your scholarship/grant application  is now approved.
                   <br /> You may now download your scholarship forms below.
                   <br />ROF-64 : <a download='rof64.pdf' href='/ourscholar/application/entrancegrant/".findROF64($_POST['tn'])."'> Click Here to Download the form.</a>
                   <br />ROF-63 : <a download='rof63.pdf' href='/ourscholar/application/entrancegrant/".findROF63($_POST['tn'])."'> Click Here to Download the form.</a>
                   <br /> *You may present the approved copy of the scholarship to the CEU Accounting Department if your tuition is not reassessed yet.
                   ";
                 }elseif ($type=="3") {
                   echo "<p class='text-left'>
                   Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Conratulations! Your scholarship/grant application  is now approved.
                   <br /> You may now download your scholarship forms below.
                   <br />ROF-15 : <a download='rof65.pdf' href='/ourscholar/application/universityscholarship/".findROF15($_POST['tn'])."'> Click Here to Download the form.</a>
                   <br /> *You may present the approved copy of the scholarship to the CEU Accounting Department if your tuition is not reassessed yet.
                   ";
                 }elseif ($type=="4") {
                   echo "<p class='text-left'>
                   Dear <b class='ceupink'>".findNameStudent($_POST['tn'])."</b>, <br />Conratulations! Your scholarship/grant application  is now approved.
                   <br /> You may now download your scholarship forms below.
                   <br />ROF-65 : <a href='/ourscholar/application/universitygrants/".findROF65($_POST['tn'])."'> Click Here to Download the form.</a>
                   <br /> *You may present the approved copy of the scholarship to the CEU Accounting Department if your tuition is not reassessed yet.
                   ";
                 }
               }
              ?>
            </div>
          </div>
        </div>
      </div>
    </header>
        <script src="vendor/js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
    </body>
    </html>
