<?php 
$results=array();
if (isset($_POST['load'])) {
	
	$salaryid=array();
	$campus = ($_POST['campus']);
	
	 $sql = "SELECT s.*, d.employel_type as d_name
	FROM ".STAFF." as s
	INNER JOIN ".EMPLOYETYE. " as d ON s.employel_type = d.id
	WHERE s.campus = $campus AND s.IsActive = 1 AND s.IsLeft= 0";
	  
	$results = $conf->QueryRun($sql);
	//  print_r($results);
	
	


	// $results = $conf->fetchall(STAFF .  " as s INNER JOIN ". DEPARTMENT." as d ON d.id = s.department WHERE campus = $campus  And IsActive=1 ");
	
  }
  if (isset($_POST['submit'])) {
	
	$staff=$_POST['staff'];
	
	$income_bonus=$_POST['income_bonus'];
	
	$campus=$_POST['campus'];
	
	$int=0;
	foreach ($staff as $key => $data) {
	$int++;		//   print_r($data);
		//   exit;

				$income_bonus=$income_bonus[$int];
				
				
				  $pre_basic_salary=$conf->BasicSalary($data);
				 
				  if($income_bonus>0){
					$basic_salary=$pre_basic_salary+$income_bonus;
				  }else{
					$basic_salary=$pre_basic_salary;
				  }
				
				
				
				 
		

					$data_post = array( 'emp_id' => $data, 'pre_salary' =>$pre_basic_salary ,'increament_amount' =>$income_bonus,'new_salary' => $basic_salary,'campus_id' => $campus,'date' =>$_SESSION['cDate'],'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate']);


				$recodes = $conf->insert( $data_post, INREAMENTSALARY );

				$table = STAFF . " set `basic_salary`='" . $basic_salary . "' where employel_id='" . $data . "'";
    			$recodes1 = $conf->updateValue($table);
				
				 
	}
	
	if ($recodes == $recodes1) {
		$success = "Data <strong>Insert</strong> Successfully";
		//$gen->redirecttime( 'class', '2000' );
  
	  }
	



	
	
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
				<div class="col-lg-4 col-md-6 col-sm-6">

				  <div class="form-group">
					<label for="campus" class="form-label ">Campus</label>
					<select class="form-select form-control" id="campus" tabindex="1" name="campus" required>
					  <?php foreach ($campus_name as $data) { ?>
						<option value="<?php echo $data->id; ?>" <?php if($data->id == $campus) { echo 'selected';} ?>><?php echo $data->campus_name; ?></option>
					  <?php  } ?>
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
					<h3 class=" ">All Staff</h3>
				  </div>
				</div>

</div>
</form>
<form name="" method="POST">

				<div class="table-container">
				
        <table >
		<thead class="btn-warning">

<tr class="btn-warning textcolor">
						<th scope="col"><input id="check_all" class="formcontrol" type="checkbox"></th>
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">Designation</th>
						<th scope="col">Bonus incr.</th>
						<th scope="col">Basic Salary</th>
						
                    
                </tr>
            </thead>
            <tbody>
			<?php if(!empty($results)){ 
				$int=0;
				foreach( $results as $key => $data){
					$int++;
					$numberOfLeave=1;
				  $basic_salary=$conf->BasicSalary($data->employel_id);
				 // months pass in this function after 
				  $leave_amount=round($conf->LeaveAmount($data->employel_id,$numberOfLeave));
				  $lunch_amount=$conf->LunchAmount($data->employel_id);
			
				  $gross_sal=$basic_salary+$lunch_amount-$leave_amount;
  
				$staff_kids=$conf->KidsStaff($data->employel_id);
				$income_tax=$conf->IncomeTax($gross_sal);
				$pfunds=$conf->ProvidentFunds($data->employel_id);
				$security_data=$conf->securityCheck($data->employel_id);
				$loans_check=$conf->LoansCheck($data->employel_id);
				$net_salary= $gross_sal - $security_data['total'] - $pfunds - $income_tax -$loans_check;

				
				?>

                <tr >
				<td><input type="checkbox" name="staff[]" value="<?php echo $data->employel_id; ?>" class="case" type="checkbox"></td>
						<td> <?php echo $data->employel_id;?> </td>
                        <td> <?php echo $data->employel_name;?> </td>
						<td>  <?php echo $data->d_name;?> </td>
                        <td><input type="text"  id="incomebonus_<?php echo $int; ?>"class="changesNo"value="<?php echo "0"; ?>" name="income_bonus[]" >  </td>
						<td> <span class="basic_salary_<?php echo $int; ?>" default="<?php echo  $basic_salary; ?>"><?php echo  $basic_salary; ?></span> </td>
                       
						
                    <!-- Add more data columns as needed -->
                </tr>
				<?php } }else{ ?>
					<td colspan="6" class="text-center">No Data Available</td>
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

			<!-- /.card-body -->
		  </form>
		</div>
	  </div>
	</div>
  </div>
</div><!-- /.container-fluid -->

</div>