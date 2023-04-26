<?php
require_once 'config.php';
class approve extends config{
  public $tn,$reason;

  public function __construct($tn =null,$reason = null){
  $this->tn= $tn;
  $this->reason= $reason;
  }

  public function ESapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='DEAN1',`date_or_reviewed`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function EGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='DEAN2',`date_or_reviewed`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function USapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_scholarship` SET `remarks` ='DEAN3',`date_or_reviewed`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function UGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='DEAN4',`date_or_reviewed`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function ESdisapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='REJECTED',`date_or_reviewed`=NOW(),`rejectreason`='$this->reason',`disapprovedby`='Scholarship Officer' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
}
?>
