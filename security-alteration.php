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
  <title><?=SITE_NAME?> | Security Alteration</title>
  <?php include 'layout/header.php'; ?>
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
            <h1 class="m-0">Security Alteration </h1>
          </div>
          <div class="col-sm-6">            
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


<!-- <script type="text/javascript">
    $("body").on("campus", "#staff_id, #date", function(){
          let campus = $("#campus").val();
          let staff = $("#staff_id").val();
          let stdclass = $("#date").val();
          console.log(`campus: ${campus} staff: ${staff_id} Date: ${date}`);       
    });

</script> -->

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
    $("#staff_id").on("change", function() {
      let empId = $(this).val();

     // Send an AJAX request to fetch staff based on the selected campus
      $.ajax({
        url: './get_staff_by_campus',
        type: "POST",
        data: { empId: empId,securitycheck:'123sdgserdyg4rtyr6df' },
        success: function(response) {
          // alert(response);
          $('#security_id').html(response); // Update staff dropdown with fetched options
        }
      });


      
    });
    $("#security_id").on("change", function() {
      let empId = $(this).val();

     // Send an AJAX request to fetch staff based on the selected campus
      $.ajax({
        url: './get_staff_by_campus',
        type: "POST",
        data: { empId: empId,securitybalance:'ewqtdhg3422dhfhet' },
        success: function(response) {
          //  alert(response);
           console.log("shahrab",response);
          $('#installment_no').val(response); // Update staff dropdown with fetched options
        }
      });


      
    });
  });
</script>


</body>
</html>