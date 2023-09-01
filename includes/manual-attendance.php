<?php 

$results=array();
if (isset($_POST['load'])) {
	
	$salaryid=array();
	$campus = ($_POST['campus']);
	$month_year = ($_POST['month_year']);
	
	$sm_arr=explode('-',$month_year);
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];


	$numDays = cal_days_in_month(CAL_GREGORIAN, $salary_month, $salary_year);

// Loop through each day of the month
// for ($day = 1; $day <= $numDays; $day++) {
//     $date = sprintf("%04d-%02d-%02d", $salary_year, $salary_month, $day);
//     echo $date . "\n";
// }
// 	exit;
	

	// $results = $conf->fetchall(STAFF .  " as s INNER JOIN ". DEPARTMENT." as d ON d.id = s.department WHERE campus = $campus  And IsActive=1 ");
	
  }
 
$campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );

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
					<select class="form-select form-control" id="campus" tabindex="1" name="campus" required>
					  <?php foreach ($campus_name as $data) { ?>
						<option value="<?php echo $data->id; ?>" <?php if($data->id == $campus) { echo 'selected';} ?>><?php echo $data->campus_name; ?></option>
					  <?php  } ?>
					</select>
				  </div>
				</div>
				<div id="staffkid" class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Staff</label>
                        <select class="form-select form-control" id="staff_id" tabindex="42" name="staff_id">
                          <!-- Staff options will be dynamically populated here -->
                        </select>
                      </div>
                    </div>
				<div class="col-lg-3 col-md-4 col-sm-6">
				  <div class="form-group">
					<label for="addmission_no">Salary Month:</label>
					<select class="form-select form-control" name="month_year" id="month_year">
    <?php
    $currentYear ='2022';
    $currentMonth = '2';
	// $currentYear = date("Y");
    // $currentMonth = date("n");
	$selectedValue = $month_year;
	
    for ($year = $currentYear; $year <= ($currentYear + 10); $year++) {
        $startMonth = ($year === $currentYear) ? $currentMonth : 1;
        
        for ($month = $startMonth; $month <= 12; $month++) {
            $monthName = date("F", mktime(0, 0, 0, $month, 1));
            $optionValue = "$month-$year";
			$selectedAttribute = ($optionValue === $selectedValue) ? 'selected' : '';
            echo "<option value='$optionValue'$selectedAttribute>$monthName $year</option>";
        }
    }
    ?>
</select>

				  </div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 " style="margin-top: 35px;">
				  <div class="form-group">
					<button type="submit" name="load" class="btn btn-primary">
					  Load
					</button>
				  </div>
				</div>


				<div class="col-lg-12 ">
				  <div class="p-2  ">
					<h3 class=" ">All Dates</h3>
				  </div>
				</div>

</div>
</form>
<form name="" method="POST">

				<div class="table-container">
				
        <table >
		<thead class="btn-warning">

<tr class="btn-warning textcolor">
						<th scope="col" style="width:2px;"><input id="check_all" class="formcontrol" type="checkbox"></th>
						<th scope="col">Date</th>
						<th scope="col">Time-In</th>
						<th scope="col">Time-out</th>
						
						
                    
                </tr>
            </thead>
            <tbody>
			<?php
			
			for ($day = 1; $day <= $numDays; $day++) {
				 $date = sprintf("%04d-%02d-%02d", $salary_year, $salary_month, $day); ?>
				 <tr>
					<td  style="width:2px;"><input type="checkbox" name="date[]" value="<?php  $data->employel_id; ?>" class="case" type="checkbox"></td></td>
					<td>
				<?php echo $gen->date_for_user($date); ?></td>
					<td> <input type="time"  id="timein_<?php echo  $int; ?>"class="changesNo timein" value="" name="timein[]" > </td>
					<td><input type="time" step="3600"  id="timeout_<?php echo  $int; ?>"class="changesNo timeout" value="" name="timeout[]" > </td>
				</tr>

				
			<?php }
			?>

              <!-- Repeat rows as needed -->
            </tbody>
        </table>

    </div>

				
				

				
			 

			</div>
			<div class="text-center mt-2 p-3">
			  <input type="submit" name="submit" value="Save" class="btn btn-warning " tabindex="13" />

			  
			</div>
			<input type="hidden" name="campus" value="<?php echo $campus; ?>"/>   
<input type="hidden" name="month_year" value="<?php echo $month_year; ?>"/>
			<!-- /.card-body -->
		  </form>
		</div>
	  </div>
	</div>
  </div>
</div><!-- /.container-fluid -->

</div>