<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$adjust = new adjust($_GET['tn']);
$uid = $user->data()->id;
isAccounting($user->data()->groups);
$adjust->ESadjustedSO();
header('Location:actdashboard.php');
?>
