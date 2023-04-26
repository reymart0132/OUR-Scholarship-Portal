<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
require_once('resource/php/class/config.php');
require_once('resource/php/class/saoapprove.php');
require_once('resource/php/functions/funct.php');
if($_GET['tn']){
  $approve = new saoapprove($_GET['tn']);
  $uid = $_GET['uid'];
  require_once('fpdf.php');
  require_once('fpdi/src/autoload.php');
  getImage($uid);
  $filename= findUGfile($_GET['tn']);
  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('application/universitygrants/'.$filename);
  $template = $pdf->importPage(1);
    $pdf->useTemplate($template);
    $pdf->Image("signature/".findUsername($uid).".png", "110","257", "40","12");
    $pdf->SetFont('Helvetica');
    $pdf->SetFontSize(5.5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/universitygrants/'.$filename);
    $approve->UGapprovedSO();
  header('Location: saoug.php');
}else{
  header("HTTP/1.1 403 Forbidden");
  exit;
}



function getImage($number){
    if($number == NULL){
      return "";
    }else{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` WHERE `id` = '$number'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
    file_put_contents("signature/".$rows[0]['username'].".png", $rows[0]['dp']);
  }
}
?>
