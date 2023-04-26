<?php
date_default_timezone_set('Asia/Manila');
session_start();
$GLOBALS['config'] = array(
    'mysql'=>array(
        // 'host' => '127.0.0.1',
        // 'username' =>'root',
        // 'password' =>'',
        // 'db'=>'ourscholar'
        'host' => '109.106.254.187',
        'username' =>'ceumnlre_root',
        'password' =>'Eg5c272klko5',
        'db'=>'ceumnlre_ourscholar'
    ),
    'remember'=>array(
        'cookie_name' => 'hash',
        'cookie_expiry' =>604800
    ),
    'session'=>array(
        'session_name' =>'user',
        'token_name' =>'token'
    )
);

require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/functions/sanitize.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/functions/funct.php';

?>
