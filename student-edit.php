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
  <title><?=SITE_NAME?> | New Student</title>
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
            <h1 class="m-0"> New Student</h1>
          </div>
          <div class="col-sm-6 mt-2">  
          <a class="btn btn-warning float-right" href="student-view.php">Back</a>

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
    $("body").on("change", "#campus, #session_name, #class", function(){
          let campus = $("#campus").val();
          let session = $("#session_name").val();
          let stdclass = $("#class").val();
          console.log(`campus: ${campus} session: ${session} Class: ${stdclass}`);
        if(campus!='campus' && session!='' && stdclass!=''){
        $.get("ajax-student-add-fee.php", {session:session,campus:campus,stdclass:stdclass}).done(function(data){
          $("#feetablearea").html(data);
             });
       }
       else{
        $("#feetablearea").html('');
       }
    });
    $("body").on("change", ".campus", function(){
    // $(document).on("change", ".campus", function(){
     
  campus_id=$(this).val();	
      // alert (campus_id);
   $.get("ajax_allowance.php", {cid:campus_id}).done(function(data){
console.log(data);
// var select = document.getElementById("class");
    $("#class").html(data);
   
  
       });
  
  });

  $("body").on("change", ".class", function(){
     
    class_id=$(this).val();	
         
      $.get("ajax_allowance.php", {nid:class_id}).done(function(data){
  
       $("#section_name").html(data);
      //  alert (class_id);
     
          });
     
     });
</script>


<script>
  $( document ).ready(function() {
 // $(".concession").keyup(function(){
  $("body").on("keyup", ".concession", function(){
var concession = $(this).val();
 var indexnum = $(this).attr("rownum");
 var actval = $(".actual_"+indexnum).val();
 var pkg = Number(actval) - Number(concession);
 if(pkg<0 || concession<0){
  alert('Wrong Value');
  pkg = '';
  $(this).val('');
 }
          
          $(".pkgpay_"+indexnum).val(pkg);

// alert(indexnum);
console.log("------"+indexnum);
// console.log("ok");
});
});

</script>
<script>
  $(document).ready(function() {
      var input = $('#addmission_no').val();
      $('#password').val(input);


});
  </script>
   <script>
    $('#emergency_phone').keyup(function(){
      var input = $('#emergency_phone').val();
      $('#app_user').val(input);
     
});
  </script>
  <script>
var checkbox = document.getElementById('guest');
var div = document.getElementById('expirydate');

checkbox.addEventListener('change', function() {
  if (this.checked) {
    div.style.display = 'block';
  } else {
    div.style.display = 'none';
  }
});

var checkboxkids = document.getElementById('staff_kid');
var div1 = document.getElementById('staffkid');

checkboxkids.addEventListener('change', function() {
  if (this.checked) {
    div1.style.display = 'block';
  } else {
    div1.style.display = 'none';
  }
});

</script>
</script>
<script>
// get the date of birth input element
var dobInput = document.getElementById("date_birth");

// listen for changes to the input and calculate age
dobInput.addEventListener("change", function() {
  // get the date of birth from the input value
  var dob = new Date(this.value);
  // get the current date
  var now = new Date();
  // calculate the age
  var age = now.getFullYear() - dob.getFullYear();
  if (now.getMonth() < dob.getMonth() || (now.getMonth() == dob.getMonth() && now.getDate() < dob.getDate())) {
    age--;
  }
  // set the age input value
  document.getElementById("age").value = age;
});
</script>
<script>
  const cnicInput = document.getElementById('cnic');
  const cnicError = document.getElementById('cnicError');

  cnicInput.addEventListener('input', function() {
    const cnicValue = cnicInput.value.trim().replace(/-/g, ''); // remove any existing hyphens
    const cnicPattern = /^\d{13}$/; // pattern for valid CNIC format

    if (cnicValue === '') {
      cnicError.innerHTML = ''; // clear error message if input is empty
    } else if (cnicPattern.test(cnicValue)) {
      // add hyphens to the input value
      const formattedCnic = cnicValue.replace(/(\d{5})(\d{7})(\d{1})/, "$1-$2-$3");
      cnicInput.value = formattedCnic;

      cnicError.innerHTML = ''; // clear error message if input matches pattern
    } else {
      cnicError.innerHTML = 'Invalid CNIC format'; // display error message if input does not match pattern
    }
  });
</script>

<script>
  $(document).on('change', '#check_all', function () {
   
   $('input:checkbox').prop('checked', this.checked);    
});
</script>


</body>
</html>