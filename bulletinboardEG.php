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
            <a href="bulletinboardES" class="nav-item nav-link navitem ml-4 ">ENTRANCE SCHOLAR LIST</a>
            <a href="bulletinboardEG" class="nav-item nav-link navitem ml-4 active">ENTRANCE GRANTEE LIST</a>
            <a href="bulletinboardUS" class="nav-item nav-link navitem ml-4 ">UNIVERSITY SCHOLARS LIST</a>
            <a href="bulletinboardUG" class="nav-item nav-link navitem ml-4 ">UNIVERSITY GRANTEE LIST</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
     <div class="container-fluid bgc  mt-2">
      <div class="row justify-content-center p-5">
          <h3 class="headermain2 mb-4"><b class="ceupink">Office of the Registrar</b> LIST OF ENTRANCE GRANTEE</h3>
          <div class="col-12">
            <p class="text-center"> The Office of the Registrar congratulates the following students who were granted the Entrance Grant Award. <br />You may now download your scholarship forms by entering your reference number <a class ="ceupink" href="scrstatus">here</a></p></div>
          </div>
            <div class="row justify-content-center border">
              <?php bblistEG();?>
            </div>




        </div>
      </div>
    </header>
        <script src="vendor/js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
    </body>
    </html>
