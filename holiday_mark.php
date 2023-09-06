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
    <link rel="stylesheet" href="css/calender/css/jquery-ui.multidatespicker.css">
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
   
var oneMonthAgo = new Date(date);
oneMonthAgo.setMonth(date.getMonth() - 1);



var holiday_mark = <?php echo $holiday_mark_json; ?>;
var date_array = [];



for (var i = 0; i < holiday_mark.length; i++) {
    var dateParts = holiday_mark[i].split('-');
    var year = parseInt(dateParts[0]);
    var month = parseInt(dateParts[1]) - 1; // Month is 0-based in JavaScript
    var day = parseInt(dateParts[2]);
    
    // Create a JavaScript Date object with the specified year and month, and set the day
    var jsDate = new Date(year, month, day);
    date_array.push(jsDate);
}







           
var dateselect;
// var dateselect;
var datepickerOptions = {
    minDate: oneMonthAgo, // 0 means today or the current date
    maxDate: '+1M',
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
};

// Check if date_array is not empty and add the addDates option
if (date_array.length > 0) {
    datepickerOptions.addDates = date_array;
}

$('#mdp-demo').multiDatesPicker(datepickerOptions);

function updateSelectedDates() {
    selectedDates = $('#mdp-demo').multiDatesPicker('getDates');
}
    // $('#mdp-demo').multiDatesPicker({
        
    //   minDate: oneMonthAgo, // 0 means today or the current date
    //    maxDate: '+1M',
    //          addDates: date_array,
    //        onSelect: function(dateText, inst) {
    //         var clickedDate = new Date(dateText);
            
    //         // Toggle the selection of the clicked date
    //         $(this).toggleClass('selected');

    //         // Update the selected dates array
    //         updateSelectedDates();

    //         // Log the updated selected dates
    //         console.log('Selected dates:', selectedDates);
    //         $('#selected-dates-input').val(JSON.stringify(selectedDates));
    //        }


        	
    // });
    // function updateSelectedDates() {
    //     selectedDates = $('#mdp-demo').multiDatesPicker('getDates');
    // }
    // console.log('Initial selected dates:', selectedDates);
    
    // selectedDates = $('#mdp-demo').multiDatesPicker('getDates');
            //  console.log('------------',selectedDates);
    </script>
</body>
</html>