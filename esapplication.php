<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
ESLock(getESLock());
$view = new view();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/login2.css">
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
            <a href="entscholarship" class="nav-item nav-link navitem ml-4 active">Entrance Scholarship</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container-fluid mt-3 pt-4 slide-in-left bg-light rounded shadow-sm">
    <div class="row">
      <?php callAppAlert() ?>
        <div class="col-12">
            <h6 class="text-center mb-4">New Application for Entrance Scholarship</h6>
        </div>
        <?php if (!empty($_GET)) {
            CheckSuccess($_GET['status']);
        }?>
    </div>
      <form action="resource/php/esapp.php" method="POST" class="" enctype="multipart/form-data">
        <div class="row border-top pt-2">
          <div class="form-group col-md-4">
            <h6 for="studentN">Student Number</h6>
            <input type="text" class="form-control form-control-sm" id="studentN"  value="" name="studentN" placeholder="Student Number " minlength="10" maxlength="10" required>
            <small class="text-muted"> *Please input the correct student format <b><em>2018-00053</em></b></small>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Name of Former School</h6>
            <input type="text" class="form-control form-control-sm" id="formerschool"  value="" name="formerschool" placeholder="Former School" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Former School Address</h6>
            <input type="text" class="form-control form-control-sm" id="addressfs"  value="" name="addressfs" placeholder="Former School Address" required>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-3">
            <h6 for="studentN">First Name</h6>
            <input type="text" class="form-control form-control-sm" id="firstname"  value="" name="firstname" placeholder="First Name" required>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Last Name</h6>
            <input type="text" class="form-control form-control-sm" id="lastname"  value="" name="lastname" placeholder="Last Name" required>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Middle Name</h6>
            <input type="text" class="form-control form-control-sm" id="middlename"  value="" name="middlename" placeholder="Middle Name">
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Date of Birth</h6>
            <input type="date" class="form-control form-control-sm" id="dob"  value="" name="dob"required>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-3">
            <h6 for="studentN">Place of Birth</h6>
            <input type="text" class="form-control form-control-sm" id="birthplace"  value="" name="birthplace" placeholder="Place of Birth"required>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Home Address</h6>
            <input type="text" class="form-control form-control-sm" id="haddress"  value="" name="haddress" placeholder="Home Address" required>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">City Address</h6>
            <input type="text" class="form-control form-control-sm" id="caddress"  value="" name="caddress" placeholder="City Address" required>
            <small>kindly copy the value from home address if it is the same.</small>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Contact Number</h6>
            <input type="text" class="form-control form-control-sm" id="contactnumber"  value="" name="contactnumber" placeholder="Contact Number" required>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-12">
            <h6 for="studentN">Email Address</h6>
            <input type="text" class="form-control form-control-sm" id="email"  value="" name="email" placeholder="Email Address"required>
            <small class="text-muted"> *Please ensure the correctness of the email address. Incorrect email address may <b>forfeit your application.</b></em></b></small>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-12">
            <h6 for="Course">Course</h6>
                <select id="Course" name="Course"  class="form-control form-control-sm" required>
                  <?php $view->degreeCourseSP();?>
              </select>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-4">
            <h6 for="studentN">Rank in Relation to the Total No. of Graduating Students:</h6>
            <input type="text" class="form-control form-control-sm" id="rank"  value="" name="rank" placeholder="Rank in Relation to the total No. of Graduating Students" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Honors Received</h6>
            <input type="text" class="form-control form-control-sm" id="honor"  value="" name="honor" placeholder="Honors Received" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">General Weighted Average</h6>
            <input type="text" class="form-control form-control-sm" id="genave"  value="" name="genave" placeholder="General Weighted Average" required>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-4">
            <h6 for="studentN">Year/Level</h6>
              <select id="b" name="ylevel" class="form-control form-control-sm">
                <option value="1">First Year</option>
                <option value="2">Second Year</option>
                <option value="3">Third Year</option>
                <option value="4">Fourth Year</option>
                <option value="5">Fifth Year</option>
                <option value="6">Sixth Year</option>
                <option value="Graduate">Graduate</option>
              </select>
          </div>
          <div class="form-group col-md-2">
            <h6 for="studentN">Section</h6>
            <input type="text" class="form-control form-control-sm" id="Section" name="Section" aria-describedby="emailHelp" placeholder="Enter Section" maxlength="1" required>
            <small class="text-muted"> <b>*Section Letter Only</b></small>
          </div>
          <div class="form-group col-md-6">
            <h6 for="studentN">Scholarship Applied for:</h6>
            <select id="b" name="awardtitle" class="form-control form-control-sm">
              <option value="CEU Legacy Scholarship I">CEU Legacy Scholarship I</option>
              <option value="CEU Legacy Scholarship II">CEU Legacy Scholarship II</option>
              <option value="CEU Legacy Scholarship III">CEU Legacy Scholarship III</option>
              <option value="CEU Founders Scholarship Rank-1">CEU Founders Scholarship -Valedictorian</option>
              <option value="CEU Founders Scholarship Rank-2">CEU Founders Scholarship -Salutatorian</option>
              <option value="CEU Founders Scholarship Rank-3">CEU Founders Scholarship -1st Hon. Mention</option>
              <option value="CEU Founders Scholarship Rank-4">CEU Founders Scholarship -2nd Hon. Mention</option>
              <option value="CEU Founders Scholarship Rank-5">CEU Founders Scholarshi -3rd Hon. Mention</option>
              <option value="CEU Achievers Scholarship">CEU Achievers Scholarship</option>
              <option value="Entrance Scholarship for Medicine">Entrance Scholarship for Medicine</option>
              <option value="Entrance Scholarship for Graduate School">Entrance Scholarship for Graduate School</option>
              <option value="Entrance Scholarship for Juris Doctor (Makati Only)"> Entrance Scholarship for Juris Doctor (Makati Only)</option>
            </select>
          </div>
        </div>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-md-4">
            <h6 for="studentN">Father's Fullname</h6>
            <input type="text" class="form-control form-control-sm" id="fathername"  value="" name="fathername" placeholder="Father's Name" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Mother's Fullname</h6>
            <input type="text" class="form-control form-control-sm" id="mothername"  value="" name="mothername" placeholder="Mother's Name" required>
          </div>
        </div>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-md-4">
            <h6 for="studentN">Occupation of Father</h6>
            <input type="text" class="form-control form-control-sm" id="foccupation"  value="" name="foccupation" placeholder="Occupation of Father" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Occupation of Mother</h6>
            <input type="text" class="form-control form-control-sm" id="moccupation"  value="" name="moccupation" placeholder="Occupation of Mother" required>
          </div>
        </div>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-md-4">
            <h6 for="studentN">Employer of Father</h6>
            <input type="text" class="form-control form-control-sm" id="femployer"  value="" name="femployer" placeholder="Employer of Father" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Employer  of Mother</h6>
            <input type="text" class="form-control form-control-sm" id="memployer"  value="" name="memployer" placeholder="Employer  of Mother" required>
          </div>
        </div>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-md-4">
            <h6 for="studentN">Annual Income of Father</h6>
            <small class="text-muted">Please input "1"  if not applicable.</small>
            <input type="number" class="form-control form-control-sm" id="fincome"  value="" name="fincome" placeholder="Annual Income of Father" min=1 required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Annual Income  of Mother</h6>
            <small class="text-muted">Please input "1" if not applicable.</small>
            <input type="number" class="form-control form-control-sm" id="mincome"  value="" name="mincome" placeholder="Annual Income  of Mother" min=1 required>
          </div>
        </div>
        <small class="text-danger"><b>*For Fields below kindly input "NA" if not applicable.</b></small>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-6">
            <h6 class="text-right" for="studentN">Awards and Scholarship</h6>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards1"  value="" name="awards1" placeholder="Award or Scholarship Received" required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards2"  value="" name="awards2" placeholder="Award or Scholarship Received" required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards3"  value="" name="awards3" placeholder="Award or Scholarship Received" required>
          </div>
          <div class="form-group col-6">
            <h6 for="studentN">From School And Org.</h6>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school1"  value="" name="school1" placeholder="From School or Organization" required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school2"  value="" name="school2" placeholder="From School or Organization" required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school3"  value="" name="school3" placeholder="From School or Organization" required>
          </div>
        </div>
        <div class="row border-top py-2 justify-content-center">
          <h6 class="text-right" for="studentN">Name of school and other organizations (Social, Civic, Religious) of which you were or are a
            member and the positions you occupied or are now occupying:</h6>
          <div class="form-group col-6">
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards1"  value="" name="org1" placeholder="Membership or Position"required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards2"  value="" name="org2" placeholder="Membership or Position"required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards3"  value="" name="org3" placeholder="Membership or Position"required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="awards3"  value="" name="org4" placeholder="Membership or Position"required>
          </div>
          <div class="form-group col-6">
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school1"  value="" name="position1" placeholder="From School or Organization"required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school2"  value="" name="position2" placeholder="From School or Organization"required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school3"  value="" name="position3" placeholder="From School or Organization"required>
            <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="school3"  value="" name="position4" placeholder="From School or Organization"required>
          </div>
        </div>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-md-4">
            <h6 class="text-center" for="studentN">PDF File Requirements</h6>
            <input accept=".pdf" id="file" type="file" name="file" onchange="validateSize(this)" required>
            <small class="text-muted"> <br />
              *Please ensure the correctness of the pdf file. Incorrect requirements uploaded may <b>result to forfeiting of your application.</b></em></b></small>
            <small class="text-muted"> <br />
              - Make sure to follow the instructions on the previous page.</b></em></b></small>
          </div>
          <div class="form-group col-md-4 justify-content-center">
            <h6 class="text-center" for="studentN">Captcha Validation</h6>
                                      <p><img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
                                      <p><input type="text" size="6" maxlength="5" name="captcha" value="">
                                      <small>copy the digits from the image into this box</small></p>
                                        <label  >&nbsp;</label>
         </div>
          <div class="form-group col-md-4">
            <p>
              <small class="text-muted" style="font-size: 70%;"><b>In accordance to Republic Act 10173 – Data Privacy Act of 2012</b><br />-By submitting this form, I am giving my consent to CEU to process my personal and sensitive information.
              <br /> -By submitting this form, I also signify that I have read, understood and will comply with scholarship protocols of the university.
              <br /> -<em>Disclaimer, submitting this form will automatically sign the ROF14.</em>
              </small>
            </p>
          </div>
          <div class="form-group col-12">
            <input type="submit" value="Submit the Scholarship Application Form" class=" form-control btn btn-primary" />
          </div>
        </div>
      </form>
  </div>
<!-- Modal -->
    <?php
    if(!$_GET){
      require_once('modal.php');
    }else{

    }
    ?>

    </header>
    <script src="vendor/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="resource/js/ft.js"></script>
    <script>
      $(document).ready(function(){
          $("#ceumodal").modal('show');
      });
    </script>

    </body>
    </html>
