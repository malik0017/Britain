<?php
$salary_id =  $_REQUEST[ 'CD' ] ;

$sql = "SELECT sf.*, s.employel_name as employel_name, s.father_name as father_name, s.address as address, s.cnic as cnic, 
	s.date_birth as date_birth, s.contact as contact, s.jouning_date as jouning_date, s.city as city, s.HouseAllowance as HouseAllowance, s.lunch_allowance as lunch_allowance,
	s.travelling_allowane as travelling_allowane,  c.campus_name as campus
	FROM ".STAFFSALARY." AS sf
	INNER JOIN ".STAFF." AS s ON s.id = sf.emp_id
  INNER JOIN ".CAMPUStbl." AS c ON sf.campus_id =c.id
	WHERE sf.id = $salary_id AND sf.is_deleted = 0;
	";
	  
	$results = $conf->QueryRun($sql);
  $row =$results[0];
  // print_r($row);


// if ( isset( $_POST[ 'submit' ] ) ) {

//   $employel_level = ($_POST[ 'employel_level' ]);
//   $cnic = ($_POST[ 'cnic' ]);
//   $employel_name = ($_POST[ 'employel_name' ]);
//   $gender = ($_POST[ 'gender' ]);
//   $father_name = ($_POST[ 'father_name' ]);
//   $father_contact = ($_POST[ 'father_contact' ]);
//   $d_leave_amount = ($_POST[ 'd_leave_amount' ]);
//   $a_lunch = ($_POST[ 'a_lunch' ]);
//   $date_birth = ($_POST[ 'date_birth' ]);
//   $jouning_date = ($_POST[ 'jouning_date' ]);
//   $campus = ($_POST[ 'campus' ]);


//   $employel_type = ($_POST[ 'employel_type' ]);
//   $department = ($_POST[ 'department' ]);
//   $shift = ($_POST[ 'shift' ]);
//   $cnic = ($_POST[ 'cnic' ]);
//   $contact = ($_POST[ 'contact' ]);
//   $address = ($_POST[ 'address' ]);
//   $city = ($_POST[ 'city' ]);
//   $salary_type = ($_POST[ 'salary_type' ]);
//  $basic_salary = ($_POST[ 'basic_salary' ]);
//  $account_no = ($_POST[ 'account_no' ]);
//   $perdaydeduction = ($_POST[ 'perdaydeduction' ]);
//   $travelling_allowane = ($_POST[ 'travelling_allowane' ]);
//   $lunch_allowance = ($_POST[ 'lunch_allowance' ]);
//   $other_allowance = ($_POST[ 'other_allowance' ]);
//   $providentfundratio = ($_POST[ 'providentfundratio' ]);
//   $bank_account = ($_POST[ 'bank_account' ]);
//   $grace_time = ($_POST[ 'grace_time' ]);
//   $employel_email = ($_POST[ 'employel_email' ]);
//   $remarks = ($_POST[ 'remarks' ]);
//   $experience = ($_POST[ 'experience' ]);
//   $institute = ($_POST[ 'institute' ]);
//   $total_year = ($_POST[ 'total_year' ]);
//   $total_months = ($_POST[ 'total_months' ]);
//   $designation = ($_POST[ 'designation' ]);
//   $startsalary = ($_POST[ 'startsalary' ]);
//   $employel_image = ($_POST[ 'employel_image' ]);
//   $last_qualification = ($_POST[ 'last_qualification' ]);
//   $organization = ($_POST[ 'organization' ]);
//   $passing_year = ($_POST[ 'passing_year' ]);
//   $appointmate_class = ($_POST[ 'appointmate_class' ]);
//   $confirmation_date = ($_POST[ 'confirmation_date' ]);
//   $transfer_bank = ($_POST[ 'transfer_bank' ]);

 
//   echo $dateOnly;

//   $val->name('Employel Level')->value($employel_level)->pattern('text')->required();
//   $val->name('Shift ')->value($shift)->pattern('text')->required();


//   if(!$val->isSuccess()){
//     $error = $val->displayErrors();        
//   }

	
//   if ( empty( $error ) ) {

//     $table = STAFF . " set `employel_level`='" . $employel_level . "', `cnic`='" . $cnic . "', `employel_name`='" . $employel_name . "',
//      `gender`='" . $gender . "', `father_name`='" . $father_name . "', `father_contact`='" . $father_contact . "', `d_leave_amount`='" . $d_leave_amount . "',
//     `a_lunch`='" . $a_lunch . "', `date_birth`='" . $date_birth . "', `jouning_date`='" . $jouning_date . "', `campus`= '" .$campus."', `employel_type`='" . $employel_type . "', `department`='" . $department . "', `shift`='" . $shift . "', `cnic`='" . $cnic . "', 
//     `contact`='" . $contact . "', `address`='" . $address . "', `city`='" . $city . "', `salary_type`='" . $salary_type . "', `basic_salary`='" . $basic_salary . "',
//     `account_no`='" . $account_no . "', `perdaydeduction`='" . $perdaydeduction . "', `travelling_allowane`='" . $travelling_allowane . "'
//   , `lunch_allowance`='" . $lunch_allowance . "', `other_allowance`='" . $other_allowance . "', `providentfundratio`='" . $providentfundratio . "', `bank_account`='". $bank_account . "',
//   `grace_time`='" . $grace_time . "', `employel_email`='" . $employel_email . "', `remarks`='" . $remarks . "', `experience`='" . $experience . "'
//   ,`institute`='" . $institute ."', `total_year`='" . $total_year . "', `total_months`='" . $total_months . "', `designation`='". $designation . "'
//   , `startsalary`='" . $startsalary . "', `employel_image`='" . $employel_image . "', `last_qualification`='" . $last_qualification . "'
//   , `organization`='" . $organization . "', `passing_year`='" . $passing_year . "', `appointmate_class`='" . $appointmate_class . "'
//   , `confirmation_date`='" . $confirmation_date . "', `transfer_bank`='" . $transfer_bank ."' where id='" . $staff_id . "'";

// 		$recodes = $conf->updateValue( $table );

// 		if ( $recodes == true ) {
// 			$success = "Record <strong>Updated</strong> Successfully";

// 			// $gen->redirecttime( 'staff-view.php', '2000' );
// 		} 
//     else {
// 			$error = "Staff Not Updated";
// 		}
    
		
// 	}
// }
// $table_fetch = STAFF . " where id='" . $staff_id . "'";
// $row = $conf->singlev( $table_fetch );

$dateTime = new DateTime($row->date_birth);
$date_birth = $dateTime->format('Y-m-d'); 

$dateTime = new DateTime($row->jouning_date);
$jouning_date = $dateTime->format('Y-m-d'); 

$dateTime = new DateTime($row->confirmation_date);
$confirmation_date = $dateTime->format('Y-m-d');

$salary_type=$conf->fetchall( SALARY . " WHERE is_deleted=0" );
$employel_type=$conf->fetchall( EMPLOYETYE . " WHERE is_deleted=0" );
$employel_level=$conf->fetchall( EMPLOYELEVEL . " WHERE is_deleted=0" );
$department=$conf->fetchall( DEPARTMENT . " WHERE is_deleted=0" );
$campus_type=$conf->fetchall( CAMPUSTYPE . " WHERE is_deleted=0" );
?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="POST">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="form-group">
                                    <label for="employel_name" > Employee </label>
                                    <input type="text" class="form-control" id="employel_name" value="<?php echo $row->employel_name; ?>" name="employel_name" tabindex="2" placeholder="" required>
                                </div>
                            </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="cnic"> Cnic</label>
                                <input type="text" class="form-control" id="cnic" value="<?php echo $row->cnic; ?>" name="cnic" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="salary_month" >Salary Month</label>
                                <input type="text" class="form-control" id="salary_month" value="<?php echo $row->salary_month; ?>" name="salary_month" tabindex="3" placeholder="" required>                                          
                        </div>
                          </div>
                          <div class="col-lg-3  col-md-6 col-sm-6">
                          <!-- <div class="form-group">
                              <label for="gender" class="form-label ">Gender</label>
                          <select class="form-select form-control" id="gender" tabindex="4" value="<?php echo $row->gender; ?>" name="gender">                                        
                                  <option value="male" <?php if($row->gender=="male"){ echo 'selected';} ?>>Male</option>
                                  <option value="female" <?php if($row->gender=="female"){ echo 'selected';} ?>>Female</option>
                                  <option value="other" <?php if($row->gender=="other"){ echo 'selected';} ?>>Other</option>
                                  
                              </select>
                      </div> -->
                      <div class="form-group">
                                <label for="salary_year" >Salary Year</label>
                                <input type="text" class="form-control" id="salary_year" value="<?php echo $row->salary_year; ?>" name="salary_year" tabindex="3" placeholder="" required>                                          
                        </div>
                            </div>
                              
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="basic_salary" > Basic Salary</label>
                                  <input type="text" class="form-control" id="basic_salary" value="<?php echo $row->basic_salary; ?>" name="basic_salary" tabindex="5" placeholder="">                                      
                                      
                          </div>
                            </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="leaves" >leaves</label>
                                <input type="text" class="form-control" id="leaves" value="<?php echo $row->leaves; ?>" name="leaves" tabindex="6" placeholder="">                                      
                                    
                        </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="d_leave_amount" > Detection Leave Amount</label>
                              <input type="text" class="form-control" id="d_leave_amount" value="<?php echo $row->d_leave_amount; ?>" name="d_leave_amount" tabindex="7" placeholder="">                                          
                      </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="a_lunch" >  Allowance lunch</label>
                              <input type="text" class="form-control" id="a_lunch" value="<?php echo $row->a_lunch; ?>" name="a_lunch" tabindex="8" placeholder="">                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="free_kids"> Kids Fee </label>
    
                             <input type="text" class="form-control" id="free_kids"
                              value="<?php echo $row->free_kids; ?>" name="free_kids" tabindex="9" placeholder="" required>
                         </div>
                          </div>
                          <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="jouning_date"> Jouning Date </label>
    
                             <input type="date" class="form-control" id="jouning_date" value="<?php echo $jouning_date; ?>" name="jouning_date" tabindex="10" placeholder="" required>
                         </div>
                          </div> -->

                          <!-- <div class="col-lg-3  col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="campus_type" class="form-label ">Campus </label>
                        <select class="form-select form-control" id="campus_type" tabindex="11" name="campus" required>  
                        <?php foreach($campus_type as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if($data->id==$row->campus){ echo "selected";} ?>><?php echo $data->campus_type; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                    </div>
                            </div>
                            <div class="col-lg-3  col-md-6 col-sm-6">
                                <div class="form-group">
                                        <label for="employel_type" > Employee Type</label>
                                        <select class="form-select form-control" id="employel_type" tabindex="12" name="employel_type" placeholder="" required>                                        
                                        <?php foreach($employel_type as $data){ ?> 
                          <option value="<?php echo $data->employel_type; ?>" <?php if($data->id==$row->employel_type){ echo "selected";} ?>><?php echo $data->employel_type; ?>
                        </option>
                            <?php  }?>  
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3  col-md-6 col-sm-6">
                                    <div class="form-group">
                                            <label for="department" > Department</label>
                                            <select class="form-select form-control" id="department" tabindex="13" name="department" placeholder="" required>                                        
                                            <?php foreach($department as $data){ ?> 
                          <option value="<?php echo $data->department; ?>" <?php if($data->id==$row->department){ echo "selected";} ?>><?php echo $data->department; ?>
                        </option>
                            <?php  }?>  
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3  col-md-6 col-sm-6">
                                        <div class="form-group">
                                                <label for="shift" > Shift</label>
                                                <select class="form-select form-control" id="shift" tabindex="14"  name="shift" placeholder="">                                        
                                                                                       
                                                    <option value="Morning"  <?php if($row->shift=="Morning"){ echo 'selected';} ?>>Morning</option>
                                                    <option value="Evening" <?php if($row->shift=="Evening"){ echo 'selected';} ?>>Evening</option>
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div> -->

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="d_income_tax" > Deduction Income Tax </label>
                              <input type="text" class="form-control" id="d_income_tax"  value="<?php echo $row->d_income_tax; ?>" name="d_income_tax" tabindex="15" placeholder="">                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="d_security" > Deduction Security  </label>
                              <input type="text" class="form-control" id="d_security" value="<?php echo $row->d_security; ?>" name="d_security" tabindex="16" placeholder="">                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="campus" > campus </label>
                              <input type="text" class="form-control" id="campus" value="<?php echo $row->campus; ?>" name="campus" tabindex="17" placeholder="">                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="other_allowance" >Other Allowance </label>
                              <input type="text" class="form-control" id="other_allowance" value="<?php echo $row->other_allowance; ?>" name="other_allowance" tabindex="18" placeholder="">                                      
                                  
                      </div>
                        </div>
                            
                        
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="d_provident_funds" > Deduction Provident Funds </label>
                                  <input type="text" class="form-control" id="d_provident_funds" value="<?php echo $row->d_provident_funds; ?>" name="d_provident_funds" tabindex="20" placeholder="">                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="net_salary" >Net Salary</label>
                                  <input type="text" class="form-control" id="net_salary" value="<?php echo $row->net_salary; ?>" name="net_salary" tabindex="21" placeholder="">                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="installment_no" > Installment  No</label>
                                  <input type="text" class="form-control" id="installment_no" value="<?php echo $row->installment_no; ?>" name="installment_no" tabindex="22" placeholder="">                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="d_loan" > Deduction Loan </label>
                                  <input type="text" class="form-control" id="d_loan" value="<?php echo $row->d_loan; ?>" name="d_loan" tabindex="23" placeholder="">                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="remarks" > Remarks </label>
                                  <input type="text" class="form-control" id="remarks"  value="<?php echo $row->remarks; ?>" name="remarks" tabindex="24" placeholder="">                                      
                                      
                          </div>
                            </div>

                            </div>

                              <div class="text-center mt-5">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="44"/>

                              

                              </div>
                              </div>

                <!-- /.card-body -->
            </form>
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>