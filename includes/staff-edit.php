<?php
$staff_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $employel_level = ($_POST[ 'employel_level' ]);
  $employel_id = ($_POST[ 'employel_id' ]);
  $employel_name = ($_POST[ 'employel_name' ]);
  $gender = ($_POST[ 'gender' ]);
  $father_name = ($_POST[ 'father_name' ]);
  $father_contact = ($_POST[ 'father_contact' ]);
  $spouse_name = ($_POST[ 'spouse_name' ]);
  $spouse_contact = ($_POST[ 'spouse_contact' ]);
  $date_birth = ($_POST[ 'date_birth' ]);
  $jouning_date = ($_POST[ 'jouning_date' ]);
  $campus = ($_POST[ 'campus' ]);


  $employel_type = ($_POST[ 'employel_type' ]);
  $department = ($_POST[ 'department' ]);
  $shift = ($_POST[ 'shift' ]);
  $cnic = ($_POST[ 'cnic' ]);
  $contact = ($_POST[ 'contact' ]);
  $address = ($_POST[ 'address' ]);
  $city = ($_POST[ 'city' ]);
  $salary_type = ($_POST[ 'salary_type' ]);
 $basic_salary = ($_POST[ 'basic_salary' ]);
 $account_no = ($_POST[ 'account_no' ]);
  $ded_ration = ($_POST[ 'ded_ration' ]);
  $travelling_allowane = ($_POST[ 'travelling_allowane' ]);
  $lunch_allowance = ($_POST[ 'lunch_allowance' ]);
  $other_allowance = ($_POST[ 'other_allowance' ]);
  $fund_duction = ($_POST[ 'fund_duction' ]);
  $bank_account = ($_POST[ 'bank_account' ]);
  $grace_time = ($_POST[ 'grace_time' ]);
  $employel_email = ($_POST[ 'employel_email' ]);
  $remarks = ($_POST[ 'remarks' ]);
  $experience = ($_POST[ 'experience' ]);
  $organization = ($_POST[ 'organization' ]);
  $total_year = ($_POST[ 'total_year' ]);
  $total_months = ($_POST[ 'total_months' ]);
  $designation = ($_POST[ 'designation' ]);
  $starting_salary = ($_POST[ 'starting_salary' ]);
  $employel_image = ($_POST[ 'employel_image' ]);
  $last_qualification = ($_POST[ 'last_qualification' ]);
  $institute = ($_POST[ 'institute' ]);
  $passing_year = ($_POST[ 'passing_year' ]);
  $appointmate_class = ($_POST[ 'appointmate_class' ]);
  $confirmation_date = ($_POST[ 'confirmation_date' ]);
  $transfer_bank = ($_POST[ 'transfer_bank' ]);

  $val->name('Employel Level')->value($employel_level)->pattern('text')->required();
  $val->name('Shift ')->value($shift)->pattern('text')->required();


  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	
  if ( empty( $error ) ) {

    $table = STAFF . " set `employel_level`='" . $employel_level . "', `employel_id`='" . $employel_id . "', `employel_name`='" . $employel_name . "',
     `gender`='" . $gender . "', `father_name`='" . $father_name . "', `father_contact`='" . $father_contact . "', `spouse_name`='" . $spouse_name . "',
    `spouse_contact`='" . $spouse_contact . "', `date_birth`='" . $date_birth . "', `jouning_date`='" . $jouning_date . "', `campus`= '" .$campus."', `employel_type`='" . $employel_type . "', `department`='" . $department . "', `shift`='" . $shift . "', `cnic`='" . $cnic . "', 
    `contact`='" . $contact . "', `address`='" . $address . "', `city`='" . $city . "', `salary_type`='" . $salary_type . "', `basic_salary`='" . $basic_salary . "',
    `account_no`='" . $account_no . "', `ded_ration`='" . $ded_ration . "', `travelling_allowane`='" . $travelling_allowane . "'
  , `lunch_allowance`='" . $lunch_allowance . "', `other_allowance`='" . $other_allowance . "', `fund_duction`='" . $fund_duction . "', `bank_account`='". $bank_account . "',
  `grace_time`='" . $grace_time . "', `employel_email`='" . $employel_email . "', `remarks`='" . $remarks . "', `experience`='" . $experience . "'
  ,`organization`='" . $organization ."', `total_year`='" . $total_year . "', `total_months`='" . $total_months . "', `designation`='". $designation . "'
  , `starting_salary`='" . $starting_salary . "', `employel_image`='" . $employel_image . "', `last_qualification`='" . $last_qualification . "'
  , `institute`='" . $institute . "', `passing_year`='" . $passing_year . "', `appointmate_class`='" . $appointmate_class . "'
  , `confirmation_date`='" . $confirmation_date . "', `transfer_bank`='" . $transfer_bank ."' where id='" . $staff_id . "'";

		$recodes = $conf->updateValue( $table );

		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";

			// $gen->redirecttime( 'staff-view.php', '2000' );
		} 
    else {
			$error = "Staff Not Updated";
		}
    
		
	}
}
$table_fetch = STAFF . " where id='" . $staff_id . "'";
$row = $conf->singlev( $table_fetch );
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
                                    <label for="employel_level" > Employee Level</label>
                                    <select class="form-select form-control" id="employel_level" tabindex="1"   name="employel_level" placeholder="" required>                                        
                                    <?php foreach($employel_level as $data){ ?> 
                          <option value="<?php echo $data->employel_level; ?>" <?php if($data->id==$row->employel_level){ echo "selected";} ?>><?php echo $data->employel_level; ?>
                        </option>
                            <?php  }?>  
                                    </select>
                                </div>
                            </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="employel_id"> Employee id</label>
                                <input type="text" class="form-control" id="employel_id" value="<?php echo $row->id; ?>" name="employel_id" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="employel_name" > Employee Name</label>
                                <input type="text" class="form-control" id="employel_name" value="<?php echo $row->employel_name; ?>" name="employel_name" tabindex="3" placeholder="" required>                                          
                        </div>
                          </div>
                          <div class="col-lg-3  col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="gender" class="form-label ">Gender</label>
                          <select class="form-select form-control" id="gender" tabindex="4" value="<?php echo $row->gender; ?>" name="gender" required>                                        
                                  <option value="male" <?php if($row->gender=="male"){ echo 'selected';} ?>>Male</option>
                                  <option value="female" <?php if($row->gender=="female"){ echo 'selected';} ?>>Female</option>
                                  <option value="other" <?php if($row->gender=="other"){ echo 'selected';} ?>>Other</option>
                                  
                              </select>
                      </div>
                            </div>
                              
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="father_name" > Father Name</label>
                                  <input type="text" class="form-control" id="father_name" value="<?php echo $row->father_name; ?>" name="father_name" tabindex="5" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="father_contact" >Father Contact</label>
                                <input type="text" class="form-control" id="father_contact" value="<?php echo $row->father_contact; ?>" name="father_contact" tabindex="6" placeholder="" required>                                      
                                    
                        </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="spouse_name" > Spouse Name</label>
                              <input type="text" class="form-control" id="spouse_name" value="<?php echo $row->spouse_name; ?>" name="spouse_name" tabindex="7" placeholder="" required>                                          
                      </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="spouse_contact" > Spouse Contact</label>
                              <input type="text" class="form-control" id="spouse_contact" value="<?php echo $row->spouse_contact; ?>" name="spouse_contact" tabindex="8" placeholder="" required>                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="date_birth"> Date Of Birth </label>
    
                             <input type="date" class="form-control" id="date_birth" value="<?php echo $row->date_birth; ?>" name="date_birth" tabindex="9" placeholder="" required>
                         </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="jouning_date"> Jouning Date </label>
    
                             <input type="date" class="form-control" id="jouning_date" value="<?php echo $row->jouning_date; ?>" name="jouning_date" tabindex="10" placeholder="" required>
                         </div>
                          </div>

                          <div class="col-lg-3  col-md-6 col-sm-6">
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
                                                <select class="form-select form-control" id="shift" tabindex="14"  name="shift" placeholder="" required>                                        
                                                                                       
                                                    <option value="Morning"  <?php if($row->shift=="Morning"){ echo 'selected';} ?>>Morning</option>
                                                    <option value="Evening" <?php if($row->shift=="Evening"){ echo 'selected';} ?>>Evening</option>
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="cnic" > CNIC </label>
                              <input type="text" class="form-control" id="cnic"  value="<?php echo $row->cnic; ?>" name="cnic" tabindex="15" placeholder="" required>                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="contact" > Contact  </label>
                              <input type="text" class="form-control" id="contact" value="<?php echo $row->contact; ?>" name="contact" tabindex="16" placeholder="" required>                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="address" > Address </label>
                              <input type="text" class="form-control" id="address" value="<?php echo $row->address; ?>" name="address" tabindex="17" placeholder="" required>                                      
                                  
                      </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="city" > City </label>
                              <input type="text" class="form-control" id="city" value="<?php echo $row->city; ?>" name="city" tabindex="18" placeholder="" required>                                      
                                  
                      </div>
                        </div>
                            
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="form-group">
                                    <label for="salary_type" > Salary Type</label>
                                    <select class="form-select form-control" id="salary_type" tabindex="19"  name="salary_type" placeholder="" required>                                        
                                    <?php foreach($salary_type as $data){ ?> 
                          <option value="<?php echo $data->salary_type; ?>" <?php if($data->id==$row->salary_type){ echo "selected";} ?>><?php echo $data->salary_type; ?>
                        </option>
                            <?php  }?>  
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="basic_salary" > Basic Salary </label>
                                  <input type="text" class="form-control" id="basic_salary" value="<?php echo $row->basic_salary; ?>" name="basic_salary" tabindex="20" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="account_no" > Account No </label>
                                  <input type="text" class="form-control" id="account_no" value="<?php echo $row->account_no; ?>" name="account_no" tabindex="21" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="ded_ration" > Ded.Ratio </label>
                                  <input type="text" class="form-control" id="ded_ration" value="<?php echo $row->ded_ration; ?>" name="ded_ration" tabindex="22" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="travelling_allowane" > Travelling Allowane </label>
                                  <input type="text" class="form-control" id="travelling_allowane" value="<?php echo $row->travelling_allowane; ?>" name="travelling_allowane" tabindex="23" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="lunch_allowance" > Lunch Allowance </label>
                                  <input type="text" class="form-control" id="lunch_allowance"  value="<?php echo $row->lunch_allowance; ?>" name="lunch_allowance" tabindex="24" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="other_allowance" > Other Allowance </label>
                                  <input type="text" class="form-control" id="other_allowance"  value="<?php echo $row->other_allowance; ?>" name="other_allowance" tabindex="25" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="fund_duction" > P.Fund Deduction </label>
                                  <input type="text" class="form-control" id="fund_duction" value="<?php echo $row->fund_duction; ?>" name="fund_duction" tabindex="26" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="bank_account" > Bank Account </label>
                                  <input type="text" class="form-control" id="bank_account" value="<?php echo $row->bank_account; ?>" name="bank_account" tabindex="27" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for=" grace_time" > Grace Time </label>
                                  <input type="text" class="form-control" id="grace_time"  value="<?php echo $row->grace_time; ?>" name="grace_time" tabindex="28" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="employel_email" > Employee Email </label>
                                  <input type="text" class="form-control" id="employel_email" value="<?php echo $row->employel_email; ?>" name="employel_email" tabindex="29" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="remarks" > Remarks </label>
                                  <input type="text" class="form-control" id="remarks" value="<?php echo $row->remarks; ?>" name="remarks" tabindex="30" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="experience" > Experience </label>
                                  <input type="text" class="form-control" id="experience" value="<?php echo $row->experience; ?>" name="experience" tabindex="31" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="organization" > Organization </label>
                                  <input type="text" class="form-control" id="organization"  value="<?php echo $row->organization; ?>" name="organization" tabindex="32" placeholder="" required>                                      
                                      
                          </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="total_year" > Total Year </label>
                                  <input type="text" class="form-control" id="total_year" value="<?php echo $row->total_year; ?>" name="total_year" tabindex="33" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="total_months" > Total Months </label>
                                  <input type="text" class="form-control" id="total_months" value="<?php echo $row->total_months; ?>" name="total_months" tabindex="34" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="designation" > Designation </label>
                                  <input type="text" class="form-control" id="designation" value="<?php echo $row->designation; ?>" name="designation" tabindex="35" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="starting_salary" > Starting salary </label>
                                  <input type="text" class="form-control" id="starting_salary" value="<?php echo $row->starting_salary; ?>" name="starting_salary" tabindex="36" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                <div class="form-group">
                                <label for="employel_image" class="form-label">Employee Image </label>
                                <input class="form-control" type="file" id="employel_image"  value="<?php echo $row->employel_image; ?>" name="employel_image" tabindex="37">
                                </div>
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="last_qualification" > Last Qualification </label>
                                  <input type="text" class="form-control" id="last_qualification" value="<?php echo $row->last_qualification; ?>" name="last_qualification" tabindex="38" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="institute" > Institute </label>
                                  <input type="text" class="form-control" id="institute" value="<?php echo $row->institute; ?>" name="institute" tabindex="39" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="passing_year" > Passing Year </label>
                                  <input type="text" class="form-control" id="passing_year"  value="<?php echo $row->passing_year; ?>" name="passing_year" tabindex="40" placeholder="" required>                                      
                                      
                          </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="appointmate_class" > Appoitment For Class </label>
                                  <input type="text" class="form-control" id="appointmate_class" value="<?php echo $row->appointmate_class; ?>" name="appointmate_class" tabindex="41" placeholder="" required>                                      
                                      
                          </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="confirmation_date"> Confirmation Date  </label>
        
                                 <input type="date" class="form-control" id="confirmation_date" value="<?php echo $row->confirmation_date; ?>" name="confirmation_date" tabindex="42" placeholder="" required>
                             </div>
                              </div>
                            <div class="col-lg-3 col-md-4 col-sm-6  mt-4">
                                <div class="form-check ">
                                  <input type="checkbox" value="<?php echo $row->transfer_bank; ?>" name="transfer_bank" value="1" id="transfer_bank" tabindex="43">
                                  <label class="form-check-label font-weight-bold  ml-2" for="transfer_bank" > Transfer to Bank </label>
                                </div>
                                </div>
                                                      
                              </div >
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