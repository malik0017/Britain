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
  <title><?=SITE_NAME?> |  Students Fee Voucher </title>
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
          

            <h1 class="m-0">Students Fee Voucher</h1>
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
<script>
 $(document).on('change', '#check_all', function () {
   
  //  $('input:checkbox').prop('checked', this.checked); 
   $('.feestd').prop('checked', this.checked);    
});
$( document ).ready(function() {
  //  alert("fffff");
   //  $('input:checkbox').prop('checked', this.checked); 
    $('.feestd').prop('checked',true);    
 });
 
</script>
<script>
const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

const dropdown = $("#monthDropdown");

for (let i = 0; i < months.length; i++) {
  dropdown.append($("<option>").attr("value", i + 1).text(months[i]));
}

</script>
<script>
  $(document).ready(function() {
    // Handle click on student name
    $('.student-name').click(function(e) {
      e.preventDefault();
      var studentId = $(this).data('student-id');
      $.ajax({
        url: '/get-student-details.php',
        type: 'POST',
        data: {studentId: studentId},
        success: function(response) {
          $('#student-details').html(response);
          $('#student-modal').modal('show');
        }
      });
    });
  });
</script>
</body>
</html>