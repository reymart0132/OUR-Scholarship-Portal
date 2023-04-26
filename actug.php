<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ourscholar/resource/php/class/core/init.php';
isLogin();
$user = new user();
$uid = $user->data()->id;
isAccounting($user->data()->groups);
$tables = new viewtablesACT();

// var_dump($transaction);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CEU Scholarship Portal</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
   <script src="vendor/js/jquery.js"></script>
   <link href="vendor/css/all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/css/dataTables.css">
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/jquery.dataTables.js"></script>
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/dataTables.buttons.min.js"></script>
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/jszip.min.js"></script>
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/pdfmake.min.js"></script>
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/vfs_fonts.js"></script>
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/buttons.html5.min.js"></script>
   <script type="text/javascript" charset="utf8" src="vendor/js/dataTables/buttons.print.min.js"></script>

   </head>
  <body>
    <?php
    $open = true;
    require_once('resource/menu/acctmenu.php');
    ?>

          <div class="container-fluid  slide-in-left shadow-sm p-3 p-4">
            <?php $tables->viewTableUG();?>
          </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="vendor/js/bootstrap.min.js"></script>
<script src="vendor/js/bootstrap-select.min.js"></script>
<script>
$(document).ready(function(){
  window.$('#scholartable').DataTable({
    dom: 'frtipB',
    buttons: [
        {
            extend: 'excelHtml5',
            className: 'btn btn-success',
            text: 'Excel',
            titleAttr: 'Export to Excel',
            title: 'Scholarship Report',
            exportOptions: {
                columns: ':not(:last-child)',
            }
        },
        {
            extend: 'csvHtml5',
            className: 'btn btn-primary',
            text: 'CSV',
            titleAttr: 'CSV',
            title: 'Scholarship Report',
            exportOptions: {
                columns: ':not(:last-child)',
            }
        },
        {
            extend: 'pdfHtml5',
            className: 'btn btn-danger',
            text: 'PDF',
            titleAttr: 'PDF',
            title: 'Scholarship Report',
            orientation: 'landscape',
            pageSize: 'TABLOID',
            exportOptions: {
                columns: ':not(:last-child)',
            }
        }
    ]
    });
});
</script>
</body>
</html>
