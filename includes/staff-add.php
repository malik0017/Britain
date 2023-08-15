<?php
$max_id = $conf->single(STAFF, 'MAX(id) as max_id ');
// echo "=====".$max_id;
if (isset($_POST['submit'])) {
  $cnic = $_POST['cnic'];

  function validate_cnic_number($cnic)
  {
    // Define a regular expression pattern to match a CNIC number
    $pattern = "/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/";

    // Use preg_match to check if the CNIC number matches the pattern
    if (preg_match($pattern, $cnic)) {
      return true; // Valid CNIC number
    } else {
      return false; // Invalid CNIC number
    }
  }

  if (validate_cnic_number($cnic)) {
    // echo "Valid CNIC number";
  } else {
    // echo "Invalid CNIC number";
  }
  $employel_level = ($_POST['employel_level']);
  $employel_id =  $max_id->max_id + 1;

  $employel_name = ($_POST['employel_name']);
  $gender = ($_POST['gender']);
  $father_name = ($_POST['father_name']);
  $father_contact = ($_POST['father_contact']);
  $spouse_name = ($_POST['spouse_name']);
  $spouse_contact = ($_POST['spouse_contact']);
  $date_birth = ($_POST['date_birth']);
  $jouning_date = ($_POST['jouning_date']);
  $campus = ($_POST['campus']);
  $employel_type = ($_POST['employel_type']);
  $department = ($_POST['department']);
  $shift = ($_POST['shift']);
  // $cnic = ($_POST[ 'cnic' ]);
  $contact = ($_POST['contact']);
  $address = ($_POST['address']);
  $city = ($_POST['city']);
  $salary_type = ($_POST['salary_type']);
  $basic_salary = ($_POST['basic_salary']);
  $account_no = ($_POST['account_no']);
  $ded_ration = ($_POST['ded_ration']);
  $travelling_allowane = ($_POST['travelling_allowane']);
  $lunch_allowance = ($_POST['lunch_allowance']);
  $other_allowance = ($_POST['other_allowance']);
  $fund_duction = ($_POST['fund_duction']);
  $bank_account = ($_POST['bank_account']);
  $grace_time = ($_POST['grace_time']);
  $employel_email = ($_POST['employel_email']);
  $remarks = ($_POST['remarks']);
  $experience = ($_POST['experience']);
  $organization = ($_POST['organization']);
  $total_year = ($_POST['total_year']);
  $total_months = ($_POST['total_months']);
  $designation = ($_POST['designation']);
  $starting_salary = ($_POST['starting_salary']);




  $employel_image = ($_POST['employel_image']);


  //Image upload
  $site_favicon = $_FILES["employel_image"]["name"];

  if (!empty($site_favicon)) {
    $site_logo_check = $conf->image_upload_check('employel_image');
    if ($site_logo_check != "OK") {
      $error = $site_logo_check;
    }
  }

  //  echo "///////////////".$site_favicon;
  move_uploaded_file($_FILES["employel_image"]["tmp_name"], "upload/student/" . $_FILES["employel_image"]["name"]);
  $employel_image = $_FILES["employel_image"]["name"];
  // echo "===============".$employel_image ;






  $last_qualification = ($_POST['last_qualification']);
  $institute = ($_POST['institute']);
  $passing_year = ($_POST['passing_year']);
  $appointmate_class = ($_POST['appointmate_class']);
  $confirmation_date = ($_POST['confirmation_date']);
  $transfer_bank = ($_POST['transfer_bank']);







  $val->name('Employel Level')->value($employel_level)->pattern('text')->required();
  $val->name('Shift ')->value($shift)->pattern('text')->required();

  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {
    $data_post = array(
      'employel_level' => $employel_level,
      'employel_id' => $employel_id,
      'employel_name' => $employel_name,
      'gender' => $gender,
      'father_name' => $father_name,
      'father_contact' => $father_contact,
      'spouse_name' => $spouse_name,
      'spouse_contact' => $spouse_contact,
      'date_birth' => $date_birth,
      'jouning_date' => $jouning_date,
      'campus' => $campus,
      'employel_type' => $employel_type,
      'department' => $department,
      'shift' => $shift,
      'cnic' => $cnic,
      'contact' => $contact,
      'address' => $address,
      'city' => $city,
      'salary_type' => $salary_type,
      'basic_salary' => $basic_salary,
      'account_no' => $account_no,
      'ded_ration' => $ded_ration,
      'travelling_allowane' => $travelling_allowane,
      'lunch_allowance' => $lunch_allowance,
      'other_allowance' => $other_allowance,
      'fund_duction' => $fund_duction,
      'bank_account' => $bank_account,
      'grace_time' => $grace_time,
      'employel_email' => $employel_email,
      'remarks' => $remarks,
      'experience' => $experience,
      'organization' => $organization,
      'total_year' => $total_year,
      'total_months' => $total_months,
      'designation' => $designation,
      'starting_salary' => $starting_salary,
      'employel_image' => $employel_image,
      'last_qualification' => $last_qualification,
      'institute' => $institute,
      'passing_year' => $passing_year,
      'appointmate_class' => $appointmate_class,
      'confirmation_date' => $confirmation_date,
      'transfer_bank' => $transfer_bank,

      'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, STAFF);
    print_r($recodes);
    echo "wqqqqqqqqqqqqqq" . $recodes;
    if ($recodes == true) {
      $success = "Data <strong>Added</strong> Successfully";
      //$gen->redirecttime( 'class', '2000' );
    }
  }
}
$employel_level = $conf->fetchall(EMPLOYELEVEL . " WHERE is_deleted=0");
$employel_type = $conf->fetchall(EMPLOYETYE . " WHERE is_deleted=0");
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$department = $conf->fetchall(DEPARTMENT . " WHERE is_deleted=0");
$salary_type = $conf->fetchall(SALARY . " WHERE is_deleted=0");
$max_id = $conf->single(STAFF, 'MAX(id) as max_id ');
// $section_title=$conf->fetchall( SECTIONtbl . " WHERE is_deleted=0" );
// $routes=$conf->fetchall( ROUTE . " WHERE is_deleted=0" );

?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="employel_level"> Employee Level</label>
                      <select class="form-select form-control" id="employel_level" tabindex="1" name="employel_level" placeholder="">
                        <?php foreach ($employel_level as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->employel_level; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="employel_id"> Employee id</label>
                      <input type="text" class="form-control" id="employel_id" name="employel_id" tabindex="2" placeholder="" readonly value="<?php echo $max_id->max_id + 1; ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="employel_name"> Employee Name</label>
                      <input type="text" class="form-control" id="employel_name" name="employel_name" tabindex="3" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="gender"> Gender </label>
                      <select class="form-select form-control" id="gender" tabindex="4" name="gender" placeholder="">
                        <!-- <option selected></option>                                     -->
                        <option value="Male">Male</option>
                        <option value="Female"> Female </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="father_name"> Father Name</label>
                      <input type="text" class="form-control" id="father_name" name="father_name" tabindex="5" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="father_contact">Father Contact</label>
                      <input type="text" class="form-control" id="father_contact" name="father_contact" tabindex="6" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="spouse_name"> Spouse Name</label>
                      <input type="text" class="form-control" id="spouse_name" name="spouse_name" tabindex="7" placeholder="">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="spouse_contact"> Spouse Contact</label>
                      <input type="text" class="form-control" id="spouse_contact" name="spouse_contact" tabindex="8" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="date_birth"> Date Of Birth </label>

                      <input type="date" class="form-control" id="date_birth" name="date_birth" tabindex="9" placeholder="">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="jouning_date"> Jouning Date </label>

                      <input type="date" class="form-control" id="jouning_date" name="jouning_date" tabindex="10" placeholder="">
                    </div>
                  </div>

                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="campus"> Campus </label>
                      <select class="form-select form-control" id="campus" tabindex="11" name="campus" placeholder="">
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="employel_type"> Employee Type</label>
                      <select class="form-select form-control allowance" id="employel_type" tabindex="12" name="employel_type" placeholder="" onchange="allowance(this.value);">
                        <?php foreach ($employel_type as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->employel_type; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="department"> Department</label>
                      <select class="form-select form-control" id="department" tabindex="13" name="department" placeholder="">
                        <?php foreach ($department as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->department; ?></option>
                        <?php  } ?>


                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="shift"> Shift</label>
                      <select class="form-select form-control" id="shift" tabindex="14" name="shift" placeholder="">
                        <!-- <option selected>Select the Categories</option>                                     -->
                        <option value="Morning">Morning</option>
                        <option value="Evening">Evening</option>


                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="cnic">CNIC</label>
                      <input type="text" class="form-control" id="cnic" name="cnic" tabindex="15" placeholder="">
                      <p id="cnicError" style="color: red;"></p>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="contact"> Contact </label>
                      <input type="text" class="form-control" id="contact" name="contact" tabindex="16" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="address"> Address </label>
                      <input type="text" class="form-control" id="address" name="address" tabindex="17" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="city"> City </label>
                      <input type="text" class="form-control" id="city" name="city" tabindex="18" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="salary_type"> Salary Type</label>
                      <select class="form-select form-control" id="salary_type" tabindex="19" name="salary_type" placeholder="">
                        <?php foreach ($salary_type as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->salary_type; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="basic_salary"> Basic Salary </label>
                      <input type="text" class="form-control" id="basic_salary" name="basic_salary" tabindex="20" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="account_no"> Account No </label>
                      <input type="text" class="form-control" id="account_no" name="account_no" tabindex="21" placeholder="">

                    </div>
                  </div>

                  <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="ded_ration" > Ded.Ratio </label>
                                  <input type="text" class="form-control" id="ded_ration" name="ded_ration" tabindex="22" placeholder="" readonly required>                                      
                                      
                          </div>
                            </div> -->

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="travelling_allowane"> Travelling Allowane </label>
                      <input type="text" class="form-control" id="travelling_allowane" name="travelling_allowane" tabindex="23" placeholder="">

                    </div>
                  </div>
                  <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="lunch_allowance" > Lunch Allowance </label>
                                  <input type="text" class="form-control" id="lunch_allowance" name="lunch_allowance" tabindex="24" placeholder="" readonly="readonly" required>                                      
                                      
                          </div>
                            </div> -->

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="other_allowance"> Other Allowance </label>
                      <input type="text" class="form-control" id="other_allowance" name="other_allowance" tabindex="25" placeholder="">

                    </div>
                  </div>
                  <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="fund_duction" > P.Fund Deduction </label>
                                  <input type="text" class="form-control" id="fund_duction" name="fund_duction" tabindex="26" placeholder="" readonly required>                                      
                                      
                          </div>
                            </div> -->
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="bank_account"> Bank Account </label>
                      <input type="text" class="form-control" id="bank_account" name="bank_account" tabindex="27" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for=" grace_time"> Grace Time </label>
                      <input type="text" class="form-control" id="grace_time" name="grace_time" tabindex="28" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="employel_email"> Employee Email </label>
                      <input type="email" class="form-control" id="employel_email" name="employel_email" tabindex="29" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="remarks"> Remarks </label>
                      <input type="text" class="form-control" id="remarks" name="remarks" tabindex="30" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="experience"> Experience </label>
                      <input type="text" class="form-control" id="experience" name="experience" tabindex="31" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="organization"> Organization </label>
                      <input type="text" class="form-control" id="organization" name="organization" tabindex="32" placeholder="">

                    </div>
                  </div>


                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="total_year"> Total Year </label>
                      <input type="text" class="form-control" id="total_year" name="total_year" tabindex="33" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="total_months"> Total Months </label>
                      <input type="text" class="form-control" id="total_months" name="total_months" tabindex="34" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="designation"> Designation </label>
                      <input type="text" class="form-control" id="designation" name="designation" tabindex="35" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="starting_salary"> Starting salary </label>
                      <input type="text" class="form-control" id="starting_salary" name="starting_salary" tabindex="36" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                    <div class="form-group">
                      <label for="employel_image" class="form-label">Employel Image </label>
                      <input class="form-control" type="file" id="employel_image" name="employel_image" tabindex="37">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="last_qualification"> Last Qualification </label>
                      <input type="text" class="form-control" id="last_qualification" name="last_qualification" tabindex="38" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="institute"> Institute </label>
                      <input type="text" class="form-control" id="institute" name="institute" tabindex="39" placeholder="">

                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="passing_year"> Passing Year </label>
                      <input type="text" class="form-control" id="passing_year" name="passing_year" tabindex="40" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="appointmate_class"> Appoitment For Class </label>
                      <input type="text" class="form-control" id="appointmate_class" name="appointmate_class" tabindex="41" placeholder="">

                    </div>
                  </div>

                  <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="confirmation_date"> Confirmation Date  </label>
        
                                 <input type="date" class="form-control" id="confirmation_date" name="confirmation_date" tabindex="42" placeholder="" required>
                             </div>
                              </div> -->
                  <div class="col-lg-3 col-md-4 col-sm-6  mt-4">
                    <div class="form-check ">
                      <input type="checkbox" name="transfer_bank" value="1" id="transfer_bank" tabindex="43">
                      <label class="form-check-label font-weight-bold  ml-2" for="transfer_bank"> Transfer to Bank </label>
                    </div>
                  </div>

                </div>
                <div class="text-center mt-5">
                  <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="44" />



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