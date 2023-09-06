<?php 

// $results=array();
if (isset($_POST['submit'])) {
	
	// $salaryid=array();
	$campus = ($_POST['campus_id']);
	// $month_year = ($_POST['month_year']);
	$emp_id = ($_POST['emp_id']);

$leave_type_id = ($_POST['leave_type_id']);

    // $name = ($_POST['name']);



    $short_leave_hour = ($_POST['short_leave_hour']);
    $is_paid = ($_POST['is_paid']);
    $date_from = ($_POST['date_from']);
    $date_to = ($_POST['date_to']);
    $aproved_by = ($_POST['aproved_by']);






    // $section_name = ($_POST['section_name']);  

                        // echo $sql;
	// print_r($results);
	// exit;



	// $numDays = cal_days_in_month(CAL_GREGORIAN, $salary_month, $salary_year);

// Loop through each day of the month
// for ($day = 1; $day <= $numDays; $day++) {
//     $date = sprintf("%04d-%02d-%02d", $salary_year, $salary_month, $day);
//     echo $date . "\n";
// }
// 	exit;
// $results = $conf->QueryRun($sql);


	// $results = $conf->fetchall(STAFF .  " as s INNER JOIN ". DEPARTMENT." as d ON d.id = s.department WHERE campus = $campus  And IsActive=1 ");
	// $campus_name=$conf->fetchall( STAFF );

	// $campus_name=$conf->fetchall( EMPLOYETYE );

	// $campus_name=$conf->fetchall( SHIFTS );

	// $campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );


  
 


// $results = $conf->fetchall(Student . " where  is_deleted = 0");



// if (!$val->isSuccess()) {

//   $error = $val->displayErrors();
// }

// if (empty($error)) {

  $data_post = array( 'campus_id' => $campus, 'emp_id' => $emp_id, 'leave_type_id' => $leave_type_id, 'short_leave_hour' => $short_leave_hour, 'is_paid' => $is_paid,'date_from' => $date_from,'date_to' => $date_to,'aproved_by' => $aproved_by, 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime);
  $recodes = $conf->insert($data_post, EMPleave);
  if ($recodes == true) {
    $success = "Data <strong>Added</strong> Successfully";

    //$gen->redirecttime( 'campus', '2000' );
  }
// }






// if(!$val->isSuccess()){
   
    // $error = $val->displayErrors();        
  // }

	// if ( empty( $error ) ) {
    
		// $data_post = array( 'name' => $name, 'id' => $_SESSION[ 'user_reg' ],'creates_at' => $cDateTime);
		// $recodes = $conf->insert( $data_post, EMPleave );
		// if ( $recodes == true ) {
			// $success = "Data <strong>Added</strong> Successfully";

			//$gen->redirecttime( 'campus', '2000' );
		// }
    // }
    }
    $campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );

$leave_type = $conf->fetchall(LEAVE . " WHERE is_deleted=0");
?>
















<style>
        .table-container {
            max-height: 400px; /* Set the maximum height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            border: 1px solid #ccc; /* Add a border for clarity */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
<div class="content">

<div class="container">

  <div class="row">
	<div class="col-lg-12"><?php include('includes/messages.php') ?>

	  <div class="card card-primary card-outline">
		<div class="card-body">
		 

			<div class="card-body">
				<form name="" method="POST">
			  <div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">

				  <div class="form-group">
					<label for="campus" class="form-label ">Campus</label>
					<select class="form-select form-control" id="campus" tabindex="1" name="campus_id" required>
					  <?php foreach ($campus_name as $data) { ?>
						<option value="<?php echo $data->id; ?>" <?php if($data->id == $campus_name) { echo 'selected';} ?>><?php echo $data->campus_name; ?></option>
					  <?php  } ?>
					</select>
				  </div>
				</div>
				<div id="staffkid" class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Staff</label>
                        <select class="form-select form-control" id="staff_id" tabindex="42" name="emp_id">
                          <!-- Staff options will be dynamically populated here -->
                        </select>
                      </div>
                    </div>
                   

                  <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="form-group">
                     <label for="leave_type_id" class="form-label ">Leave</label>
                          <select class="form-select form-control" id="leave_type_id" tabindex="1" name="leave_type_id" required>
                        <?php foreach ($leave_type as $data) { ?>
                        <option value="<?php echo $data->id; ?>" ><?php echo $data->name; ?></option>
                    <?php  } ?>
                    </select>
                     </div>
                    </div>





                    <div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
 <label for="short_leave_hour" class="form-label ">Short Leave hour</label>
 <input type="text" class="form-control" id="short_leave_hour" name="short_leave_hour" tabindex="1" placeholder="" required>

      
 </div>
</div>





<!-- <div class="col-lg-3 col-md-6 col-sm-6"> -->

<div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
  <label for="date_from" class="form-label ">From</label>
  <input type="date" class="form-control" id="date_from" name="date_from" tabindex="1" placeholder="" required>
</div>
</div>



<div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
  <label for="date_to" class="form-label ">To</label>
  <input type="date" class="form-control" id="date_to" name="date_to" tabindex="1" placeholder="" required>
</div>
</div>
                        <!-- </div> -->

     
                        

                        <div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
 <label for="is_paid" class="form-label ">Status</label>
      <select class="form-select form-control" id="is_paid" tabindex="1" name="is_paid" required>
    
    <option value="0">Unpaid</option>
    <option value="1">Paid</option>



</select>
 </div>
</div>




                        <div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
  <label for="aproved_by" class="form-label ">Approved By</label>
  <textarea class="form-select form-control" id="aproved_by" tabindex="1" name="aproved_by" placeholder="Enter Name here" required></textarea>
  <!-- <input type="text" class="form-control" id="approval" name="approval" tabindex="1" placeholder="" required> -->
</div>
</div>






				<!-- <div class="col-lg-3 col-md-6 col-sm-6 " style="margin-top: 35px;">
				  <div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary">
					  Submit
					</button>
				  </div>
				</div> -->

        <div class="text-center mt-2">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="2"/>
                              </div>
                          </div>
				

</div>
</form>

				

				
			 

			</div>
			<!-- <div class="text-center mt-2 p-3">
			  <input type="submit" name="submit" value="Save" class="btn btn-warning " tabindex="13" />

			  
			</div> -->
			
		</div>
	  </div>
	</div>
  </div>
</div><!-- /.container-fluid -->

</div>