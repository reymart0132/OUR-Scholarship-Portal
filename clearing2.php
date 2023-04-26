<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAdmin($user->data()->groups);
if(!empty($_POST['sc'])){

  if(secretCode($_POST['sc'])){
    $files = glob($_SERVER['DOCUMENT_ROOT'].'/ourscholar/application/entrancegrant/*'); // get all file names
      foreach($files as $file){ // iterate files
        if(is_file($file)) {
          unlink($file); // delete file
        }
      }

      $files = glob($_SERVER['DOCUMENT_ROOT'].'/ourscholar/application/entrancescholarship/*'); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file)) {
            unlink($file); // delete file
          }
        }

        $files = glob($_SERVER['DOCUMENT_ROOT'].'/ourscholar/application/universitygrants/*'); // get all file names
          foreach($files as $file){ // iterate files
            if(is_file($file)) {
              unlink($file); // delete file
            }
          }

        $files = glob($_SERVER['DOCUMENT_ROOT'].'/ourscholar/application/universityscholarship/*'); // get all file names
          foreach($files as $file){ // iterate files
            if(is_file($file)) {
              unlink($file); // delete file
            }
          }
    }

  truncateBB();
  truncateEG();
  truncateES();
  truncateEG2();
  truncateES2();
  truncateUG();
  truncateUS();
  header("Location:Logout.php");
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}

// var_dump($transaction);

 ?>
