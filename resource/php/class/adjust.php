<?php
require_once 'config.php';
class adjust extends config{
  public $tn,$reason;

  public function __construct($tn =null,$reason = null){
  $this->tn= $tn;
  $this->reason= $reason;
  }

  public function ESadjustedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='ADJ1',`date_acc_adj`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function EGadjustedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='ADJ2',`date_acc_adj`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function USadjustedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_scholarship` SET `remarks` ='ADJ3',`date_acc_adj`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

  public function UGadjustedSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='ADJ4',`date_acc_adj`=NOW() where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
}
?>
