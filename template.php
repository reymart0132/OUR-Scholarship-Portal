<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;

// var_dump($transaction);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CEU Scholarship Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Portal</title>
    <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
    <link href="vendor/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
    <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="vendor/css/dataTables.css">
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-3 slide-in-left" style="z-index:10; ">
      <a class="navbar-brand" href="https://ceu.edu.ph/">
          <img src="resource/img/logo.jpg" height="70" class=""
            alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuTransaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dashboards
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuTransaction">
              <a class="dropdown-item " href="#">Scholarship Dashboard</a>
              <a class="dropdown-item " href="#">For Approval - Entrance Scholarship </a>
              <a class="dropdown-item " href="#">For Approval - Entrance Grants </a>
              <a class="dropdown-item " href="#">For Approval - Continuing Scholarship </a>
              <a class="dropdown-item " href="#">For Approval - University Grants </a>
              <a class="dropdown-item " href="#">Disapproved - Scholarship</a>
              <a class="dropdown-item " href="#">Disapproved- Grants</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAccounts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Scholarship Reports
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAccounts">
              <a class="dropdown-item" href="#.php">OUR Scholarship Report</a>
              <a class="dropdown-item" href="#.php">Entrance Scholarship Report</a>
              <a class="dropdown-item" href="#.php">Continuing Scholarship Report</a>
              <a class="dropdown-item" href="#.php">Entrance Grants Report</a>
              <a class="dropdown-item" href="#.php">University Grants Report</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAccounts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Accounts Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAccounts">
              <a class="dropdown-item border" href="updateprofile.php">Admin Settings</a>
              <a class="dropdown-item border" href="updateprofile.php">Update Profile</a>
              <a class="dropdown-item border" href="updateprofile.php">Change Password</a>
              <a class="dropdown-item" href="Logout.php">Logout</a>
            </div>
          </li>

        </ul>
      </div>
  </nav>

          <div class="container-fluid  slide-in-left shadow-sm p-3 p-4">
            test
          </div>

    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
