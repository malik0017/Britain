<?php 
$results=array();
$increament_id =  $_REQUEST[ 'CD' ] ;
 echo "wwwwwwww".$increament_id;
// if (isset($_POST['load'])) {
	
// 	$salaryid=array();
// 	$campus = ($_POST['campus']);
	
// 	 $sql = "SELECT s.*, d.employel_type as d_name
// 	FROM ".STAFF." as s
// 	INNER JOIN ".EMPLOYETYE. " as d ON s.employel_type = d.id
// 	WHERE s.campus = $campus AND s.IsActive = 1 AND s.IsLeft= 0";
	  
// 	$results = $conf->QueryRun($sql);
// 	 print_r($results);
	
	


// 	$results = $conf->fetchall(STAFF .  " as s INNER JOIN ". DEPARTMENT." as d ON d.id = s.department WHERE campus = $campus  And IsActive=1 ");
	
//   }
  if (isset($_POST['submit'])) {
	
	$staff=$_POST['staff'];
	
	$income_bonus=$_POST['income_bonus'];
	// echo"wwwwwwww".$income_bonus;
	$campus=$_POST['campus'];
	
	$int=0;
	foreach ($staff as $key => $data) {
	$int++;		//   print_r($data);
		//   exit;

				$income_bonus=$income_bonus[$int];
				
				//  echo "Aamir".$income_bonus;
				  $pre_basic_salary=$conf->BasicSalary($data);
				 
				  if($income_bonus>0){
					$basic_salary=$pre_basic_salary+$income_bonus;
				  }else{
					$basic_salary=$pre_basic_salary;
				  }
				
				
				
				 
		
				// $data_post = array( 'emp_id' => $data, 'pre_salary' =>$pre_basic_salary ,'increament_amount' =>$income_bonus,'new_salary' => $basic_salary,'date' =>$_SESSION['cDate'],'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate']);

				// $recodes = $conf->insert( $data_post, INREAMENTSALARY );

				 echo $table =  INREAMENTSALARY . " set `emp_id`='" . $data . "', `pre_salary`='" . $pre_basic_salary . "', `increament_amount`='" . $income_bonus . "',
				`new_salary`='" . $basic_salary . "' where id='" . $increament_id . "'";
		   
				   $recodes = $conf->updateValue( $table );

				   $results2 =$recodes;
				    // print_r($results2);
				//    exit;

				$table = STAFF . " set `basic_salary`='" . $basic_salary . "' where employel_id='" . $data . "'";
    			$recodes1 = $conf->updateValue($table);
				
				 
	}
	
	if ($recodes == $recodes1) {
		$success = "Data <strong>Updated</strong> Successfully";
		//$gen->redirecttime( 'class', '2000' );
  
	  }
	



	
	
  }

$campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );
$salary_type=$conf->fetchall( SALARY . " WHERE is_deleted=0" );
 $employel_name=$conf->fetchall( STAFF . " WHERE is_deleted=0" );

$campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );
$incr=$conf->fetchall( INREAMENTSALARY . " WHERE is_deleted=0" );
$reslut3 =$incr[0];
// foreach($incr as $reslut3 ){

// }
//  print_r($reslut3);
 
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
		 

			<!-- <div class="card-body"> -->
				<!-- <form name="" method="POST">
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


				

</div>
</form> -->

<form name="" method="POST">
<div class="row">
                       
                        <div class="col-lg-3 col-md-6 col-sm-6">
						<div class="form-group">
                            <label for="campus_type" class="form-label ">Campus </label>
                        <select class="form-select form-control" id="campus_type" tabindex="11" name="campus" required>  
                        <?php foreach($campus_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if($data->id==$campus){ echo "selected";} ?>><?php echo $data->campus_name; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                    </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="employel_name" > Employee Name</label>
                 
								<select class="form-select form-control" id="employel_name" tabindex="11" name="employel_name" required>  
                        <?php foreach($employel_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if($data->id==$employel_name){ echo "selected";} ?>><?php echo $data->employel_name; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                        </div>
                          </div>
						 
						  <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="increament_amount" >Bonus Income</label>
							
                                <input type="text" class="form-control" id="increament_amount" value="<?php echo $reslut3->increament_amount;?>" name="increament_amount" tabindex="3" placeholder="" required>    
							                                      
                        </div>
                          </div>
						  <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="pre_salary" >Basic Salary</label>
							
                                <input type="text" class="form-control" id="pre_salary" value="<?php echo $reslut3->pre_salary;?>" name="pre_salary" tabindex="3" placeholder="" required>    
							                                      
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