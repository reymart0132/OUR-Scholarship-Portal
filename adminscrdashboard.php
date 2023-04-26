<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAdmin($user->data()->groups);
$capplicant = getTotalApplicant();

$dates[]="";
$count[]="";
foreach ($capplicant as $data) {
  $dates[] = $data["dit"];
  $count[]= $data["tots"];
}
$count = substr(implode("','",$count),1)."'";
$date = substr(implode("','",$dates),1)."'";
// var_dump($transaction);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CEU Scholarship Portal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="vendor/css/dataTables.css">
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/buttons.print.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
  <script src="https://cdn.tiny.cloud/1/au5xetu3h90uyw5h8q362ae5dkhg3hvosqmsel8gb75myukp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#announcement'
      });
    </script>
</head>
  <body>
  <?php
  $open = true;
  require_once('resource/menu/adminscrmenu.php');
  ?>
    <div class="container-fluid  slide-in-left shadow-sm-sm p-3 p-4">
      <div class="row">
        <div class="col-lg-3 shadow-sm mt-4">
          <h6 class="text-info"><i class='fa fa-file-signature'></i> Entrance Scholarship</h6>
          <h6 class="text-muted ml-2 mt-3"><i class="fa fa-users" aria-hidden="true"></i> Total Number of Applicants : <a href="#"><?php echo countESApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-pause-circle" aria-hidden="true"></i> For Scholarship Officer Review :  <a href="#"><?php echo countForReviewESApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-graduation-cap" aria-hidden="true"></i> For Deans Approval : <a href="#"><?php echo countDeanPendingESApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-signature" aria-hidden="true"></i> For Registrars Approval : <a href="#"><?php echo countRegPendingESApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-check" aria-hidden="true"></i> Scholarship Approved :<a href="#"><?php echo countApprovePendingESApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-trash" aria-hidden="true"></i> Scholarship Rejected : <a href="#"><?php echo countRejectedESApplicant();?></a></h6>
        </div>
        <div class="col-lg-3 shadow-sm mt-4">
          <h6 class="text-info"><i class='fa fa-file-signature'></i>University Scholarship</h6>
          <h6 class="text-muted ml-2 mt-3"><i class="fa fa-users" aria-hidden="true"></i> Total Number of Applicants : <a href="#"><?php echo countUSApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-pause-circle" aria-hidden="true"></i> For Scholarship Officer Review :  <a href="#"><?php echo countForReviewUSApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-graduation-cap" aria-hidden="true"></i> For Deans Approval : <a href="#"><?php echo countDeanPendingUSApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-signature" aria-hidden="true"></i> For Registrars Approval : <a href="#"><?php echo countRegPendingUSApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-check" aria-hidden="true"></i> Scholarship Approved :<a href="#"><?php echo countApprovePendingUSApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-trash" aria-hidden="true"></i> Scholarship Rejected : <a href="#"><?php echo countRejectedUSApplicant();?></a></h6>
        </div>
        <div class="col-lg-3 shadow-sm mt-4">
          <h6 class="text-info"><i class='fa fa-file-signature'></i>Entrance Grant</h6>
          <h6 class="text-muted ml-2 mt-3"><i class="fa fa-users" aria-hidden="true"></i> Total Number of Applicants : <a href="#"><?php echo countEGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-pause-circle" aria-hidden="true"></i> For Scholarship Officer Review :  <a href="#"><?php echo countForReviewEGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-graduation-cap" aria-hidden="true"></i> For Deans Approval : <a href="#"><?php echo countDeanPendingEGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-school" aria-hidden="true"></i> For Student Affairs Office Review : <a href="#"><?php echo countSAOPendingEGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-signature" aria-hidden="true"></i> For Registrars Approval : <a href="#"><?php echo countRegPendingEGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-check" aria-hidden="true"></i> Scholarship Approved :<a href="#"><?php echo countApprovePendingEGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-trash" aria-hidden="true"></i> Scholarship Rejected : <a href="#"><?php echo countRejectedEGApplicant();?></a></h6>
        </div>
        <div class="col-lg-3 shadow-sm mt-4">
          <h6 class="text-info"><i class='fa fa-file-signature'></i>University Grant</h6>
          <h6 class="text-muted ml-2 mt-3"><i class="fa fa-users" aria-hidden="true"></i> Total Number of Applicants : <a href="#"><?php echo countUGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-pause-circle" aria-hidden="true"></i> For Scholarship Officer Review :  <a href="#"><?php echo countForReviewUGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-graduation-cap" aria-hidden="true"></i> For Deans Approval : <a href="#"><?php echo countDeanPendingUGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-school" aria-hidden="true"></i> For Student Affairs Office Review : <a href="#"><?php echo countSAOPendingUGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-signature" aria-hidden="true"></i> For Registrars Approval : <a href="#"><?php echo countRegPendingUGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-check" aria-hidden="true"></i> Scholarship Approved :<a href="#"><?php echo countApprovePendingUGApplicant();?></a></h6>
          <h6 class="text-muted ml-5 mt-2"><i class="fa fa-trash" aria-hidden="true"></i> Scholarship Rejected : <a href="#"><?php echo countRejectedUGApplicant();?></a></h6>
        </div>
        <div class="col-lg-7 shadow-sm mt-4">
          <h5 class="text-info"><i class="fad fa-microphone-stand"></i> Scholarship Portal Admin Setting</h5>
          <form action="adminscrconfig.php" method="POST" class="">
            <div class="row border-top py-2">
              <div class="form-group col-md-6">
                <h6 ><i class='fa fa-cog mr-2'></i>Semester Settings </h6>
                <p class="text-info">Current Status: <?php  checkSemester();?></p>
                  <select id="sem" name="sem" class="form-control form-control-sm">
                    <option value="1st Semester">First Semester</option>
                    <option value="2nd Semester">Second Semester</option>
                    <option value="Summer">Summer</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <br>
                <h6 ><i class='fa fa-cog mr-2'></i>School Year-Settings</h6>
                  <input type="text" class="form-control form-control-sm" id="schoolyear"  name="schoolyear" placeholder="Enter School Year" value="<?php echo getSY();?>" required>
              </div>
              <div class="form-group col-md-6">
                <h6><i class='fa fa-lock mr-2'></i>Entrance Scholarship Lock Settings</h6>
                <p class="text-info">Current Status: <?php  checklock(getESLock());?></p>
                  <select id="esl" name="esl" class="form-control form-control-sm">
                    <?php
                    if(getESLock() == 0){
                      echo '<option value="1">Unlock</option>
                            <option value="0" selected ="selected">Locked</option>';
                    }else{
                      echo '<option value="1" selected ="selected">Unlock</option>
                            <option value="0">Locked</option>';
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <h6><i class='fa fa-lock mr-2'></i>Entrance Grant Lock Settings</h6>
                <p class="text-info">Current Status: <?php  checklock(getEGLock());?></p>
                  <select id="egl" name="egl" class="form-control form-control-sm">
                    <?php
                    if(getEGLock() == 0){
                      echo '<option value="1">Unlock</option>
                            <option value="0" selected ="selected">Locked</option>';
                    }else{
                      echo '<option value="1" selected ="selected">Unlock</option>
                            <option value="0">Locked</option>';
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <h6><i class='fa fa-lock mr-2'></i>University Scholarship Lock Settings</h6>
                <p class="text-info">Current Status: <?php  checklock(getUSLock());?></p>
                  <select id="usl" name="usl" class="form-control form-control-sm">
                    <?php
                    if(getUSLock() == 0){
                      echo '<option value="1">Unlock</option>
                            <option value="0" selected ="selected">Locked</option>';
                    }else{
                      echo '<option value="1" selected ="selected">Unlock</option>
                            <option value="0">Locked</option>';
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <h6><i class='fa fa-lock mr-2'></i>University Grant Lock Settings</h6>
                <p class="text-info">Current Status: <?php  checklock(getUGLock());?></p>
                  <select id="ugl" name="ugl" class="form-control form-control-sm">
                    <?php
                    if(getUGLock() == 0){
                      echo '<option value="1">Unlock</option>
                            <option value="0" selected ="selected">Locked</option>';
                    }else{
                      echo '<option value="1" selected ="selected">Unlock</option>
                            <option value="0">Locked</option>';
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group col-12">
                <input type="submit" value="Change Admin Settings" class=" form-control btn btn-primary" />
              </div>
          </form>

        </div>
      </div>
      <div class="col-lg-5 shadow-sm mt-4">
        <h5 class="text-info"><i class='fa fa-chart-bar mr-2'></i>Applicant Volume Per Day</h5>
          <canvas id="canvas"></canvas>
      </div>
      <div class="col-lg-12">
        <form action="addannounce.php" method="POST" class="">
          <div class="row border-top py-2">
            <div class="form-group col-md-12">
              <h6 ><i class="fas fa-microphone"></i> Announcements </h6>
              <textarea class="form-control form-control-sm" id="announcement" rows="5"  name="announcement" required><?php echo getAnnouncement();?></textarea>
              <input type="submit" value="Change Announcement" class=" form-control btn btn-success" />
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
      };

      var ctx = document.getElementById("canvas").getContext("2d");

      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [<?php echo $date ?>],
          datasets: [{
            label: 'Applicants per day',
            borderColor: window.chartColors.purple,
            borderWidth: 2,
            fill: false,
            data: [<?php echo $count ?>]
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Chart.js Drsw Line on Chart'
          },
          tooltips: {
            mode: 'index',
            intersect: true
          },
          annotation: {
            annotations: [{
              type: 'line',
              mode: 'horizontal',
              scaleID: 'y-axis-0',
              endValue: 0,
              borderColor: 'rgb(75, 192, 192)',
              borderWidth: 4,
              label: {
                enabled: true,
                content: 'Trendline',
                yAdjust: -16,
              }
            }]
          }
        }
      });
    </script>

</body>
</html>
