<?php
require 'setup/config.php';
//include( 'Authenticate.php' );
include( 'setup/General.php' );
require_once('setup/validation/validation.php');
include( 'pagesettings.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=SITE_NAME?> | Provident Leadger </title>
  <?php include 'layout/header.php'; ?>
  <link href="css/jquery-ui.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="js/chosen.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <?php include 'layout/top-bar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Provident Funds Leadger</h1>
          </div>
          <div class="col-sm-6 mt-2">  
         

          </div>
        </div>
      </div>
    </div>
    
    <!-- /.content-header -->
    <!-- Main content -->
    <?php include "includes/$page.php"; ?>
    <!-- /.content -->
  </div>  
  <!-- Main Footer -->
  <?php include 'layout/footer.php'; ?>  
</div>
<!-- ./wrapper -->
<?php include 'layout/footer-includes.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#campus").on("change", function() {
      let campusId = $(this).val();

     // Send an AJAX request to fetch staff based on the selected campus
      $.ajax({
        url: './get_staff_by_campus',
        type: "POST",
        data: { campusId: campusId },
        success: function(response) {
          // alert(response);
          $('#staff_id').html(response); // Update staff dropdown with fetched options
        }
      });


      
    });
  });
</script>
<script type="text/javascript">
    $("body").on("click", ".result-selected", function(){
       
        var customer_id = $("#C_select").val();
        if(customer_id!=0){
        $.get("ajax_getcustoomerbalance.php", {id:customer_id,erwrds:'123196hkqwg311271tg1'}).done(function(data){
     $("#Cbalance").html(data);
             });
        }
    });
</script>
</body>

</html>


