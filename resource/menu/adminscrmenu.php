<?php
if(isset($open) && $open){
  //do what it is supposed to do
}
else {
  header("HTTP/1.1 403 Forbidden");
  exit;
}
?>
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
          <a class="dropdown-item " href="adminscrdashboard">Scholarship Dashboard</a>
          <a class="dropdown-item " href="admes">For Review - Entrance Scholarship </a>
          <a class="dropdown-item " href="admeg">For Review - Entrance Grants </a>
          <a class="dropdown-item " href="admus">For Review - Continuing Scholarship </a>
          <a class="dropdown-item " href="admug">For Review - University Grants </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="reports" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Scholarship Reports
        </a>
        <div class="dropdown-menu" aria-labelledby="reports">
          <a class="dropdown-item" href="admesreport">Entrance Scholarship Report</a>
          <a class="dropdown-item" href="admusreport">Continuing Scholarship Report</a>
          <a class="dropdown-item" href="admegreport.php">Entrance Grants Report</a>
          <a class="dropdown-item" href="admugreport.php">University Grants Report</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAccounts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin and Accounts Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAccounts">
          <a class="dropdown-item border" href="export.php">Export All</a>
          <a class="dropdown-item border" href="clearing.php">Site Reset</a>
          <a class="dropdown-item border" href="freject.php">Force Rejection</a>
          <a class="dropdown-item border" href="updateprofile.php">Update Profile</a>
          <a class="dropdown-item border" href="changepassword.php">Change Password</a>
          <a class="dropdown-item" href="Logout.php">Logout</a>
        </div>
      </li>

    </ul>
  </div>
</nav>
