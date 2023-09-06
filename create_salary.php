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
  <title><?=SITE_NAME?> | Create Salary</title>
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
            <h1 class="m-0">Create Salary</h1>
          </div>
          <div class="col-sm-6 mt-2">  
          <a class="btn btn-warning float-right" href="check_salary.php">Back</a>

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
<script> $(document).on('change', '#check_all', function () {
        
        $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
        
    });
    $('.case').prop("checked", true);
   
    $(document).on('change keyup blur','.changesNo',function(){
	id_arr = $(this).attr('id');
  
	id = id_arr.split("_");
  rowid=id[1];
	var income_bonus = $('#incomebonus_'+id[1]).val();

  var lunch = $('#lunch_'+id[1]).val();
  var other = $('#other_'+id[1]).val();
  var advance = $('#advance_'+ rowid ).val();
   var pfunds = $('.p_funds'+ rowid ).text();
  var security = $('#security_'+id[1]).val();
  console.log('p funds'+rowid+'======'+pfunds);
  console.log('Security',security);
  if (advance.trim() == "") {
      advance=0;
  }
  if (pfunds == "") {
    pfunds=0;
  }
  if (security.trim() == "") {
    security=0;
  }
 
 
 console.log('helllo',pfunds);
 
  var basic_salary=$('.basic_salary_'+rowid).attr('default');

  var leave_amount=$('.leaves_'+rowid).text();
  var income_tax=$('.income_tax_'+rowid).text();
  var gross_salary=$('.gross_salary_'+rowid).text();
  var basic_sal_after=Number(basic_salary)+Number(income_bonus);
   $('.basic_salary_' + rowid).text(basic_sal_after);

   var lunch = $('#lunch_'+id[1]).val();
   gross_salary_after=Number(basic_sal_after)-Number(leave_amount)+Number(lunch)+Number(other);
   $('.gross_salary_' + rowid).text(gross_salary_after);

  //  console.log('advance',advance);
  // console.log('Security',security);
  // console.log('p funds',security);
  // console.log('Security',security);
   var net_salary= gross_salary_after - Number(advance)- Number(pfunds) - Number(income_tax) - Number(security);
  //  
  console.log('net salary',net_salary);
   
   $('.net_balance_' + rowid).text(net_salary);


});
    // Get all the "other" input fields
 const otherFields = document.querySelectorAll('.other');
// const income_bonus = document.querySelectorAll('.income_bonus');
// const basic_salary = document.querySelectorAll('.basic_salary');

// // Add event listener to each "other" input field
 otherFields.forEach(otherField => {
 
     otherField.addEventListener('input', function() {
        const remarksField = this.closest('tr').querySelector('.remarks');
         remarksField.required = this.value.trim().length > 0;
     });
 });
//     income_bonus.addEventListener('input', function() {
        
//         const basic_salary = parseFloat(basic_salary[index].textContent);
        
//         // Get the input value and convert it to a number
//         const income_bonus = parseFloat(this.value) || 0;
        
//         // Calculate the new value
//         const new_basic_salary = basic_salary + income_bonus;
//         basic_salary[index].textContent = new_basic_salary;
//     });




    </script>
</body>
</html>