<?php 
$results=array();
if ( isset( $_POST[ 'deleteid' ] ) ) {
	$deleteid=$_POST[ 'deleteid' ];
	// print_r($deleteid);
	//delete From Database
	  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
	//delete From Frontened
	$table = STAFFSALARY. " set `is_deleted`= 1  where id='" . $deleteid . "'";

	$flagmain = $conf->updateValue( $table );
	if ( $flagmain ) {
		  $success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
	  }
   
  }
if (isset($_POST['load'])) {
	
	$salaryid=array();
	$campus = ($_POST['campus']);
	$month_year = ($_POST['month_year']);
	
	$sm_arr=explode('-',$month_year);
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];
	// echo"<br>";
	// echo"<br>";
	// print_r($salary_month);
	// echo"<br>";
	// echo"<hr>";
	// print_r($salary_year);
	// echo"<br>";
	// echo"<hr>";

	// echo $sql = "SELECT * FROM ".STAFFSALARY."  
	// WHERE campus_id = $campus  AND salary_month= $salary_month AND salary_year= $salary_year ";

	
	$sql = "SELECT sf.*, s.employel_name as employel_name, s.father_name as father_name, s.address as address, s.cnic as cnic,
	s.date_birth as date_birth, s.contact as contact, s.jouning_date as jouning_date, s.city as city, s.HouseAllowance as HouseAllowance, s.lunch_allowance as lunch_allowance,
	s.travelling_allowane as travelling_allowane
	FROM ".STAFFSALARY." AS sf
	INNER JOIN ".STAFF." AS s ON s.employel_id = sf.emp_id
	WHERE sf.campus_id = $campus AND sf.salary_month = $salary_month AND sf.salary_year = $salary_year AND sf.is_deleted = 0;
	";
	  
	$results = $conf->QueryRun($sql);
	// print_r($results);

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
	<div class="col-lg-4 col-md-4 col-sm-6">
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

	<div class="row">
	
        <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
        <div class="float-right mt-4 ">
            <a class="btn btn-warning float-right" href="create_salary.php"> Create New Salary </a>
        </div>
    
	</div>
	

	<div class="col-lg-12 ">
	  <div class="p-2  ">
		<h3 class=" ">All Staff Salary</h3>
	  </div>
	</div>

</div>
</form>

</div>

		<div class="card-body">
		 

			

<form name="" method="POST">

				<div class="table-container">
				
        <table >
		<thead class="btn-warning">

<tr class="btn-warning textcolor">
						
						<th scope="col">Id</th>
						<th scope="col">Employee Name</th>
						<th scope="col">Father Name</th>
						<th scope="col">Addrress</th>
						<th scope="col">city</th>
						<th scope="col">cnic</th>
						<th scope="col">date_birth</th>
						<th scope="col">contact</th>
						<th scope="col">jouning_date</th>
						<th scope="col">basic_salary</th>
						<th scope="col">Leaves</th>
						<th scope="col">Detection Amount Leave</th>
						<th scope="col">Lunch Allowance</th>
						<th scope="col">Kids Fee</th>
						<th scope="col">Detection Tax Amount</th>
						<th scope="col">Security Detection</th>
						<th scope="col">Other Allowance</th>
					

						<th scope="col">View</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
						
                    
                </tr>
            </thead>
            <tbody>
			<tbody>
                <?php
               
                foreach ($results as $data){
               ?>
                <tr>

                    <td>
                      <?=$data->id; ?>
                    </td>
					<td>
                      <?=$data->employel_name; ?>
                    </td>
					<td>
                      <?=$data->father_name; ?>
                    </td>
					<td>
                      <?=$data->address; ?>
                    </td> 
					<td>
                      <?=$data->city; ?>
                    </td> 
					
				 <td>
                      <?=$data->cnic; ?>
                    </td>
					<td>
                      <?=$data->date_birth; ?>
                    </td>
					<td>
                      <?=$data->contact; ?>
                    </td>
					<td>
                      <?=$data->jouning_date; ?>
                    </td> 
					<td>
                      <?=$data->basic_salary; ?>
                    </td> 
                    
					<td>
                      <?=$data->leaves; ?>
                    </td>
					<td>
                      <?=$data->d_leave_amount; ?>
                    </td>
					<td>
                      <?=$data->a_lunch; ?>
                    </td>
					<td>
                      <?=$data->free_kids; ?>
                    </td> 
					<td>
                      <?=$data->d_income_tax; ?>
                    </td> 
					<td>
                      <?=$data->d_security; ?>
                    </td>
					<td>
                      <?=$data->other_allowance; ?>
                    </td>
				

                    <td class="">
                    
                    <form action="salary-show.php?CD=<?php echo $data->id; ?>" method="post">
										<button type="submit" class="btn btn-primary">Show</button>									

                </form>
                    
                    </td>
                    <td>
                    <form action="salary-edit.php?CD=<?php echo $data->id; ?>" method="post">
                   
										<button type="submit" class="btn btn-primary">Edit</button>									

                </form>  
                    </td>
                    <td>
                       <form action="" method="post">
                      <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                      </form></td>

               
                </tr>
                <?php } ?>
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