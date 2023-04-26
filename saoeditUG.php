<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isSAO($user->data()->groups);

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
</head>
  <body>
  <?php
  $open = true;
  require_once('resource/menu/adminscrmenu.php');
  ?>
  <div class="container  slide-in-left shadow-sm-sm p-3 p-4">
    <div class="row">
      <div class="form-group col-md-10 shadow-sm mt-4 p-5">
        <form action="saoeditUGpdfmaker.php" method="POST">
          <h5 class="border-bottom">Add Discount and other details for <b class="text-info"><?php echo $_GET['tn'];?></b></h5>
          <h6 class="mt-3">Duration of the Award</h6>
          <input type="text" class="form-control form-control-sm" id="duration"  value="" name="duration" placeholder="Duration of the award" required>
          <h6 class="mt-3">Percetage discount on tuition fee:</h6>
          <input type="hidden"value="<?php echo $_GET['tn'];?>" name="tn">
          <input type="int" class="form-control form-control-sm" id="tf"  value="" name="tf" placeholder="in % Discount on Tuition Fee" maxlength="3" min="1" max="100" required>
          <h6 class="mt-3">Percetage discount on Miscellaneous fee:</h6>
          <input type="int" class="form-control form-control-sm" id="mf"  value="" name="mf" placeholder="in % Discount on Miscellaneous Fee" maxlength="3" min="1" max="100" required>
          <h6 class="mt-3">Others</h6>
            <input type="text" class="form-control form-control-sm" id="of"  value="" name="of" placeholder="Others" required>
            <input type="submit" class="col -12 btn btn-sm btn-warning mt-4" id="mf"  value="Add the following discounts in ROF of <?php echo $_GET['tn'];?>" name="submit" >
      </form>
      </div>
    </div>
  </div>

    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
