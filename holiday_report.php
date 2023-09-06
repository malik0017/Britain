<?php
require 'setup/config.php';
//include( 'Authenticate.php' );
include( 'setup/General.php' );
require_once('setup/validation/validation.php');
include( 'pagesettings.php' );

$currentDate = date('Y-m-d');

$currentYear = date('Y');
$arr=array();
 $results= $conf->fetchall( HOLIDAYMARK ." WHERE year= $currentYear " );
 if(!empty($results)){
	foreach($results as $res){
		$arr[]=$res->compete_date;
	 }
	 
 }
 $holiday_mark_json = json_encode($arr);
//  print_r($holiday_mark_json);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=SITE_NAME?> | Holiday Reports</title>
  <?php include 'layout/header.php'; ?>
  <!-- <link rel="stylesheet" href="css/css/bootstrap.min.css"> -->

  <script src='css/fullcalender/dist/index.global.js'></script>

    <style>
      .fc-header-toolbar.fc-toolbar.fc-toolbar-ltr {
    display: none;
}
.td-holiday{
  background-color:#fff300;
}

    </style>
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
            <h1 class="m-0">All Holidays</h1>
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
<script> 
var holidayDates = <?php echo $holiday_mark_json;  ?>;
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  // var holidayDates = [
  //   '2023-01-07',
  //   '2023-01-14',
  //   // Add more holiday dates as needed
  // ];
  var holidayDates = <?php echo $holiday_mark_json;  ?>;
 

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'multiMonthYear,dayGridMonth,timeGridWeek'
    },
    initialView: 'multiMonthYear',
    initialDate: '2023-01-12',
    editable: true,
    selectable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    eventSources: [
      // Your other event sources here, if any
      // ...
      {
        events: holidayDates.map(function(date) {
          return {
            title: 'Holiday',
            start: date,
            color: 'red'
          };
        }),
        background: 'red', // Set border color for holiday events
      },
    ],
  });

  //const date = "2023-10-29";
  //const element = document.querySelector(`[data-date="${date}"]`);
  
  // if (element) {
  //   console.log('Element found:', element);
  // } else {
  //   console.log('Element not found.');
  // }

  calendar.render();
});

  

</script>


<script>
  $( document ).ready(function() {

  holidayDates.forEach(date => {
  // Find the HTML element with the matching data-date attribute  
  el = document.querySelector(`[data-date="${date}"]`);
  console.log('------'+el);
  // Check if the element exists
  if (el) {
    // Add the "abcd" class to the matching element
    el.classList.add('td-holiday');
  }
});
});
</script>
</body>
</html>