<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/functions/funct.php';
require_once 'config.php';

class viewtablesSAO extends config{

  public $id;
  public $date;
  public $college;

  function __construct($college=null,$id=null,$date=null) {

      $this->id=$id;
      $this->date=$date;
      $this->college=$college;
  }


public function viewPendingTableEG(){
    $scholarship = array("RA 6728 Grant", "20/21 Incentive Program", "CEU Alumni Foundation Grant");
    $con = $this->con();
    $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `remarks` IN ('SAO2')";
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

    if( in_array($data["scholarshiptype"], $scholarship)){
    echo "<td>
              <a href=href='saoapproveEG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
              <a href='saoegreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
          </td>";
    }else{
      echo "<td>
                <a href='saoeditEG.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
                <a href='saoapproveEG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                <a href='saoegreject.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
           </td>";
    }

    echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

  }

    public function viewPendingTableUG(){
        $scholarship = array("RA 6728 Grant", "20/21 Incentive Program", "CEU Alumni Foundation Grant");
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_university_grants` WHERE `remarks` IN ('SAO4')";
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
        if( in_array($data["scholarshiptype"], $scholarship)){
        echo "<td>
                  <a href='saoapproveUG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                  <a href='saougreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
              </td>";
        }else{
          echo "<td>
                    <a href='saoeditUG.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
                    <a href='saoapproveUG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                    <a href='saougreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
               </td>";
        }

        echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

      }
}
?>
