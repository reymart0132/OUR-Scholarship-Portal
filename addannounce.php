<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAdmin($user->data()->groups);

if(!empty($_POST)){
  $config = new config;
  $con = $config->con();
  $sql = "INSERT INTO `tbl_announcement`( `announcement`) VALUES ('$_POST[announcement]')";
  $data = $con-> prepare($sql);
  $data ->execute();
  header("location:adminscrdashboard.php");
}
?>
