<?php
require_once 'config.php';
class saoapprove extends config{
  public $tn,$reason;

  public function __construct($tn =null,$reason = null){
  $this->tn= $tn;
  $this->reason= $reason;
  }

  public function EGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='REG2',`date_sao_review`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function UGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='REG4',`date_sao_review`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function ESdisapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='REJECTED',`date_sao_review`=NOW(),`rejectreason`='$this->reason',`disapprovedby`='Scholarship Officer' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
}
?>
