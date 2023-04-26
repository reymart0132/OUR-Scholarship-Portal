<?php
require_once 'config.php';
class uginsert{
    public $studentnumber, $Lastname, $Firstname, $Middlename, $cgrant,$pgrant, $college,$dateapplied,$email,$course, $GWA,$transnumber,$file,$filename,$Status,$semester;

    function __construct($studentnumber=null, $Lastname=null, $Firstname=null, $Middlename=null, $cgrant=null,$pgrant=null, $college=null,$dateapplied=null,$email=null,$course=null, $GWA=null,$transnumber=null,$file,$Status=null,$semester=null) {

      $this->studentnumber=$studentnumber;
      $this->lastname=$Lastname;
      $this->firstname=$Firstname;
      $this->middlename=$Middlename;
      $this->college=$college;
      $this->awardtitle=$cgrant;
      $this->pgrant=$pgrant;
      $this->dateapplied=$dateapplied;
      $this->email=$email;
      $this->course=$course;
      $this->GWA=$GWA;
      $this->semester=$semester;
      $this->transnumber=$transnumber;
      $this->file=$file;
      $this->Status=$Status;
      if($this->file== true){
        $this->filename = "UGA".findCourseABV($course).$Lastname.$Firstname.$studentnumber.".pdf";
      }else{
        $this->file = null;
      }
      $this->rof65 = "ROF65".getSemester2().findCourseABV($course).$Lastname.$Firstname.$studentnumber.".pdf";
    }

    public function insertUGApplication(){
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `tbl_university_grants`(`studentnumber`, `lastname`, `firstname`, `middlename`,`college`,`course`,`scholarshiptype`,`pgrant`, `date_applied`, `filename`, `rof65`,`email`,`transnumber`,`GWA`,`stats`,`ysemester`) VALUES('$this->studentnumber','$this->lastname','$this->firstname','$this->middlename','$this->college','$this->course','$this->awardtitle','$this->pgrant',NOW(),'$this->filename','$this->rof65','$this->email','$this->transnumber',$this->GWA,'$this->Status','$this->semester')";
        $data1 = $con->prepare($sql1);
        $data1 ->execute();
    }

    public function findCourse(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_course` where `id`=$this->Course";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->course;
    }
    public function findPurpose(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_purposes` where `purp_id`=$this->Purpose";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->purposes;
    }
    public function findCollege(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `collegeschool` where `id`=$this->College";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->college_school;
    }
    public function findID(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `applications` WHERE `LastName` = '$this->Lastname' ORDER BY `created` DESC LIMIT 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->id;
    }

    public function getSemester2(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `adminconfig`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->semester;
    }
}
?>
