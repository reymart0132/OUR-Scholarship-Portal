<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/functions/funct.php';
require_once 'config.php';

class viewtablesDean extends config{

  public $id;
  public $date;
  public $college;

  function __construct($college=null,$id=null,$date=null) {

      $this->id=$id;
      $this->date=$date;
      $this->college=$college;
  }


public function viewPendingTableES(){
    $con = $this->con();
    $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `remarks` IN ('DEAN1') && `college` ='$this->college'";
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
              <a href='deanapproveES.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
              <a href='deanesreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-Compliance</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

  }



public function viewPendingTableEG(){
    $con = $this->con();
    $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `remarks` IN ('DEAN2') && `college` ='$this->college'";
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
              <a href='deanapproveEG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
              <a href='deanegreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-Compliance</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

  }

  public function viewPendingTableUS(){
      $con = $this->con();
      $sql = "SELECT * FROM `tbl_university_scholarship` WHERE `remarks` IN ('DEAN3') && `college` ='$this->college'";
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
                <a href='deanapproveUS.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                <a href='deanusreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-Compliance</a>
            </td>";
      echo "</tr>";
      }
      echo "</table>";
      echo "</div>";

    }

    public function viewPendingTableUG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_university_grants` WHERE `remarks` IN ('DEAN4') && `college` ='$this->college'";
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
                  <a href='deanapproveUG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
                  <a href='deanugreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-Compliance</a>
              </td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

      }

        public function viewTableEG(){
            $con = $this->con();
            $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `college` ='$this->college'";
            $data= $con->prepare($sql);
            $data->execute();
            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            echo "<h3 class='text-center'> Approved Entrance Grants </h3>";
            echo "<div class='table-responsive'>";
            echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
            echo "<thead class='thead-dark'>";
            echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
            echo "<th>Fullname</th>";
            echo "<th class='d-none d-sm-table-cell'>Course</th>";
            echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
            echo "<th class='d-none d-sm-table-cell'>College</th>";
            echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
            echo "<th style='font-size: 85%;'>Remarks</th>";
            echo "<th style='font-size: 85%;'>Date Applied</th>";
            echo "<th style='font-size: 85%;'>Date Reviewed</th>";
            echo "<th style='font-size: 85%;'>Date Dean Signed</th>";
            echo "<th style='font-size: 85%;'>Date SAO Reviewed</th>";
            echo "<th style='font-size: 85%;'>Date Registrar Signed</th>";
            echo "<th>View Documents</th>";
            echo "</thead>";
            foreach ($result as $data) {
            echo "<tr>";
            echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
            echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
            echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
            echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
            echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
            echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
            echo "<td class='d-none d-sm-table-cell'>".checkRemarks($data['remarks'])."</td>";
            echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
            echo "<td style='font-size: 85%;'>$data[date_or_reviewed]</td>";
            echo "<td style='font-size: 85%;'>$data[date_sao_review]</td>";
            echo "<td style='font-size: 85%;'>$data[date_dean_approved]</td>";
            echo "<td style='font-size: 85%;'>$data[date_registrar_approved]</td>";
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
            echo "</tr>";
            }
            echo "</table>";
            echo "</div>";

          }

                public function viewTableUG(){
                    $con = $this->con();
                    $sql = "SELECT * FROM `tbl_university_grants` WHERE `college` ='$this->college'";
                    $data= $con->prepare($sql);
                    $data->execute();
                    $result = $data->fetchAll(PDO::FETCH_ASSOC);
                    echo "<h3 class='text-center'> Approved Continuing Grants</h3>";
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
                    echo "<th style='font-size: 85%;'>Remarks</th>";
                    echo "<th style='font-size: 85%;'>Date Applied</th>";
                    echo "<th style='font-size: 85%;'>Date Reviewed</th>";
                    echo "<th style='font-size: 85%;'>Date SAO Reviewed</th>";
                    echo "<th style='font-size: 85%;'>Date Dean Signed</th>";
                    echo "<th style='font-size: 85%;'>Date Registrar Signed</th>";
                    echo "<th>View Documents</th>";
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
                    echo "<td class='d-none d-sm-table-cell'>".checkRemarks($data['remarks'])."</td>";
                    echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
                    echo "<td style='font-size: 85%;'>$data[date_or_reviewed]</td>";
                    echo "<td style='font-size: 85%;'>$data[date_sao_review]</td>";
                    echo "<td style='font-size: 85%;'>$data[date_dean_approved]</td>";
                    echo "<td style='font-size: 85%;'>$data[date_registrar_approved]</td>";
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
                    echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";

                  }

                  public function viewTableUS(){
                      $con = $this->con();
                      $sql = "SELECT * FROM `tbl_university_scholarship` WHERE `college` ='$this->college'";
                      $data= $con->prepare($sql);
                      $data->execute();
                      $result = $data->fetchAll(PDO::FETCH_ASSOC);
                      echo "<h3 class='text-center'> Approved Continuing Scholarship</h3>";
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
                      echo "<th style='font-size: 85%;'>Remarks</th>";
                      echo "<th style='font-size: 85%;'>Date Applied</th>";
                      echo "<th style='font-size: 85%;'>Date Reviewed</th>";
                      echo "<th style='font-size: 85%;'>Date Dean Signed</th>";
                      echo "<th style='font-size: 85%;'>Date Registrar Signed</th>";
                      echo "<th>View Documents</th>";
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
                      echo "<td class='d-none d-sm-table-cell'>".checkRemarks($data['remarks'])."</td>";
                      echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
                      echo "<td style='font-size: 85%;'>$data[date_or_reviewed]</td>";
                      echo "<td style='font-size: 85%;'>$data[date_dean_approved]</td>";
                      echo "<td style='font-size: 85%;'>$data[date_registrar_approved]</td>";
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
                      echo "</tr>";
                      }
                      echo "</table>";
                      echo "</div>";

                    }

                    public function viewTableES(){
                        $con = $this->con();
                        $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `college` ='$this->college'";
                        $data= $con->prepare($sql);
                        $data->execute();
                        $result = $data->fetchAll(PDO::FETCH_ASSOC);
                        echo "<h3 class='text-center'>Approved Entrance Scholarship</h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                        echo "<thead class='thead-dark'>";
                        echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
                        echo "<th>Fullname</th>";
                        echo "<th class='d-none d-sm-table-cell'>Course</th>";
                        echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
                        echo "<th class='d-none d-sm-table-cell'>College</th>";
                        echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
                        echo "<th style='font-size: 85%;'>Status";
                        echo "<th style='font-size: 85%;'>Date Applied</th>";
                        echo "<th style='font-size: 85%;'>Date Reviewed</th>";
                        echo "<th style='font-size: 85%;'>Date Dean Signed</th>";
                        echo "<th style='font-size: 85%;'>Date Registrar Signed</th>";
                        echo "<th>View Documents</th>";
                        echo "</thead>";
                        foreach ($result as $data) {
                        echo "<tr>";
                        echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
                        echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
                        echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
                        echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
                        echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
                        echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
                        echo "<td class='d-none d-sm-table-cell'>".checkRemarks($data['remarks'])."</td>";
                        echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
                        echo "<td style='font-size: 85%;'>$data[date_or_reviewed]</td>";
                        echo "<td style='font-size: 85%;'>$data[date_dean_approved]</td>";
                        echo "<td style='font-size: 85%;'>$data[date_registrar_approved]</td>";
                        echo "<td>
                                  <a href='/ourscholar/requirements/entrancescholarship/$data[filename]' class='btn btn-info btn-sm col-12 mt-1' target='__blank'><i class='fa fa-eye'></i>View Requirements</a>
                                  <a href='/ourscholar/application/entrancescholarship/$data[rof13]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF013</a>
                                  <a href='/ourscholar/application/entrancescholarship/$data[rof14]' class='btn btn-info btn-sm col-12 mt-1'target='__blank'><i class='fa fa-eye'></i>View ROF014</a>
                             </td>";
                        echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";

                      }
}
?>
