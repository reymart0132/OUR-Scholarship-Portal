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
  $filename= findEGfile($_GET['tn']);
  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile('application/entrancegrant/'.$filename);
  $template = $pdf->importPage(1);
    $pdf->useTemplate($template);
    $pdf->Image("signature/".findUsername($uid).".png", "100","82", "40","12");
    $pdf->SetFont('Helvetica');
    $pdf->SetFontSize(5.5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(120, 90);
    $pdf->Write(0, date("Y-m-d"));
    $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/entrancegrant/'.$filename);
    $approve->EGapprovedSO();
  header('Location: saodashboard.php');
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
