<?php
require_once 'config.php';
class esainsert{
    public $studentnumber, $lastname, $firstname, $middlename, $formerschool, $college, $awardtitle, $year, $section, $addressfs, $dateapplied, $dob, $birthplace, $haddress, $caddress, $contacts,$email, $fathername, $foccupation, $femployer, $fincome, $mothername, $moccupation, $memployer, $mincome, $course, $rank, $honors, $genave, $awards1, $school1, $awards2, $school2, $awards3, $school3, $org1, $position1, $org2, $position2, $org3, $position3, $org4, $position4, $transnumber;

    function __construct($studentnumber=null, $lastname=null, $firstname=null, $middlename=null, $formerschool=null, $college=null, $awardtitle=null, $year=null, $section=null, $addressfs=null, $dateapplied=null, $dob=null, $birthplace=null, $haddress=null, $caddress=null, $contacts=null,$email=null, $fathername=null, $foccupation=null, $femployer=null, $fincome=null, $mothername=null, $moccupation=null, $memployer=null, $mincome=null, $course=null, $rank=null, $honors=null, $genave=null, $awards1=null, $school1=null, $awards2=null, $school2=null, $awards3=null, $school3=null, $org1=null, $position1=null, $org2=null, $position2=null, $org3=null, $position3=null, $org4=null, $position4=null, $transnumber = null) {

      $this->studentnumber=$studentnumber;
      $this->lastname=$lastname;
      $this->firstname=$firstname;
      $this->middlename=$middlename;
      $this->formerschool=$formerschool;
      $this->college=$college;
      $this->awardtitle=$awardtitle;
      $this->year=$year;
      $this->section=$section;
      $this->addressfs=$addressfs;
      $this->dateapplied=$dateapplied;
      $this->dob=$dob;
      $this->birthplace=$birthplace;
      $this->haddress=$haddress;
      $this->caddress=$caddress;
      $this->contacts=$contacts;
      $this->email=$email;
      $this->fathername=$fathername;
      $this->foccupation=$foccupation;
      $this->femployer=$femployer;
      $this->fincome=$fincome;
      $this->mothername=$mothername;
      $this->moccupation=$moccupation;
      $this->memployer=$memployer;
      $this->mincome=$mincome;
      $this->course=$course;
      $this->rank=$rank;
      $this->honors=$honors;
      $this->genave=$genave;
      $this->awards1=$awards1;
      $this->school1=$school1;
      $this->awards2=$awards2;
      $this->school2=$school2;
      $this->awards3=$awards3;
      $this->school3=$school3;
      $this->org1=$org1;
      $this->position1=$position1;
      $this->org2=$org2;
      $this->position2=$position2;
      $this->org3=$org3;
      $this->position3=$position3;
      $this->org4=$org4;
      $this->position4=$position4;
      $this->transnumber=$transnumber;
      $this->filename = "ESA".findCourseABV($course).$lastname.$firstname.$studentnumber.".pdf";
      $this->rof13 = "ROF13".findCourseABV($course).$lastname.$firstname.$studentnumber.".pdf";
      $this->rof14 = "ROF14".findCourseABV($course).$lastname.$firstname.$studentnumber.".pdf";


    }

    public function insertESApplicationData(){
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `tbl_entrance_scholarship_data`(`studentnumber`, `lastname`, `firstname`, `middlename`, `formerschool`, `college`, `awardtitle`, `year`, `section`, `addressfs`, `dateapplied`, `dob`, `birthplace`, `haddress`, `caddress`, `contacts`,`email`, `fathername`, `foccupation`, `femployer`, `fincome`, `mothername`, `moccupation`, `memployer`, `mincome`, `course`, `rank`, `honors`, `genave`, `awards1`, `school1`, `awards2`, `school2`, `awards3`, `school3`, `org1`, `position1`, `org2`, `position2`, `org3`, `position3`, `org4`, `position4`) VALUES('$this->studentnumber','$this->lastname','$this->firstname','$this->middlename','$this->formerschool','$this->college','$this->awardtitle','$this->year','$this->section','$this->addressfs','$this->dateapplied','$this->dob','$this->birthplace','$this->haddress','$this->caddress','$this->contacts','$this->email','$this->fathername','$this->foccupation','$this->femployer','$this->fincome',' $this->mothername',' $this->moccupation',' $this->memployer','$this->mincome','$this->course','$this->rank','$this->honors','$this->genave','$this->awards1','$this->school1','$this->awards2',' $this->school2','$this->awards3','$this->school3','$this->org1','$this->position1','$this->org2','$this->position2','$this->org3','$this->position3','$this->org4','$this->position4')";
        $data1 = $con-> prepare($sql1);
        $data1 ->execute();
    }
    public function insertESApplication(){
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `tbl_entrance_scholarship`(`studentnumber`, `lastname`, `firstname`, `middlename`,`college`,`course`,`scholarshiptype`, `date_applied`, `filename`, `rof13`, `rof14`,`email`,`transnumber`) VALUES('$this->studentnumber','$this->lastname','$this->firstname','$this->middlename','$this->college','$this->course','$this->awardtitle',NOW(),'$this->filename','$this->rof13','$this->rof14','$this->email','$this->transnumber')";
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
}
?>
