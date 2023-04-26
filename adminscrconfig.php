<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAdmin($user->data()->groups);

if(!empty($_POST)){
  $config = new config;
  $con = $config->con();
  $sql = "UPDATE `adminconfig` SET `semester`='$_POST[sem]',`schoolyear`='$_POST[schoolyear]',`eslock`='$_POST[esl]',`eglock`='$_POST[egl]',`uslock`='$_POST[usl]',`uglock`='$_POST[ugl]' WHERE 1";
  $data = $con-> prepare($sql);
  $data ->execute();
  header("location:adminscrdashboard.php");
}
?>
