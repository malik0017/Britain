<?php 

// $staff_id='1';
// $numberOfLeave='1';
// $other_allowanc='1500';
// $installment_no= 0;
// $loan= 0;
// $sm_posted=$_POST['salary_month'];
// $sm_arr=explode('-',$sm_posted);
// $salary_month=$sm_arr[0];
// $salary_year=$sm_arr[1];

//  $basic_salary=$conf->BasicSalary($staff_id);
// // months pass in this function after 
// $leave_amount=round($conf->LeaveAmount($staff_id,$numberOfLeave));
// $lunch_amount=$conf->LunchAmount($staff_id);
// // echo "= basic===".$basic_salary."<br>";
// // echo "=Leave===".$leave_amount."<br>";
// // echo "=lunch===".$lunch_amount."<br>";

// $gross_sal=$basic_salary+$lunch_amount+$other_allowanc;
  
// $staff_kids=$conf->KidsStaff($staff_id);
// $income_tax=$conf->IncomeTax($gross_sal);
// $pfunds=$conf->ProvidentFunds($staff_id);
// $security_data=$conf->securityCheck($staff_id);
// $loans_check=$conf->LoansCheck($staff_id);
// $security_total=0;
// $loan_total=0;
// if (count($security_data)>0){
// 	$security_total=$security_data['total'];
// }
// if (count($loans_check)>0){
// 	$loan_total=$loans_check['total'];
// }



// // echo "= Gross Salary===".$gross_sal."<br>";
// // echo "= Staff kids===".$staff_kids."<br>";
// // echo "=Income Tax===".$income_tax."<br>";
// // echo "=Security===".$security_data['total']."<br>";
// // echo "=provident Funds===".$pfunds."<br>";
// // echo "=loan Check===".$loans_check."<br>";
// $net_salary= $gross_sal - $security_data['total'] - $pfunds - $income_tax -$loans_check;

// // echo "<br>"."the net salary is:".$net_salary;
//     $data_post = array( 'emp_id' => $staff_id, 'leaves' =>$numberOfLeave ,'basic_salary' => $basic_salary,'net_salary' => $net_salary,'d_loan' => $loan,'d_leave_amount' => $leave_amount,'a_lunch' => $lunch_amount,'free_kids' => $staff_kids,'d_income_tax' => $income_tax,'d_security' => $security_total,'d_provident_funds' => $pfunds,'installment_no' => $installment_no,'user_id' => $_SESSION[ 'user_reg' ],'salary_month' => $salary_month,'salary_year' => $salary_year,'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

// 		$recodes = $conf->insert( $data_post, STAFFSALARY );

// 		if (count($security_data)>0){
// 		foreach ($security_data as $key => $value) {
	
// 			if($key!= 'total'){
// 					$data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => $security_data[$key],'security_id' => $key,'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

// 				$recodes1 = $conf->insert( $data_post, SALARYSECURITY );
// 						}
						
// 		}
// 		}
// 		if (count($loans_check)>0){
// 			foreach ($loans_check as $key => $value) {
		
// 				if($key!= 'total'){
// 						$data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => $loans_check[$key],'loan_id' => $key,'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);
	
// 					$recodes2 = $conf->insert( $data_post, SALARYlOAN );
// 							}
							
// 			}
// 			}



//     // $data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => '100','allowance_id' => '100','user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

// 	// 	$recodes2 = $conf->insert( $data_post, SALARYALLOWANCE );

//     // $data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => '100','deduction_id' => '100','user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

// 	// 	$recodes3 = $conf->insert( $data_post, SALARYDEDUCT );

   
// 		if ( $recodes == true ) {
// 			$success = "Data <strong>Added</strong> Successfully";

// 			//$gen->redirecttime( 'campus', '2000' );
// 		}
$results=array();
if (isset($_POST['load'])) {
	
	$salaryid=array();
	$campus = ($_POST['campus']);
	$month_year = ($_POST['month_year']);
	
	$sm_arr=explode('-',$month_year);
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];
	
	$datasalary_exits=$conf->SalaryCheCreate($salary_month,$salary_year,$campus);
	if (!empty($datasalary_exits)) {
	$salaryid=implode(',',$datasalary_exits);

	 $sql = "SELECT s.*, d.employel_type as d_name
	FROM ".STAFF." as s
	INNER JOIN ".EMPLOYETYE. " as d ON s.employel_type = d.id
	WHERE s.campus = $campus AND s.IsActive = 1 AND s.IsLeft= 0 AND s.employel_id NOT IN ($salaryid) ";
	  
	$results = $conf->QueryRun($sql);
	//  print_r($results);
	}
	else{
	$sql = "SELECT s.*, d.employel_type as d_name
	FROM ".STAFF." as s
	INNER JOIN ".EMPLOYETYE. " as d ON s.employel_type = d.id
	WHERE s.campus = $campus AND s.IsActive = 1 AND s.IsLeft= 0";
	  
	$results = $conf->QueryRun($sql);

	}
	


	// $results = $conf->fetchall(STAFF .  " as s INNER JOIN ". DEPARTMENT." as d ON d.id = s.department WHERE campus = $campus  And IsActive=1 ");
	
  }
  if (isset($_POST['submit'])) {
	$sm_posted=$_POST['month_year'];
	$staff=$_POST['staff'];
	
	$income_bonus=$_POST['income_bonus'];
	$other=$_POST['other'];
	$advance=$_POST['advance'];
	$security=$_POST['security'];
	$lunch=$_POST['lunch'];
	
	$campus=$_POST['campus'];
	// print_r($campus);
	$sm_arr=explode('-',$sm_posted);
	
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];
	$int=0;
	foreach ($staff as $key => $data) {
	$int++;		//   print_r($data);
		//   exit;

				$income_bonus=$income_bonus[$int];
				
				$other=$other[$int];
				
				$advance=$advance[$int];
				$security=$security[$int];
		$numberOfLeave=1;
		$installment_no=0;
				  $basic_salary=$conf->BasicSalary($data);
				 
				  if($income_bonus>0){
					$basic_salary=$basic_salary+$income_bonus;
				  }
				//   echo "=====amount table======".$basic_salary;
				//   echo "=====Income bonus table======".$income_bonus;
				// //   echo "=====luch amoun======".$lunch[$int];
				//   exit;
				 // months pass in this function after 
				
				
				  $leave_amount=round($conf->LeaveAmount($data,$numberOfLeave));
				  $lunch_amount=$conf->LunchAmount($data);
				  $security_data=$conf->securityCheck($data);
				  $loans_check=$conf->LoansCheck($data);
					if($loans_check){
						// echo "====LOan CHeCK".$loans_check."<br>";
						if($advance<=$loans_check){
							// echo "====Advance Is less than".$loans_check."<br>";
							$loandata=$conf->QueryRun("SELECT * FROM " .EMPLOANS. " where emp_id=  ".$data."  AND is_completed = 0 AND parent_id=0");
							//print_r($loandata);
								$intallment_amount=0;
								if($loandata !== null){
								if(count($loandata)>0 )
								{
									// echo "====LOan CHeCK".$loans_check."<br>";
									$loan_deduc=$advance;
									foreach($loandata as $data1){
										$installment_amount = $data1->installment;
										//echo "==== maxid"."<br> $loan_deduc ---  $installment_amount";
										//exit;
										//  echo "====in looop"."<br>".$loan_deduc;
										$max_id = $conf->single(EMPLOANS . " where id = (select MAX(id) as max_id from " . EMPLOANS . " where parent_id='".$data1->id."')", "*");
										// print_r($max_id);
										if(!empty($max_id)){
											$installment_amount = $max_id->installment;
										}
                       
											// echo "==== maxid"."<br> $loan_deduc ---  $installment_amount";
											// exit;
											if($loan_deduc>=$installment_amount){
											
												$date=date("Y-m-d");
													$description='LoanRefund  BY'.$data.'against by loan id '.$data1->id.' Date '.$date.' amount is '.$installment_amount;
													$vno = $conf->VoucherNo();
													$vno = 'LR'.$vno;
																											
													$conf->FundsEntry(LOANFUNDS,$description, $installment_amount, $data, 'db',$data1->id,2, $date, $vno);
													$amount=$data->installment;
	
													$loan_deduc=$loan_deduc-$installment_amount;
											}elseif($loan_deduc<$installment_amount && ($loan_deduc>0)){
												$description='LoanRefund  BY'.$data.'against by loan id '.$data1->id.' Date '.$date.' amount is '.$loan_deduc;
													$vno = $conf->VoucherNo();
													$vno = 'LR'.$vno;
													
													$conf->FundsEntry(LOANFUNDS,$description, $loan_deduc, $data, 'db',$data1->id,2, $date, $vno);
													$loan_deduc=0;													
											}

											//--------update load is completed to 1
											$iscompleted=$conf->QueryRun("SELECT customer_id, invoice_id,
											SUM(CASE WHEN t_type = 'db' THEN t_amount ELSE 0 END) AS sum_db,
											SUM(CASE WHEN t_type = 'cr' THEN t_amount ELSE 0 END) AS sum_cr
									 		FROM " .LOANFUNDS. " where customer_id=  ".$data."  AND invoice_id=".$data1->id." ");
											if($iscompleted->sum_db==$iscompleted->sum_cr){
												$table = EMPLOANS . " set is_completed=1 where id='" . $data1->id . "'";
												$recodes4 = $conf->updateValue( $table );
											}

											
											
										//}
									}
										
								}		

						}
					}
				}
				  if( $lunch_amount ==  $lunch[$int]){
					$lunch_amount=$lunch_amount;
				  }else{
					$lunch_amount=$lunch[$int];
				  }
				  if($security_data==$security){
					$security=$security_data;
				  }
				//   if($loans_check==$advance){
				// 	$advance=$loans_check;
				//   }
				  
				  $gross_sal=$basic_salary+$lunch_amount+(int)$other-$leave_amount;
  
				$staff_kids=$conf->KidsStaff($data);
				// $income_tax=$conf->IncomeTax($gross_sal);
				$pfunds=$conf->ProvidentFunds($data);
				//   echo "=====amount table======".$pfunds;
				//   echo "=====Income bonus table======".$income_bonus;
				// //   echo "=====luch amoun======".$lunch[$int];
				//   exit;
				$security_data=$conf->securityCheck($data);
				// $loans_check=$conf->LoansCheck($data);
				$net_salary= $gross_sal - (int)$advance - $pfunds - $income_tax - (int)$security;
				// echo "====".$net_salary."<br>";
				$data_post = array( 
				'emp_id' => $data, 'leaves' =>$numberOfLeave ,'campus_id' =>$campus,
				'basic_salary' => $basic_salary,'net_salary' => $net_salary,'d_loan' => $advance,'d_leave_amount' => $leave_amount,
				'a_lunch' => $lunch_amount,'free_kids' => $staff_kids,'d_income_tax' => $income_tax,'d_security' => $security,
				'd_provident_funds' => $pfunds,'installment_no' => $installment_no,'user_id' => $_SESSION[ 'user_reg' ],
				'salary_month' => $salary_month,'salary_year' => $salary_year,'other_allowance' => $other,
				'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

				$recodes = $conf->insert( $data_post, STAFFSALARY );
				$table = STAFF . " set `basic_salary`='" . $basic_salary . "' where employel_id='" . $data . "'";
    			$recodes1 = $conf->updateValue($table);
				$date=date("Y-m-d");
				$description='Funds BY'.$data->employel_name.' Date '.$date.' amount is '.$pfunds;
				$vno = $conf->VoucherNo();
				$vno = 'PF'.$vno;
				
				

				$conf->FundsEntry(PROVIDENTFUNDS,$description, $pfunds, $data, 'cr',0,1, $date, $vno);				
				 
	}
	
	if ($recodes == true) {
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
						<th scope="col">C.Month Remarks</th>
						<th scope="col">Days</th>
						<th scope="col">Amount</th>
						<th scope="col">Lunch</th>
						<th scope="col">Free Kids</th>
						<th scope="col">Other</th>
						<th scope="col">Gross Salary</th>
						<th scope="col">Income Tax</th>
						<th scope="col">Security</th>
						<th scope="col">P.Funds</th>
						<th scope="col">Advance</th>
						<th scope="col">Adv Balance</th>
						<th scope="col">Net Salary</th>
						<th scope="col">Transfer</th>
						<th scope="col">Cash</th>
						<th scope="col">Remarks</th>
                    
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
				
				$loans_remaining=$conf->currentBalance(LOANFUNDS, $data->employel_id);
				$net_salary= $gross_sal - $security_data['total'] - $pfunds - $income_tax -$loans_check;

				
				?>

                <tr >
				<td><input type="checkbox" name="staff[]" value="<?php echo $data->employel_id; ?>" class="case" type="checkbox"></td>
						<td> <?php echo $data->employel_id;?> </td>
                        <td> <?php echo $data->employel_name;?> </td>
						<td>  <?php echo $data->d_name;?> </td>
                        <td><input type="text"  id="incomebonus_<?php echo $int; ?>"class="changesNo"value="<?php echo "0"; ?>" name="income_bonus[]" >  </td>
						<td> <span class="basic_salary_<?php echo $int; ?>" default="<?php echo  $basic_salary; ?>"><?php echo  $basic_salary; ?></span> </td>
                        <td><span class="c_month_remark_<?php echo $int; ?>">Allow</span> </td>
						<td> <span class="day_<?php echo $int; ?>"><?php echo  $numberOfLeave; ?></span>  </td>
                        <td>  <span class="leaves_<?php echo $int; ?>"><?php echo  $leave_amount; ?></span></td>
						<td> <input type="text"  id="lunch_<?php echo $int; ?>"class="changesNo" value="<?php echo $lunch_amount; ?>" name="lunch[]" >  </td>
                        <td> <span class="day_<?php echo $int; ?>"><?php echo  $staff_kids; ?></span>  </td>  </td>
						<td> <input type="text"  id="other_<?php echo  $int; ?>"class="changesNo other" value="" name="other[]" > </td>
                        <td> <span class="gross_salary_<?php echo $int; ?>"><?php echo  $gross_sal; ?></span> </td>
						<td>  <span class="income_tax_<?php echo $int; ?>"><?php echo  $income_tax; ?></span></td>
                        <td>  <input type="text"  id="security_<?php echo $int; ?>"class="changesNo" value="<?php echo $data->security_data; ?>" name="security[]" ></td>
						<td>  <span class="p_funds_<?php echo $int; ?>"><?php echo  $pfunds; ?></span></td>
                        <td> <input type="text"  id="advance_<?php echo $int; ?>"class="changesNo" value="<?php echo $loans_check; ?>" name="advance[]" >  </td>
						<td> <span class="advance_balance_<?php echo $int; ?>"><?php echo  $loans_remaining; ?></span> </td>
						<td> <span class="net_balance_<?php echo $int; ?>"><?php echo  $net_salary; ?></span> </td>
						<td>  </td>
						<td>  </td>
						<td> 
							 
							<textarea class="remarks" row="5" col="20"  name="remarks[]"></textarea>
						</td>
                    <!-- Add more data columns as needed -->
                </tr>
				<?php } }else{ ?>
					<td colspan="19" class="text-center">No Data Available</td>
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