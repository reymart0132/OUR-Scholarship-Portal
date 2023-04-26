<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isRegistrar($user->data()->groups);
$uid = findName($uid);
$open = 1;
$tn=$_POST['tn'];
$data=findESinfo($tn);
$fullname = $data[0]->lastname." ".$data[0]->firstname;
$email =$data[0]->email;



if(!empty($_POST['tn'])){
  $reject = new reject($_POST['tn'],$_POST['reason'],$uid);
  $reject->ESRejectSO();
  include 'vendor/rejectemail.php';
  header("Location:registrardashboard");
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}

// var_dump($transaction);

 ?>
