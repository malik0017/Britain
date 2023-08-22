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
  <title><?=SITE_NAME?> | Holiday Mark</title>
  <?php include 'layout/header.php'; ?>
  <!-- <link rel="stylesheet" href="css/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="calender/css/jquery-ui.multidatespicker.css">
    <link rel="stylesheet" href="css/calender/css/mobiscroll.javascript.min.css">
    <link rel="stylesheet" href="css/calender/css/jquery-ui.css">
    
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
            <h1 class="m-0">Holidays Mark</h1>
          </div>
          <div class="col-sm-6 mt-2">  
          <!-- <a class="btn btn-warning float-right" href="check_salary.php">Back</a> -->
          
				  
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
<!-- <script src="css/js/jquery-3.4.1.min.js"></script> -->
    <script src="css/calender/js/jquery-ui.min.js"></script>
    <script src="css/calender/js/jquery-ui.multidatespicker.js"></script>
    <script src="css/calender/js/mobiscroll.javascript.min.js"></script>
<script>
    var date = new Date();
    // let date_array = [];
    var selectedDates = []; 
           
var dateselect;
    $('#mdp-demo').multiDatesPicker({
        
        // preselect the 14th and 19th of the current month
        	//  addDates: [date.setDate(14), date.setDate(19)],
          //  addDates: selectedDates,

           onSelect: function(dateText, inst) {
            var clickedDate = new Date(dateText);
            
            // Toggle the selection of the clicked date
            $(this).toggleClass('selected');

            // Update the selected dates array
            updateSelectedDates();

            // Log the updated selected dates
            console.log('Selected dates:', selectedDates);
            $('#selected-dates-input').val(JSON.stringify(selectedDates));
           }


        	
    });
    function updateSelectedDates() {
        selectedDates = $('#mdp-demo').multiDatesPicker('getDates');
    }
    console.log('Initial selected dates:', selectedDates);
    
    // selectedDates = $('#mdp-demo').multiDatesPicker('getDates');
             console.log('------------',selectedDates);
    </script>
</body>
</html>