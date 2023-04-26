<?php
require_once 'config.php';
class deanapprove extends config{
  public $tn,$reason;

  public function __construct($tn =null,$reason = null){
  $this->tn= $tn;
  $this->reason= $reason;
  }

  public function ESapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='REG1',`date_dean_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function EGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='SAO2',`date_dean_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  
    public function EGapprovedSO2(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='REG2',`date_dean_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  
  public function UGapprovedSO2(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='REG4',`date_dean_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function USapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_scholarship` SET `remarks` ='REG3',`date_dean_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function UGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='SAO4',`date_dean_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function ESdisapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='REJECTED',`date_dean_approved`=NOW(),`rejectreason`='$this->reason',`disapprovedby`='Scholarship Officer' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
}
?>
