<?php
require_once 'config.php';
class reject extends config{
  public $tn,$reason,$id;

  public function __construct($tn =null,$reason = null,$id){
  $this->tn= $tn;
  $this->reason= $reason;
  $this->id= $id;
  }

  public function ESRejectSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_scholarship` SET `remarks` ='REJ1',`date_or_reviewed`=NOW(),`rejectreason` = '$this->reason',`disapprovedby` ='$this->id',`studentnumber`='' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function EGRejectSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_entrance_grant` SET `remarks` ='REJ2',`date_or_reviewed`=NOW(),`rejectreason` = '$this->reason',`disapprovedby` ='$this->id',`studentnumber`='' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function USRejectSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_scholarship` SET `remarks` ='REJ3',`date_or_reviewed`=NOW(),`rejectreason` = '$this->reason',`disapprovedby` ='$this->id',`studentnumber`='' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }
  public function UGRejectSO(){
    $con = $this->con();
    $sql = "UPDATE `tbl_university_grants` SET `remarks` ='REJ4',`date_or_reviewed`=NOW(),`rejectreason` = '$this->reason',`disapprovedby` ='$this->id',`studentnumber`='' where `transnumber` = '$this->tn'";
    $data = $con->prepare($sql);
    if($data->execute()){
      return true;
    }else{
      return false;
   }
  }

}
?>
