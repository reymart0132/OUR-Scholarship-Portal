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
          Accounting Dashboard
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuTransaction">
          <a class="dropdown-item " href="actdashboard">Approved Entrance Scholarship Dashboard</a>
          <a class="dropdown-item " href="actus">Approved University Scholarship Dashboard</a>
          <a class="dropdown-item " href="actug">Approved University Grants Dashboard</a>
          <a class="dropdown-item " href="acteg">Approved Entrance Grants Dashboard</a>
          <a class="dropdown-item " href="exportb">Export All</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAccounts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accounts Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAccounts">
          <a class="dropdown-item border" href="updateprofile.php">Change Password</a>
          <a class="dropdown-item" href="Logout.php">Logout</a>
        </div>
      </li>

    </ul>
  </div>
</nav>
