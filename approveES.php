<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$approve = new approve($_GET['tn']);
$uid = $user->data()->id;
isAdmin($user->data()->groups);
$approve->ESapprovedSO();
header('Location:admes.php');
?>
