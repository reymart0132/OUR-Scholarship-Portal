<?php require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CEU Scholarship Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/main.css">
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
  <header id="home">
    <div class="container-fluid navcon">
      <div class="container-fluid slide-in-left">
        <nav class="navbar navbar-expand-md navbar-dark">
          <img src="resource/img/logo.PNG" class="img-fluid logo"/>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a href="#home" class="nav-item nav-link active navitem ml-4">Home</a>
              <a href="#s1" class="nav-item nav-link navitem ml-4">Entrance Scholarship </a>
              <a href="#s2" class="nav-item nav-link navitem ml-4">University Scholarship</a>
              <a href="#s3" class="nav-item nav-link navitem ml-4">Entrance Grants</a>
              <a href="#s4" class="nav-item nav-link navitem ml-4">University Grants</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center jbg mt-2 slide-in-left">

          <div class="mt-2 mr-md-4  shadow text-center col-lg-4">
            <div class="jumbotron jumbotron-fluid p-3 header-text text-center  ">
              <div class="container puff-in-center">
                <h1 class="headermain">Centro Escolar University <b class="ceupink">Scholarship Portal-Manila</b></h1>
                <img class="img-fluid kenburns-bottom" src="resource/img/scholar1.png" alt="scholarpic">
                <a href="bulletinboardUS" class="btn btn-sm btn-ghost">Approved Scholars Bulletin Board</a><br />
                <a href="scrstatus" class="btn btn-sm btn-ghost">Scholarship Status</a>
                <a href="https://www.ceu.edu.ph/admission-subpages/20" class="btn btn-sm btn-ghost">Learn More</a>
              </div>
            </div>
         </div>

          <div class="mt-2 shadow text-center col-lg-5">
            <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
              <div class="container">
                <h1 class="headermain">Learn about <b class="ceupink">Scholarships</b> and <b class="ceupink">Grants</b> for your studies.</h1>
              <p class="sulat">Centro Escolar University is committed to the advancement of knowledge.  The “Ciencia y Virtud” (Science and Virtue) guides the behavior of its students to pursue knowledge and moral excellence. <br /> <br />
              Various scholarship programs are available to qualified students. Some are for entering freshman, renewable upon fulfillment of certain requirements. Others are for continuing students. There are scholarships funded by the University, some by alumni and friends of the University and still others by corporations/government with interests related to those of the University.<br /><br />
              The University also provides financial grants to students who participate in extracurricular activities such as extramural and who are members of the dance troupe, choir, student councils or other similar groups.</br><br />
              Only one scholarship or financial grant shall be enjoyed by any student. In case a student is qualified for more than one university scholarship or grant, he/she may avail himself/herself of the higher or more generous grant.
              </p>
              </div>
            </div>
         </div>
         <div class="mt-1 shadow text-center col-lg-12">
           <div class="jumbotron jumbotron-fluid p-2 header-text text-center ">
             <div class="container">
               <h1 class="headermain"><b class="ceupink">Announcement Board</b></h1>
               <p class="sulat"><?php echo getAnnouncement();?></div>
               </div>
             </div>
        </div>
  </div>
  </header>

  <section class="section1" id="s1">
    <div class="container-fluid py-lg-5">
      <div class="row justify-content-center jbg pt-4">
        <div class="col-lg-5 py-lg-5 order-lg-2">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <br />
              <img class="img-fluid kenburns-bottom" src="resource/img/scholar2.png" alt="scholarpic">
            </div>
          </div>
        </div>
        <div class="col-lg-5 py-lg-5 order-lg-1">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <h1 class="headermain tracking-in-expand">Entrance  <b class="ceupink">Scholarship</b></h1>
            <p class="sulat slide-in-left">Entrance scholarship is given to first-year students who meet the eligibility requirements and will enroll in the first semester of the academic year.<br />
            </p>
            <br />
            <p class="sulat2 text-left slide-in-left">
              ◉ CEU Legacy Scholarship <br>
              ◉ CEU Founders Scholarship<br>
              ◉ CEU Achievers Scholarship<br>
              ◉	Entrance Scholarship for Medicine <br>
              ◉ Entrance Scholarship for Graduate School <br>
              ◉ Entrance Scholarship for Juris Doctor (Makati Only)<br>
            </p>
            <br />
            <a href="entscholarship" class="btn btn-ghost col-lg-6 slide-in-left">Apply Now!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section2" id="s2">
    <div class="container-fluid py-lg-5">
      <div class="row justify-content-center jbg pt-4">
        <div class="col-lg-5 py-lg-5">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <br />
              <img class="img-fluid kenburns-bottom" src="resource/img/scholar3.png" alt="scholarpic">
            </div>
          </div>
        </div>
        <div class="col-lg-5 py-lg-5">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <h1 class="headermain">University <b class="ceupink">Scholarship</b></h1>
            <p class="sulat slide-in-left">The University Scholarship is applicable for continuing students who meets the eligibility requirements.<br />
            </p>
            <br />
            <p class="sulat2 text-left slide-in-left">
              The following scholarships are  <b class="ceupink"> only available for continuing students:</b><br /><br />
              ◉ University Full Academic Scholarship<br>
              ◉ University Partial Academic Scholarship<br>
              ◉ CEU Legacy (Renewal)<br>
              ◉ CEU Achievers Scholarship (Renewal) <br>
              ◉ President Scholarship<br>
              ◉ Centennial Scholarship(Renewal)  <br>
              ◉ Texas Scholarship (Renewal) <br>
              ◉ Academic Scholarship for Medicine<br>
              ◉ Academic Scholarship for Graduate School<br>
              ◉ Academic Scholarship for Juris Doctor(Makati Only) <br>
              ◉ Private Scholarship (School Based Scholarships) <br>
            </p>
            <br />
            <a href="unvscholarship" class="btn btn-ghost col-lg-6 slide-in-left">Apply Now!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section3" id="s3">
    <div class="container-fluid py-lg-5">
      <div class="row justify-content-center jbg pt-4">
        <div class="col-lg-5 py-lg-5 order-lg-2">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <br />
              <img class="img-fluid kenburns-bottom" src="resource/img/scholar5.png" alt="scholarpic">
            </div>
          </div>
        </div>
        <div class="col-lg-5 py-lg-5 order-lg-1">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <h1 class="headermain">Entrance  <b class="ceupink">Grants</b></h1>
              <p class="sulat slide-in-left">Entrance grant is given to first-year students who meet the eligibility requirements and will enroll in the first semester of the academic year.<br />
              </p>
              <br />
              <p class="sulat2 text-left slide-in-left">
                ◉ R.A - 6728 Grant<br>
                ◉ CEU Singers Grant <br>
                ◉ CEU Concert Band Grant <br>
                ◉	CEU Varsity Grant <br>
                ◉ CEU Pep Squad Grant<br>
                ◉ CEU Folk Dance Troupe Grant<br>
                ◉ CEU Alumni Foundation Inc. Grant <br>
              </p>
              <br />
              <a href="entgrant" class="btn btn-ghost col-lg-6 slide-in-left">Apply Now!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section4" id="s4">
    <div class="container-fluid py-lg-5">
      <div class="row justify-content-center jbg pt-4">
        <div class="col-lg-5 py-lg-5 ">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <br />
              <img class="img-fluid kenburns-bottom" src="resource/img/scholar4.png" alt="scholarpic">
            </div>
          </div>
        </div>
        <div class="col-lg-5 py-lg-5">
          <div class="jumbotron jumbotron-fluid p-4 header-text text-center ">
            <div class="container">
              <h1 class="headermain">University  <b class="ceupink">Grants</b></h1>
              <p class="sulat slide-in-left">University grant is given to continuing students who meet the eligibility requirements.<br />
              </p>
              <br />
              The following grants are  <b class="ceupink"> only available for continuing students:</b><br /><br />
              <p class="sulat2 text-left slide-in-left">
                ◉ R.A - 6728 Grant <br>
                ◉ CEU Singers Grant <br>
                ◉ CEU Concert Band Grant <br>
                ◉	CEU Varsity Grant <br>
                ◉ CEU Pep Squad Grant<br>
                ◉ CEU Folk Dance Troupe Grant<br>
                ◉ CEU Alumni Foundation Inc. Grant <br>
                ◉ University Student Council Grant <br>
                ◉ CEU Education Foundation Financial  Assistance <br>
                ◉ University Student Council Officer Grant <br>
                ◉ Medtech Student Council Grant <br>
                ◉ Mr. & Ms. CEU Grant <br>
              </p>
              <br />
              <a href="unvgrant" class="btn btn-ghost col-lg-6 slide-in-left">Apply Now!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<div class="rtbutton">
  <a href="#home"><i class="fas fa-chevron-circle-up ceupink"></i></a>
</div>
</body>
    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
