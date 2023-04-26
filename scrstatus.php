<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
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
     <div class="container-fluid ">
      <div class="row justify-content-center mt-lg-5">

          <div class="col-lg-5  mt-lg-5">
            <form class="text-center p-5 slide-in-left shadow bgc" action="scrsresult" method="post" >
              <h3 class="headermain2 mb-4"><b class="ceupink">Office of the Registrar</b> Scholarship and Grants Status Checker</h3>
            <p>Please enter the scholarship reference number</p>
            <input type="text" id="tn" class="form-control my-2" name="tn" placeholder="Reference Number" style="text-align:center;font-size:80%;color:white;background-color: rgba(255, 255, 255, 0);" required>
            <div class="d-flex justify-content-around">
            </div>
            <input type =hidden name="token" value="<?php echo Token::generate(); ?>">
            <input  type="submit"  class="btn btn-info btn-block my-4"value="Check Scholarship Status"/>
            </form>
          </div>

          <div class="col-lg-5  mt-lg-5 d-none d-lg-block">
            <div class="jumbotron jumbotron-fluid p-4 header-text text-center slide-in-left  ">
              <div class="container ">
                <h1 class="headermain3 mt-lg-5">TIME TO <br /><b class="ceupink"> RECOGNIZE.</b></h1>
              </div>
            </div>
          </div>

        </div>
      </div>
    </header>
        <script src="vendor/js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
        <script  src="resource/js/scrstatus.js"></script>
    </body>
    </html>
