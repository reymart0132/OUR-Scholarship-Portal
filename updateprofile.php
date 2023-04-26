<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$view = new view;
$user = new user();
updateProfile();
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrar Portal</title>
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
   <link href="vendor/css/all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="resource/css/speech.css">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

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
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAccounts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Accounts Menu
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAccounts">
             <a class="dropdown-item border" href="updateprofile.php">Update Profile</a>
             <a class="dropdown-item border" href="changepassword.php">Change Password</a>
             <a class="dropdown-item" href="Logout.php">Logout</a>
           </div>
         </li>

       </ul>
     </div>
 </nav>

         <div class="container mt-5  pt-5 puff-in-center">
             <div class="row">
                 <div class="col-12">
                     <h1 class="text-center">Update your Information</h1>
                 </div>
            </div>
            <form action="" method="post">
                <table class="table ">
                    <tr>
                        <td>
                            <div class="row justify-content-center">
                                <div class="form-group col-4">
                                 <label for = "username" class=""> Username:</label>
                                 <input class="form-control"  type = "text" name="username" id="username" value ="<?php echo escape($user->data()->username); ?>" autocomplete="off"  />
                                </div>
                                <div class="form-group col-4">
                                 <label for = "fullName" class=""> Full Name</label>
                                 <input class="form-control"  type = "text" name="fullName" id="fullName" value ="<?php echo escape($user->data()->name); ?>"/required>
                                </div>
                                <div class="form-group col-4">
                                 <label for = "email" class=""> Email Address</label>
                                 <input class="form-control"  type = "text" name="email" id="email" value ="<?php echo escape($user->data()->email); ?>"/required>
                                </div>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row justify-content-center">
                                <div class="form-group col-md-5">
                                  <label for="College" >College/s to handle</label>
                                      <select id="College" name="College[]" class="selectpicker form-control" data-live-search="true" multiple required>
                                        <?php $view->degreeCollegeSP();?>
                                      </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label  >&nbsp;</label>
                                <input type="hidden" name ="Token" value="<?php echo Token::generate();?>" />
                                 <input type="submit" value="Update your profile" class=" form-control btn btn-primary" />
                                </div>
                                <div class="form-group col-6">
                                  <a href="changepassword.php" class="form-control btn btn-danger"> Change your Password</a>
                                </div>
                             </div>
                        </td>
                    </tr>
                </table>
             </form>
             <form action="updatepropic.php" method="post" enctype="multipart/form-data">
                 <table class="table">
                     <tr>
                         <td>
                             <div class="row justify-content-center">
                                 <div class="form-group col-4 text-right">
                                        <?php profilePic(); ?>
                                 </div>
                                 <div class="form-group col-6">
                                     <label for="myfile">Upload your Signature</label>
                                     <small>* Please upload your e-signature in a 250 x 100 png format.</small>
                                         <input id="myfile" type="file" name="myfile" class="form-control-file" />
                                         <input type="submit" name="pic" value="Update your Signature" class=" mt-4  form-control btn btn-success" accept="png" />
                                 </div>
                             </div>
                         </td>
                     </tr>
                 </table>
              </form>
         </div>
 </body>
 <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom  slide-in-right">
   <div class="container-fluid text-center">
       <div class="row justify-center-content">
           <div class="col-md-4 text-md-left">
               <small>Copyright &copy;Centro Escolar University -Office of the Registrar 2021</small>
           </div>
           <div class="col-md text-md-right">
             <div class=row>
               <div class="col-md-8">
                 <small>Created by: Reymart Bolasoc for Cynthia Sarmiento & Dr. Rhoda Aguilar</small>
               </div>
               <div class="col">
                 <a class="ml-4"href="index.php"><i class="fas fa-home ceucolor"></i></a>
                 <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
                 <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
                 <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
               </div>
             </div>
           </div>
       </div>
   </div>
 </footer>
     <script src="vendor/js/jquery.js"></script>
     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
     <script src="vendor/js/bootstrap-select.min.js"></script>
 </body>
 </html>
