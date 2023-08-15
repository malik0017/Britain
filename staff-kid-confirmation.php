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
  <title><?=SITE_NAME?> | Staff Kid Confirmation</title>
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
            <h1 class="m-0"> Staff Kid Confirmation</h1>
          </div>
          <div class="col-sm-6 mt-2">  
          <!-- <a class="btn btn-warning float-right" href="staff-kid-confirmation.php">Back</a> -->

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
 $( document ).ready(function() {
  
 // $(".concession").keyup(function(){
  $("body").on("keyup", "#basic_salary", function(){
var basic_salary = $(this).val();
console.log(basic_salary);
// alert(basic_salary);
var ded_ratio=Number(basic_salary)*12/365;
var fund_duction=Number(basic_salary)*7.5/100;

//  var indexnum = $(this).attr("rownum");
//  var actval = $(".actual_"+indexnum).val();
//  var pkg = Number(actval) - Number(concession);
//  if(ded_ratio<0 ){
//   alert('Wrong Value');
  
//   $(this).val('');
//  }
          
           $("#ded_ration").val(Math.round(ded_ratio));
           $("#fund_duction").val(Math.round(fund_duction));

// // alert(indexnum);
// console.log("------"+indexnum);
// console.log("ok");
});
});

$(document).on("change", ".allowance", function(){
	
		employee_id=$(this).val();	
    	
		 $.get("ajax_allowance.php", {id:employee_id}).done(function(data){

      $("#lunch_allowance").val(data);

		
         });
		
    });

</script>
</body>
</html>