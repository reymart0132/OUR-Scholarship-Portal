<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/functions/funct.php';
require_once 'config.php';

class viewtablesREG extends config{

  public $id;
  public $date;
  public $college;

  function __construct($college=null,$id=null,$date=null) {

      $this->id=$id;
      $this->date=$date;
      $this->college=$college;
  }

  public function viewPendingTableUS(){
      $con = $this->con();
      $sql = "SELECT * FROM `tbl_university_scholarship` WHERE `remarks` IN ('REG3')";
      $data= $con->prepare($sql);
      $data->execute();
      $result = $data->fetchAll(PDO::FETCH_ASSOC);
      echo "<h3 class='text-center'> Pending Continuing Scholarship for Approval </h3>";
      echo "<div class='table-responsive'>";
      echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
      echo "<thead class='thead-dark'>";
      echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
      echo "<th>Fullname</th>";
      echo "<th class='d-none d-sm-table-cell'>Course</th>";
      echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
      echo "<th class='d-none d-sm-table-cell'>College</th>";
      echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
      echo "<th style='font-size: 85%;'>Duration</th>";
      echo "<th style='font-size: 85%;'>Date Applied</th>";
      echo "<th>View Documents</th>";
      echo "<th>Actions</th>";
      echo "</thead>";
      foreach ($result as $data) {
      echo "<tr>";
      echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
      echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
      echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
      echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
      echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
      echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
      echo "<td style='font-size: 85%;'>$data[ysemester]</td>";
      echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
      if($data['filename']!== ""){
      echo "<td>
                <a href='/ourscholar/requirements/universityscholarship/$data[filename]' class='btn btn-info btn-sm col-12 mt-1' target='__blank'><i class='fa fa-eye'></i>View Requirements</a>
                <a href='/ourscholar/application/universityscholarship/$data[rof15]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF015</a>
           </td>";
      }else{
      echo "<td>
                <a href='/ourscholar/application/universityscholarship/$data[rof15]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF015</a>
           </td>";
      }
      echo "<td>
                <a href='regapproveUS.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                <a href='regusreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
            </td>";
      echo "</tr>";
      }
      echo "</table>";
      echo "</div>";

    }

  public function viewPendingTableES(){
      $con = $this->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `remarks` IN ('REG1')";
      $data= $con->prepare($sql);
      $data->execute();
      $result = $data->fetchAll(PDO::FETCH_ASSOC);
      echo "<h3 class='text-center'> Pending Entrance Scholarship for approval </h3>";
      echo "<div class='table-responsive'>";
      echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
      echo "<thead class='thead-dark'>";
      echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
      echo "<th>Fullname</th>";
      echo "<th class='d-none d-sm-table-cell'>Course</th>";
      echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
      echo "<th class='d-none d-sm-table-cell'>College</th>";
      echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
      echo "<th style='font-size: 85%;'>Date Applied</th>";
      echo "<th>View Documents</th>";
      echo "<th>Actions</th>";
      echo "</thead>";
      foreach ($result as $data) {
      echo "<tr>";
      echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
      echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
      echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
      echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
      echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
      echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
      echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
      echo "<td>
                <a href='/ourscholar/requirements/entrancescholarship/$data[filename]' class='btn btn-info btn-sm col-12 mt-1' target='__blank'><i class='fa fa-eye'></i>View Requirements</a>
                <a href='/ourscholar/application/entrancescholarship/$data[rof13]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF013</a>
                <a href='/ourscholar/application/entrancescholarship/$data[rof14]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF014</a>
           </td>";
      echo "<td>
                <a href='regapproveES.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                <a href='regesreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
            </td>";
      echo "</tr>";
      }
      echo "</table>";
      echo "</div>";

    }

public function viewPendingTableEG(){
    $con = $this->con();
    $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `remarks` IN ('REG2')";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 class='text-center'> Pending Entrance Grants for Approval </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
    echo "<th>Fullname</th>";
    echo "<th class='d-none d-sm-table-cell'>Course</th>";
    echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
    echo "<th class='d-none d-sm-table-cell'>College</th>";
    echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
    echo "<th style='font-size: 85%;'>Date Applied</th>";
    echo "<th>View Documents</th>";
    echo "<th>Actions</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
    echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
    echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
    echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
    echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
    echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
    echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
    if($data['filename']!== ""){
    echo "<td>
              <a href='/ourscholar/requirements/entrancegrant/$data[filename]' class='btn btn-info btn-sm col-12 mt-1' target='__blank'><i class='fa fa-eye'></i>View Requirements</a>
              <a href='/ourscholar/application/entrancegrant/$data[rof64]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF064</a>
              <a href='/ourscholar/application/entrancegrant/$data[rof63]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF063</a>
         </td>";
    }else{
    echo "<td>
              <a href='/ourscholar/application/entrancegrant/$data[rof64]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF064</a>
              <a href='/ourscholar/application/entrancegrant/$data[rof63]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF063</a>
         </td>";
    }
    echo "<td>
              <a href='regapproveEG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
              <a href='regegreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

  }

    public function viewPendingTableUG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_university_grants` WHERE `remarks` IN ('REG4')";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> Pending Continuing Grants for Approval </h3>";
        echo "<div class='table-responsive'>";
        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
        echo "<thead class='thead-dark'>";
        echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
        echo "<th>Fullname</th>";
        echo "<th class='d-none d-sm-table-cell'>Course</th>";
        echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
        echo "<th class='d-none d-sm-table-cell'>College</th>";
        echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
        echo "<th style='font-size: 85%;'>Duration</th>";
        echo "<th style='font-size: 85%;'>Date Applied</th>";
        echo "<th>View Documents</th>";
        echo "<th>Actions</th>";
        echo "</thead>";
        foreach ($result as $data) {
        echo "<tr>";
        echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
        echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
        echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
        echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
        echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
        echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
        echo "<td style='font-size: 85%;'>$data[ysemester]</td>";
        echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
        if($data['filename']!== ""){
        echo "<td>
                  <a href='/ourscholar/requirements/universitygrants/$data[filename]' class='btn btn-info btn-sm col-12 mt-1' target='__blank'><i class='fa fa-eye'></i>View Requirements</a>
                  <a href='/ourscholar/application/universitygrants/$data[rof65]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF065</a>
             </td>";
        }else{
        echo "<td>
                  <a href='/ourscholar/application/universitygrants/$data[rof65]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF065</a>
             </td>";
        }
        echo "<td>
                  <a href='regapproveUG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                  <a href='regugreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
              </td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

      }
}
?>
