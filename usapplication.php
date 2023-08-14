<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
ESLock(getUSLock());
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
            <a href="unvscholarship" class="nav-item nav-link navitem ml-4 active">University Scholarship</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container-fluid mt-3 pt-4 slide-in-left bg-light rounded shadow-sm">
    <div class="row">
        <div class="col-12">
          <?php callAppAlert()?>
            <h6 class="text-center mb-4">New Application for University Scholarship (Continuing)</h6>
        </div>
        <?php if (!empty($_GET)) {
            CheckSuccess($_GET['status']);
        }?>
    </div>
      <form action="resource/php/usapp.php" method="POST" class="" enctype="multipart/form-data">
        <div class="row border-top pt-2">
          <div class="form-group col-md-4">
            <h6 for="studentN">Student Number</h6>
            <input type="text" class="form-control form-control-sm" id="studentN"  value="" name="studentN" placeholder="Student Number " minlength="10" maxlength="10" required>
            <small class="text-muted"> *Please input the correct student format <b><em>2018-00053</em></b></small>
          </div>
          <div class="form-group col-md-4">
            <h6 >Scholarship Status</h6>
            <div class="form-control form-control-sm">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Status" id="New" value="New" checked>
                <label class="form-check-label" for="New">New</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Status" id="Renewal" value="Renewal">
                <label class="form-check-label" for="Renewal">Renewal</label>
              </div>
          </div>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Scholarship to be applied</h6>
            <select id="b" name="cgrant" class="form-control">
              <option value="University Academic Scholarship">University Academic Scholarship(Non Graduating Student)</option>
              <option value="Centennial Scholarship Renewal">Centennial Scholarship(Renewal)</option>
              <option value="CEU Achievers Scholarship">CEU Achievers Scholarship (Renewal)</option>
              <option value="SCITECH Scholarship">SCITECH Scholarship</option>
              <option value="Texas Scholarship Renewal">Texas Scholarship Renewal</option>
            </select>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-4">
            <h6 for="studentN">First Name</h6>
            <input type="text" class="form-control form-control-sm" id="firstname"  value="" name="Firstname" placeholder="First Name" required>
            <small class="text-muted">for now student with ñ in their name <b>please input Uppercase Ñ or N instead.</b> </small>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Last Name</h6>
            <input type="text" class="form-control form-control-sm" id="lastname"  value="" name="Lastname" placeholder="Last Name" required>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Middle Name</h6>
            <input type="text" class="form-control form-control-sm" id="middlename"  value="" name="Middlename" placeholder="Middle Name">
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-6">
            <h6 for="studentN">Email Address</h6>
            <input type="text" class="form-control form-control-sm" id="email"  value="" name="email" placeholder="Email Address"required>
            <small class="text-muted"> *Please ensure the correctness of the email address. Incorrect email address may <b>forfeit your application.</b></em></b></small>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Year/Level</h6>
              <select id="b" name="ylevel" class="form-control form-control-sm">
                <option value="1">First Year</option>
                <option value="2">Second Year</option>
                <option value="3">Third Year</option>
                <option value="4">Fourth Year</option>
                <option value="5">Fifth Year</option>
                <option value="6">Sixth Year</option>
              </select>
          </div>
          <div class="form-group col-md-3">
            <h6 for="studentN">Section</h6>
            <input type="text" class="form-control form-control-sm" id="Section" name="Section" aria-describedby="emailHelp" placeholder="Enter Section" maxlength="2" required>
            <small class="text-muted"> <b>*Section Letter Only</b></small>
          </div>
        </div>
        <div class="row border-top py-2">
          <div class="form-group col-md-8">
            <h6 for="Course">Course</h6>
                <select id="Course" name="Course"  class="form-control form-control-sm" required>
                  <?php $view->degreeCourseSP2();?>
              </select>
          </div>
          <div class="form-group col-md-4">
            <h6 for="studentN">Previous Scholarship Enjoyed</h6>
            <input type="text" class="form-control form-control-sm" id="pgrant"  value="" name="pgrant" placeholder="Previous Scholarship" required>
            <small class="text-danger"> <b>*input "NA" if not applicable</b></small>
          </div>
        </div>
          <small class="text-muted"> *<b><em> Kindly complete the table below with your subjects taken in the previous semester.  <br />Please fill in the amount of subject textbox based on the number of subjects taken only. </em></b> You may leave other subject textbox as blank. <br />-Please input your subject grade in 2 decimal point("2.00")<br />-Please input the units taken (whole number)</small>
          <small class="text-danger"><br /> *<b><em> Kindly input the subject code ONLY example "Professional Elective 1-Entrepreneurial Management" to "PRBA161",F Make sure to input the combined grade for subjects with laboratory grade.</small>
          <small class="text-danger"><br /> *<b><em> Grades should not be lower than 2.0 (Partial Academic)/ 1.75 (Full Academic),(2.5 other scholarships)</small>
          <small class="text-danger"><br /> *<b><em> Failure to comply may result to disapproval of your scholarship application.</small>
        <table class="table table-hover">
          <thead class="thead-dark">
            <th style="width:50%;">Subjects Taken (Subject Code Only)</th>
            <th>Grade</th>
            <th>Units</th>
          </thead>
          <tr>
            <td >
                <input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject1" oninput="this.value = this.value.toUpperCase()"  name="Subject1" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" required>
              </div>
            </td>
            <td>
                <input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s1rating" name="s1rating" aria-describedby="emailHelp" placeholder="Grade / Rating" required>
            </td>
            <td>
                <input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s1unit" name="s1unit" aria-describedby="emailHelp" placeholder="Unit" required>
            </td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject2" oninput="this.value = this.value.toUpperCase()"  name="Subject2" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s2rating" name="s2rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s2unit" name="s2unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject3" oninput="this.value = this.value.toUpperCase()"  name="Subject3" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s3rating" name="s3rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s3unit" name="s3unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject4" oninput="this.value = this.value.toUpperCase()"  name="Subject4" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s4rating" name="s4rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s4unit" name="s4unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject5" oninput="this.value = this.value.toUpperCase()"  name="Subject5" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s5rating" name="s5rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s5unit" name="s5unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject6" oninput="this.value = this.value.toUpperCase()"  name="Subject6" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s6rating" name="s6rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s6unit" name="s6unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject7" oninput="this.value = this.value.toUpperCase()"  name="Subject7" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s7rating" name="s7rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s7unit" name="s7unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject8" oninput="this.value = this.value.toUpperCase()"  name="Subject8" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s8rating" name="s8rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s8unit" name="s8unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject9" oninput="this.value = this.value.toUpperCase()"  name="Subject9" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;"  min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s9rating" name="s9rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s9unit" name="s9unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>
          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject10" oninput="this.value = this.value.toUpperCase()"  name="Subject10" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s10rating" name="s10rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s10unit" name="s10unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>

          <tr>
          	<td>
          		<input type="text" style="font-size: 70%;" class="form-control form-control-sm" id="Subject11" oninput="this.value = this.value.toUpperCase()"  name="Subject11" aria-describedby="emailHelp" placeholder="Subject CODE only" maxlength="15" >
          	  </div>
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="3.0" step=".25" class="form-control form-control-sm" id="s11rating" name="s11rating" aria-describedby="emailHelp" placeholder="Grade / Rating" >
          	</td>
          	<td>
          		<input type="number" style="font-size: 70%;" min="1" max="20" step="1" class="form-control form-control-sm" id="s11unit" name="s11unit" aria-describedby="emailHelp" placeholder="Unit" >
          	</td>
          </tr>
        </table>
        <div class="row border-top py-2 justify-content-center">
          <div class="form-group col-md-4">
            <h6 class="text-center" for="studentN">PDF File Requirements <br />(For Scholarship with document requirements)</h6>
            <input id="file" accept=".pdf" type="file" name="file" onchange="validateSize(this)">
            <small class="text-muted"> <br />
              *Please ensure the correctness of the pdf file. Incorrect requirements uploaded may <b>result to forfeiting of your application.</b></em></b></small>
            <small class="text-muted"> <br />
              - <b class="ceupink">Do not upload anything if your scholarship is Partial/Full Academic Scholarship</b><br/>
              - Make sure to follow the instructions on the previous page.<br />
              - Do not upload if your scholarship doesn't have any document requirements</b></em></b></small>
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
            <input type="submit" id="myButton1" onclick="change()" value="Submit the Scholarship Application Form"  class=" form-control btn btn-primary" />
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


      function change()
      {
          document.getElementById("myButton1").value="Submitting form... Do not click again. Please wait...";
          setTimeout(
            function()
            {
              document.getElementById("myButton1").value="Submit Scholarship Application"
            }, 3000);
      }
    </script>
    </script>


    </body>
    </html>
