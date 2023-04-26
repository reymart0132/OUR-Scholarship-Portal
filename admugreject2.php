<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAdmin($user->data()->groups);
$uid = findName($uid);
$tn=$_POST['tn'];
$open=1;
$data=findEGinfo($tn);
$fullname = $data[0]->lastname." ".$data[0]->firstname;
$email =$data[0]->email;


if(!empty($_POST['tn'])){
  $reject = new reject($_POST['tn'],$_POST['reason'],$uid);
  $reject->UGRejectSO();
  include 'vendor/rejectemail.php';
  header("Location:admug");
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}

// var_dump($transaction);

 ?>
