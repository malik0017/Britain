<?php 

$results=array();
if (isset($_POST['load'])) {
	
	$salaryid=array();
	$campus = ($_POST['campus']);
	$month_year = ($_POST['month_year']);
	$staff_id = ($_POST['staff_id']);
	$sm_arr=explode('-',$month_year);
	// echo '------',$month_year;
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];


	$month = str_pad($salary_month, 2, '0', STR_PAD_LEFT);
    
    // Create the formatted date in "YYYY-MM" format
    $formattedDate = $salary_year . '-' . $month;


	$mark_holiday=$conf->getHolidays($month_year);
	$workingdays=$conf->workingDays($mark_holiday,$salary_month,$salary_year);
	$sql_query = "SELECT * FROM ".ATTENDANCESTAFF."  WHERE date LIKE '".$formattedDate."%'  AND emp_id=" . $staff_id . " ";
	//  $sql_query;
	$date_machine=array();
	$machine_data = $conf->QueryRun($sql_query);





	if(!empty($machine_data)){
		foreach($machine_data as $datemac){
			$date_machine[]=$datemac->date;
		}

	}
	$sql_query1 = "SELECT * FROM ".ATTENDANCESTAFF."  WHERE date LIKE '".$formattedDate."%'  AND emp_id=" . $staff_id . " ";
	//  $sql_query;
	$date_machine1=array();
	$machine_data1 = $conf->QueryRun($sql_query1);
	
	if(!empty($machine_data1)){
		
		foreach($machine_data1 as $datemac1){
			if(empty($date_machine1[$datemac1->date]['in_time'] ) && ($datemac1->type=='I')){
				
				$date_machine1[$datemac1->date]['in_time'] = $datemac1->time;
			}
			
			
			if($datemac1->type=='O'){
       		$date_machine1[$datemac1->date]['out_time'] = $datemac1->time;
			}
			   
		}

	}

	//  print_r($date_machine1);
	// exit;
	$sql = "SELECT sh.*,st.id ,st.employel_id,st.employel_type,st.grace_time
                        FROM ".STAFF." as st
                        INNER JOIN ".EMPLOYETYE. " as emt ON st.employel_type = emt.id
                        INNER JOIN ".SHIFTS. " as sh ON emt.shift_id = sh.ShiftID
                        WHERE st.IsActive=1 AND st.IsLeft = 0 AND st.employel_id=$staff_id";
                        // echo $sql;
    $results = $conf->QueryRun($sql);
	
	// $numDays = cal_days_in_month(CAL_GREGORIAN, $salary_month, $salary_year);
 }
 if (isset($_POST['submit'])) {
	
	$salaryid=array();
	// $campus = ($_POST['campus']);
	// $month_year = ($_POST['month_year']);
	$staff_id = ($_POST['staff_id']);
	$date = ($_POST['date']);
	$time_in = ($_POST['timein']);
	$time_out = ($_POST['timeout']);
	//print_r($time_in);
		// exit;
	if(!empty($date)){
		$sql1 = "INSERT INTO ".ATTENDANCESTAFF." (emp_id,date,time,type,machine_id,verify_mode) VALUES ";
		
			foreach ($date as $key => $res) {
			$sql1 .= "('$staff_id','$res','$time_in[$key]','I','200','100'),";
			$sql1 .= "('$staff_id','$res','$time_out[$key]','O','200','100'),";
			
		}
		//  echo $sql1;
		$sql1 = trim($sql1, ',');
		// 
		$insert_row = $conf->QueryRunsimple($sql1);
		// echo "-------".$insert_row;
		if ($insert_row == true) {
			$success = "Data <strong>Insert</strong> Successfully";
			//$gen->redirecttime( 'class', '2000' );
	  
		  }

	}
	// $sm_arr=explode('-',$month_year);
	// $salary_month=$sm_arr[0];
	// $salary_year=$sm_arr[1];
	// $mark_holiday=$conf->getHolidays($month_year);
	// $workingdays=$conf->workingDays($mark_holiday,$salary_month,$salary_year);
	// $sql = "SELECT sh.*,st.id ,st.employel_id,st.employel_type,st.grace_time
    //                     FROM ".STAFF." as st
    //                     INNER JOIN ".EMPLOYETYE. " as emt ON st.employel_type = emt.id
    //                     INNER JOIN ".SHIFTS. " as sh ON emt.shift_id = sh.ShiftID
    //                     WHERE st.IsActive=1 AND st.IsLeft = 0 AND st.employel_id=$staff_id";
    //                     // echo $sql;
    // $results = $conf->QueryRun($sql);
	// $numDays = cal_days_in_month(CAL_GREGORIAN, $salary_month, $salary_year);
	
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
		.mac_att{
			background-color:#244F96;
			color:#ffffff;
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
			
			foreach($workingdays as $data){
				$day= date("l", strtotime($data));
				
        
				if($day=="Monday" || $day=="Tuesday" || $day=="Wednesday" || $day=="Thursday"){
				   
					$start_time=$results[0]->StartTime;
					$end_time=$results[0]->EndTime;
				   
				}
				else if($day=="Friday")
				{
		
					$start_time=$results[0]->StartTime1;
					$end_time=$results[0]->EndTime1;
				   
				}
				else if($day=="Saturday" || $day=="Sunday") {
					$start_time=$results[0]->StartTime2;
					$end_time=$results[0]->EndTime2; 
					
				 }
				 $date = sprintf("%04d-%02d-%02d", $salary_year, $salary_month, $day); 
				 if (!in_array($data, $date_machine)) {
				 ?>
				
				 <tr>
					<td  style="width:2px;"><input type="checkbox" name="date[]" value="<?php echo $data; ?>" class="case" type="checkbox" ></td>
					<td>
				<?php echo $gen->date_for_user($data); ?></td>
					<td> <input type="time"  id="timein_<?php echo  $int; ?>"class="changesNo timein" value="<?php echo  $start_time; ?>" name="timein[]" > </td>
					<td><input type="time" step="3600"  id="timeout_<?php echo  $int; ?>"class="changesNo timeout" value="<?php echo $end_time; ?>" name="timeout[]" > </td>
				</tr>

				
			<?php }
			else{
				
				

			?>
				<tr class="mac_att">
				<td  style="width:2px;"></td>
				<td>
				<?php echo $gen->date_for_user($data); ?></td>
				<td> <?php  echo  $date_machine1[$data]['in_time']; ?> </td>
				<td><?php  echo $date_machine1[$data]['out_time']; ?> </td>
			</tr>

<?php			
 
 } }
			?>

              <!-- Repeat rows as needed -->
            </tbody>
        </table>

    </div>

				
				

				
			 

			</div>
			<div class="text-center mt-2 p-3">
			  <input type="submit" name="submit" value="Save" class="btn btn-warning "  />

			  
			</div>
			<input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>"/>   
			<input type="hidden" name="month_year" value="<?php echo $month_year; ?>"/>
			<!-- /.card-body -->
		  </form>
		</div>
	  </div>
	</div>
  </div>
</div><!-- /.container-fluid -->

</div>