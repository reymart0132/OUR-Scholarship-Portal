<?php
require_once 'config.php';
class regapprove extends config{
  public $tn,$reason;

  public function __construct($tn =null,$reason = null){
  $this->tn= $tn;
  $this->reason= $reason;
  }

  public function ESapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='APP1',`date_registrar_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function EGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='APP2',`date_registrar_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function USapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_scholarship` SET `remarks` ='APP3',`date_registrar_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function UGapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='APP4',`date_registrar_approved`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function ESdisapprovedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='REJECTED',`date_registrar_approved`=NOW(),`rejectreason`='$this->reason',`disapprovedby`='Scholarship Officer' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
}
?>
