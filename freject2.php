<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAdmin($user->data()->groups);
$uid = findName($uid);
$status =checkTransaction($_POST['tn']);
$type = $status[strlen($status)-1];

if(!empty($_POST['tn'])){
  $reject = new reject($_POST['tn'],$_POST['reason'],$uid);

  if($type=="1"){
    $reject->ESRejectSO();

  }elseif ($type=="2") {
    $reject->EGRejectSO();

  }elseif ($type=="3") {
    $reject->USRejectSO();

  }elseif ($type=="4") {
    $reject->UGRejectSO();

  }
  header("Location:freject");
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}

// var_dump($transaction);

 ?>
