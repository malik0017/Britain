<?php
// require 'setup/config.php';

//delete record



$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");



if (isset($_POST['search_by_campus'])) {

   
  $campus_id = $_POST['campus'];
  $month_year = ($_POST['month_year']);
	
	$sm_arr=explode('-',$month_year);
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];

  echo$sql_query = "SELECT sf.*,s.employel_name as employel_name, d.employel_type as d_name 
  FROM ".STAFFSALARY." as sf
  INNER JOIN ".STAFF." AS s ON s.employel_id = sf.emp_id
  INNER JOIN ".EMPLOYETYE. " as d ON s.employel_type = d.id
  where sf.is_deleted = 0 &&  sf.campus_id = $campus_id && sf.salary_month= $salary_month";
echo"<br>";
  $results = $conf->QueryRun($sql_query);
  print_r($results);





}




?>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">



            <div class="card center1">
                          
                <form name="post" action="" method="post">
                  <div class="row py-3 ml-4">
                  
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">

                      <div class="form-group">
                        <label for="campus" class="form-label ">Campus</label>
                        <select class="form-select form-control" id="campus" tabindex="1" name="campus">
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
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
                    <div class="text-center my-auto mt-5">
                              <input type="submit" name="search_by_campus" value="Search" class="btn btn-warning " tabindex="8"/>
                      </div>
                  </div>
                      </form>
                   
                   

                

              </div>
              <!-- <div class="text-center float-right mt-3  mr-4">
                              <input type="submit" name="print" value="Print" class="btn btn-warning " tabindex="8"/>
                             </div> -->
              <!-- /.card-header -->
              <a class="btn btn-primary mt-3" style="float: right;" href="left-staff-print-report.php? cd=<?=$gen->IDencode($campus_id)?>"> Print</a>
              <div class="card-body">
             
              
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <!-- <th style="width:10%">Employee id</th> -->
                      <th style="width:10%">Employee Name</th>
                      <th style="width:8%">Designation</th>
                      <th style="width:10%">Gender</th>
                      <th style="width:5%">Contact</th>
                      
                      <th style="width:8%">Father Contact</th>




                      <!-- <th style="width:1%">View</th>
                      <th style="width:1%">Edit</th>
                      <th style="width:1%">Delete</th> -->



                      <!-- <th class="no-sort" style="width:13%">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach ($results as $data) {
                    ?>
                      <tr>

                        <!-- <td>
                          <?= $data->id ?>
                        </td> -->

                        <td>
                          <?= $data->employel_name ?>

                        </td>
                        <td>
                          <?= $data->d_name ?>

                        </td>
                        <td>
                          <?= $data->gender ?>

                        </td>
                        <td>
                          <?= $data->contact ?>

                        </td>
                        <td>
                          <?= $data->father_contact ?>

                        </td>


                      



                       
                      </tr>
                    <?php
                    }
                    ?>
                    
                  </tbody>
                 
                  <!-- <a class="btn btn-primary" style="float: right" href="left-staff-print-report.php">Print</a> -->
                  <!-- <a class="btn btn-primary" style="float: right" href="left-staff-print-report.php? cd=<?= $gen->IDencode($campus_id) ?>">Print</a> -->
                  <!-- <a class="btn btn-primary" style="float: right;" href="left-staff-print-report.php?cd=<?= $encoded_campus_id ?>">Print</a> -->
                </table>
               
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div> 