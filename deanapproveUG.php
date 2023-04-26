<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
require_once('resource/php/class/config.php');
require_once('resource/php/class/deanapprove.php');
require_once('resource/php/functions/funct.php');
if($_GET['tn']){
  $approve = new deanapprove($_GET['tn']);
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
    $pdf->SetFont('Helvetica');
    $pdf->SetFontSize(7.5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(30, 222);
    $pdf->Write(0, findName($uid)."(SGD)");
    // $pdf->Image("signature/".findUsername($uid).".png", "35","213", "40","12");
    $pdf->SetXY(109, 222);
    $pdf->Write(0, date("Y-m-d"));
    $pdf->Output('F',$_SERVER["DOCUMENT_ROOT"].'/ourscholar/application/universitygrants/'.$filename);
    if(findUGType($_GET['tn'])== "RA 6728 Grant" || findUGType($_GET['tn'])== "CEU Education Foundation Financial  Assistance"|| findUGType($_GET['tn'])== "20/21 Incentive Program"){
      $approve->UGapprovedSO2();
    }else{
      $approve->UGapprovedSO();
    }
  header('Location: deanug.php');
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
