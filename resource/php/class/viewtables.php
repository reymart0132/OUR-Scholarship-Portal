<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/functions/funct.php';
require_once 'config.php';

class viewtables extends config{

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
    $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `remarks` IN ('PENDING1')";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 class='text-center'> Entrance Scholarship for Review </h3>";
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

    // original codes without Modal for Approving Application
    // echo "<td>
    //           <a href='editES.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
    //           <a href='approveES.php?tn=$data[transnumber]' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
    //           <a href='admesreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
    //       </td>";

    // new codes without Modal for Approving Application - January 10, 2022
    echo "<td>
            <a href='editES.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
            <button class='btn btn-success btn-sm col-12 mt-1' data-toggle='modal' data-target='#example2Modal$data[transnumber]'><i class='fa fa-file-signature'></i>Approve Scholarship</button>";

    echo "<div class='modal fade' data-backdrop='false' id='example2Modal$data[transnumber]' tabindex='-1' role='dialog'>
            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
              <div class='modal-content'>
                <div class='modal-header text-body'>
                  <h5 class='modal-title' id='exampleModalLabel'>Confirm the Scholarship Application</h5>
                  <button type='button' class='close' data-dismiss='modal'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body text-body'>
                  <div class='row'>
                    <div class='col-auto mt-2'>
                      <img src='/ourscholar/resource/img/qm.png' class='img-fluid'>
                    </div>
                    <div class='col-sm'>
                      Are you sure you want to approve the <p class='text-info'>$data[scholarshiptype] of $data[firstname] $data[lastname] - ".findCourseABV($data['course'])."?</p>
                    </div>
                  </div>
                </div>
                <div class='modal-footer'>
                  <a class='btn btn-success btn-sm' href='approveES.php?tn=$data[transnumber]'>Approve Scholarship</a>
                </div>
              </div>
            </div>
          </div>";

    echo "<button href='admesreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</button>
        </td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";

  }



public function viewPendingTableEG(){
    $con = $this->con();
    $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `remarks` IN ('PENDING2')";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 class='text-center'> Entrance Grants for Review </h3>";
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

    // original codes without Modal for Approving Application
    // echo "<td>
    //           <a href='editEG.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
    //           <a href='approveEG.php?tn=$data[transnumber]' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
    //           <a href='admegreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
    //       </td>";

    // new codes without Modal for Approving Application - January 10, 2022
    echo "<td>
            <a href='editEG.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
            <button class='btn btn-success btn-sm col-12 mt-1' data-toggle='modal' data-target='#example3Modal$data[transnumber]'><i class='fa fa-file-signature'></i>Approve Grant</button>";

    echo "<div class='modal fade' data-backdrop='false' id='example3Modal$data[transnumber]' tabindex='-1' role='dialog'>
            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
              <div class='modal-content'>
                <div class='modal-header text-body'>
                  <h5 class='modal-title' id='exampleModalLabel'>Confirm the Grant Application</h5>
                  <button type='button' class='close' data-dismiss='modal'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body text-body'>
                  <div class='row'>
                    <div class='col-auto mt-2'>
                      <img src='/ourscholar/resource/img/qm.png' class='img-fluid'>
                    </div>
                    <div class='col-sm'>
                      Are you sure you want to approve the <p class='text-info'>$data[scholarshiptype] of $data[firstname] $data[lastname] - ".findCourseABV($data['course'])."?</p>
                    </div>
                  </div>
                </div>
                <div class='modal-footer'>
                  <a class='btn btn-success btn-sm' href='approveEG.php?tn=$data[transnumber]'>Approve Grant</a>
                </div>
              </div>
            </div>
          </div>";

    echo "<a href='admegreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Grant</a>
        </td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";

  }

  public function viewPendingTableUS(){
      $con = $this->con();
      $sql = "SELECT * FROM `tbl_university_scholarship` WHERE `remarks` IN ('PENDING3')";
      $data= $con->prepare($sql);
      $data->execute();
      $result = $data->fetchAll(PDO::FETCH_ASSOC);
      echo "<h3 class='text-center'> Continuing Scholarship for Review </h3>";
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

      // original codes without Modal for Approving Application
      // echo "<td>
      //           <a href='editUS.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
      //           <a href='approveUS.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
      //           <a href='admusreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
      //       </td>";

      // new codes without Modal for Approving Application - January 10, 2022
      echo "<td>
              <a href='editUS.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
              <button class='btn btn-success btn-sm col-12 mt-1' data-toggle='modal' data-target='#exampleModal$data[transnumber]'><i class='fa fa-file-signature'></i>Approve Scholarship</button>";

      echo "<div class='modal fade' data-backdrop='false' id='exampleModal$data[transnumber]' tabindex='-1' role='dialog'>
              <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                <div class='modal-content'>
                  <div class='modal-header text-body'>
                    <h5 class='modal-title' id='exampleModalLabel'>Confirm the Scholarship Application</h5>
                    <button type='button' class='close' data-dismiss='modal'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body text-body'>
                    <div class='row'>
                      <div class='col-auto mt-2'>
                        <img src='/ourscholar/resource/img/qm.png' class='img-fluid'>
                      </div>
                      <div class='col-sm' id='questiontext'>
                        Are you sure you want to approve the <p class='text-info'>$data[scholarshiptype] of $data[firstname] $data[lastname] - ".findCourseABV($data['course'])."?</p>
                      </div>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <a class='btn btn-success btn-sm' href='approveUS.php?tn=$data[transnumber]&uid=$this->id'>Approve Scholarship</a>
                  </div>
                </div>
              </div>
            </div>";

      echo "<a href='admusreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
          </td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";

    }

    public function viewPendingTableUG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_university_grants` WHERE `remarks` IN ('PENDING4')";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> University Grants for Review </h3>";
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
        echo "<th style='font-size: 85%;'>Reason if Rejected</th>";
        echo "<th style='font-size: 85%;'>Disapprovedby</th>";
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
        echo "<td style='font-size: 85%;'>$data[rejectreason]</td>";
        echo "<td style='font-size: 85%;'>$data[disapprovedby]</td>";
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

        // original codes without Modal for Approving Application
        // echo "<td>
        //           <a href='editUG.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
        //           <a href='approveUG.php?tn=$data[transnumber]&uid=$this->id' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-file-signature'></i>Approve Scholarship</a>
        //           <a href='admugreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Non-compliance</a>
        //       </td>";

        // new codes without Modal for Approving Application - January 10, 2022
        echo "<td>
                <a href='editUG.php?tn=$data[transnumber]' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Edit Discounts</a>
                <button class='btn btn-success btn-sm col-12 mt-1' data-toggle='modal' data-target='#example1Modal$data[transnumber]'><i class='fa fa-file-signature'></i>Approve Grant</button>";

                echo "<div class='modal fade' data-backdrop='false' id='example1Modal$data[transnumber]' tabindex='-1' role='dialog'>
                        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                          <div class='modal-content'>
                            <div class='modal-header text-body'>
                              <h5 class='modal-title' id='exampleModalLabel'>Confirm the Grant Application</h5>
                              <button type='button' class='close' data-dismiss='modal'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <div class='modal-body text-body'>
                              <div class='row'>
                                <div class='col-auto mt-2'>
                                  <img src='/ourscholar/resource/img/qm.png' class='img-fluid'>
                                </div>
                                <div class='col-sm' id='questiontext'>
                                  Are you sure you want to approve the <p class='text-info'>$data[scholarshiptype] of $data[firstname] $data[lastname] - ".findCourseABV($data['course'])."?</p>
                                </div>
                              </div>
                            </div>
                            <div class='modal-footer'>
                              <a class='btn btn-success btn-sm' href='approveUG.php?tn=$data[transnumber]&uid=$this->id'>Approve Grant</a>
                            </div>
                          </div>
                        </div>
                      </div>";

        echo "<a href='admugreject.php?tn=$data[transnumber]' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Grant</a>
                </td>
            </tr>";
        }
        echo "</table>";
        echo "</div>";

      }

      public function viewTableEG(){
          $con = $this->con();
          $sql = "SELECT * FROM `tbl_entrance_grant`";
          $data= $con->prepare($sql);
          $data->execute();
          $result = $data->fetchAll(PDO::FETCH_ASSOC);
          echo "<h3 class='text-center'>Entrance Grants Report</h3>";
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
          echo "<th style='font-size: 85%;'>Reason if Rejected</th>";
          echo "<th style='font-size: 85%;'>Disapprovedby</th>";
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
          echo "<td style='font-size: 85%;'>$data[rejectreason]</td>";
          echo "<td style='font-size: 85%;'>$data[disapprovedby]</td>";
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
              $sql = "SELECT * FROM `tbl_university_grants`";
              $data= $con->prepare($sql);
              $data->execute();
              $result = $data->fetchAll(PDO::FETCH_ASSOC);
              echo "<h3 class='text-center'>Continuing Grants Report</h3>";
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
              echo "<th style='font-size: 85%;'>Reason if Rejected</th>";
              echo "<th style='font-size: 85%;'>Disapprovedby</th>";
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
              echo "<td style='font-size: 85%;'>$data[rejectreason]</td>";
              echo "<td style='font-size: 85%;'>$data[disapprovedby]</td>";
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
                $sql = "SELECT * FROM `tbl_university_scholarship`";
                $data= $con->prepare($sql);
                $data->execute();
                $result = $data->fetchAll(PDO::FETCH_ASSOC);
                echo "<h3 class='text-center'>Continuing Scholarship Report</h3>";
                echo "<div class='table-responsive'>";
                echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                echo "<thead class='thead-dark'>";
                echo "<th class='d-none d-sm-table-cell'>Transaction Number</th>";
                echo "<th>Fullname</th>";
                echo "<th class='d-none d-sm-table-cell'>Course</th>";
                echo "<th class='d-none d-sm-table-cell'>Email Address</th>";
                echo "<th class='d-none d-sm-table-cell'>College</th>";
                echo "<th class='d-none d-sm-table-cell'>GWA</th>";
                echo "<th style='font-size: 85%;'>Type of Scholarship</th>";
                echo "<th style='font-size: 85%;'>Duration</th>";
                echo "<th style='font-size: 85%;'>Remarks</th>";
                echo "<th style='font-size: 85%;'>Date Applied</th>";
                echo "<th style='font-size: 85%;'>Date Reviewed</th>";
                echo "<th style='font-size: 85%;'>Date Dean Signed</th>";
                echo "<th style='font-size: 85%;'>Date Registrar Signed</th>";
                echo "<th style='font-size: 85%;'>Reason if Rejected</th>";
                echo "<th style='font-size: 85%;'>Disapprovedby</th>";
                echo "<th>View Documents</th>";
                echo "</thead>";
                foreach ($result as $data) {
                echo "<tr>";
                echo "<td class='d-none d-sm-table-cell' >$data[transnumber]</td>";
                echo "<td style='font-size: 85%;'>$data[lastname] $data[firstname] $data[middlename]</td>";
                echo "<td class='d-none d-sm-table-cell' style='font-size: 85%;'>".findCourseABV($data['course'])."</td>";
                echo "<td class='d-none d-sm-table-cell'>$data[email]</td>";
                echo "<td class='d-none d-sm-table-cell'>$data[college]</td>";
                echo "<td class='d-none d-sm-table-cell'>$data[GWA]</td>";
                echo "<td style='font-size: 85%;'>$data[scholarshiptype]</td>";
                echo "<td style='font-size: 85%;'>$data[ysemester]</td>";
                echo "<td class='d-none d-sm-table-cell'>".checkRemarks($data['remarks'])."</td>";
                echo "<td style='font-size: 85%;'>$data[date_applied]</td>";
                echo "<td style='font-size: 85%;'>$data[date_or_reviewed]</td>";
                echo "<td style='font-size: 85%;'>$data[date_dean_approved]</td>";
                echo "<td style='font-size: 85%;'>$data[date_registrar_approved]</td>";
                echo "<td style='font-size: 85%;'>$data[rejectreason]</td>";
                echo "<td style='font-size: 85%;'>$data[disapprovedby]</td>";
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
                  $sql = "SELECT * FROM `tbl_entrance_scholarship`";
                  $data= $con->prepare($sql);
                  $data->execute();
                  $result = $data->fetchAll(PDO::FETCH_ASSOC);
                  echo "<h3 class='text-center'>Entrance Scholarship Report</h3>";
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
                  echo "<th style='font-size: 85%;'>Reason if Rejected</th>";
                  echo "<th style='font-size: 85%;'>Disapprovedby</th>";
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
                  echo "<td style='font-size: 85%;'>$data[rejectreason]</td>";
                  echo "<td style='font-size: 85%;'>$data[disapprovedby]</td>";
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
