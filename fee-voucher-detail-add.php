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
 var f_amount;
  $( document ).ready(function() {
  $(".discount").blur(function(){
    // alert('ht');
 var discount = $(this).val();
 var indexnum = $(this).attr("rownum");
 
 var pkg = $(".main_"+indexnum).text();
 
 var inp = $(".com_"+indexnum).val();

 console.log("main =",pkg);
 console.log("input =",inp);
 
  f_amount = Number(pkg) - Number(inp);

 if(f_amount<0){
  alert('Wrong Value');
  f_amount = '';
  $(this).val('');
 }
          
$(".pkgpay_"+indexnum).val(f_amount);

// alert(indexnum);
console.log("------56=="+f_amount);
// console.log("ok");
});

 $(".arrear").blur(function(){
    // alert(f_amount);
 var arrear = $(this).val();
 var indexnum = $(this).attr("rownum");
 
  var arrear = $(".arr_"+indexnum).val();

 var v_amount = Number(f_amount) - Number(arrear);

 if(v_amount<0){
  alert('Wrong Value');
  v_amount = '';
  $(this).val('');
 }
          
$(".vam_"+indexnum).val(v_amount);

});
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
<!-- <script>
  $(document).ready(function() {
    // Handle click on student name
    $('.student-name').click(function(e) {
      e.preventDefault();
      var studentId = $(this).data('student-id');
      $.ajax({
        url: '/get-student-details.php',
        method: 'POST',
        data: {
          studentId: studentId
        },
        success: function(response) {
          $('#student-details').html(response);
          $('#student-modal').modal('show');
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
</script> -->
<!-- <script>
  // Get references to the relevant elements
  const studentNameCell = document.querySelectorAll('.student-name');
  const studentPopup = document.getElementById('student-popup');
  const studentName = document.getElementById('student-name');
  const studentAdmission = document.getElementById('student-admission');
  const studentDueDate = document.getElementById('student-due-date');
  // add more references as needed
  
  // Add click event listener to each "Student Name" cell
  studentNameCell.forEach(cell => {
    cell.addEventListener('click', () => {
      // Get the data for the selected student
      const rowData = cell.closest('tr').querySelectorAll('td');
      const name = rowData[2].innerText;
      const admission = rowData[1].innerText;
      const dueDate = rowData[3].innerText;
      // add more data as needed
      
      // Populate the popup content with the student's information
      studentName.innerText = name;
      studentAdmission.innerText = admission;
      studentDueDate.innerText = dueDate;
      // add more content population as needed
      
      // Show the popup
      studentPopup.style.display = 'block';
    });
  });
</script> -->
</body>
</html>