<?php
$student_id =  $_REQUEST['CD'];

if (isset($_POST['submit'])) {

  $addmission_no = ($_POST['addmission_no']);
  $b_form = ($_POST['b_form']);
  $name = ($_POST['name']);
  $session_name = ($_POST['session_name']);

  $gender = ($_POST['gender']);
  $date_birth = ($_POST['date_birth']);
  $campus = ($_POST['campus']);
  $place_birth = ($_POST['place_birth']);
  $class = ($_POST['class']);
  $nationality = ($_POST['nationality']);
  $religion = ($_POST['religion']);
  $section_name = ($_POST['section_name']);

  $admission_date = ($_POST['admission_date']);
  $last_school = ($_POST['last_school']);
  $routes = ($_POST['routes']);
  // $student_image = ($_POST[ 'student_image' ]);


  $site_favicon = $_FILES[ "image" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'image' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "asssss".$site_favicon;
	move_uploaded_file( $_FILES[ "image" ][ "tmp_name" ], "upload/student/" . $_FILES[ "image" ][ "name" ] );
	$path = $_FILES[ "image" ][ "name" ];
  // echo "=====".$path;


  $site_favicon = $_FILES[ "month_image" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'month_image' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "asssss".$site_favicon;
	move_uploaded_file( $_FILES[ "month_image" ][ "tmp_name" ], "upload/student/" . $_FILES[ "month_image" ][ "name" ] );
	$month_image = $_FILES[ "month_image" ][ "name" ];


  $site_favicon = $_FILES[ "fee_image" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'fee_image' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "asssss".$site_favicon;
	move_uploaded_file( $_FILES[ "fee_image" ][ "tmp_name" ], "upload/student/" . $_FILES[ "fee_image" ][ "name" ] );
	$fee_image = $_FILES[ "fee_image" ][ "name" ];

  $site_favicon = $_FILES[ "conession_form" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'conession_form' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  //  echo "tttttttttt".$site_favicon;
	move_uploaded_file( $_FILES[ "conession_form" ][ "tmp_name" ], "upload/student/" . $_FILES[ "conession_form" ][ "name" ] );
	$conession_form = $_FILES[ "conession_form" ][ "name" ];
//  echo "ali".$conession_form;




  

  $expiry_date = ($_POST['expiry_date']);
  $father_name = ($_POST['father_name']);
  $cnic = ($_POST['cnic']);
  $mother_name = ($_POST['mother_name']);
  $fathre_occupt = ($_POST['fathre_occupt']);
  $mother_occup = ($_POST['mother_occup']);
   $age = ($_POST[ 'age' ]);
  $app_user = ($_POST['app_user']);
  $password = ($_POST['password']);
  $gurdian_name = ($_POST['gurdian_name']);
  $gurdian = ($_POST['gurdian']);

  $address = ($_POST['address']);
  $home_address = ($_POST['home_address']);
  $office_address = ($_POST['office_address']);
  $land_number = ($_POST['land_number']);
  $mobile_number = ($_POST['mobile_number']);
  $emergency_phone = ($_POST['emergency_phone']);
  $guest = ($_POST['guest']);
  $email = ($_POST['email']);


  $std_id = $_POST['std_id'];
   $month_fee = ($_POST[ 'month_fee' ]);
   $student_free = ($_POST[ 'student_free' ]);
   $staff_id = ($_POST[ 'staff_id' ]);
   $staff_kid = ($_POST[ 'staff_kid' ]);
   $stationary = ($_POST[ 'stationary' ]);
  $admission_detail = ($_POST[ 'admission_detail' ]);
   $commitment = ($_POST[ 'commitment' ]);
   $reference = ($_POST[ 'reference' ]);
 


   //fee type detail
   $fee_type = ($_POST['fee_type']);
   $actual_fee = ($_POST['actual_fee']);
   $concession_fee = ($_POST['concession_fee']);
   $package_payable = ($_POST['package_payable']);


  $val->name('Addmission No')->value($addmission_no)->pattern('text')->required();
  $val->name('Name')->value($name)->pattern('text')->required();
  // $val->name('Session Name')->value($session_name)->pattern('number')->required();


  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }



  if (empty($error)) {

    $table = Student . " set `addmission_no`='" . $addmission_no . "', `b_form`='" . $b_form . "',`name`='" . $name . "',
     `session_name`='" . $session_name . "',
       `gender`='" . $gender . "', `date_birth`='" . $date_birth . "',`age`='" . $age . "', `campus`='" . $campus . "', `place_birth`='" . $place_birth . "',
      `class`='" . $class . "', `nationality`='" . $nationality . "', `religion`='" . $religion . "', `section_name`= '" . $section_name . "', `admission_date`= '" . $admission_date . "',
       `last_school`='" . $last_school . "', `cnic`='" . $cnic . "', 
      `routes`='" . $routes . "',  `image`='" . $image . "', 
      
      
      `expiry_date`='" . $expiry_date . "', `father_name`='" . $father_name . "', `cnic`='" . $cnic . "', `mother_name`='" . $mother_name . "',
 `app_user`='" . $app_user . "', `password`='" . $password . "'
    , `gurdian_name`='" . $gurdian_name . "', `gurdian`='" . $gurdian . "', `address`='" . $address . "', `home_address`='" . $home_address . "',
    `office_address`='" . $office_address . "', `land_number`='" . $land_number . "', `mobile_number`='" . $mobile_number . "',
     `emergency_phone`='" . $emergency_phone . "', `guest`='" . $guest . "', `email`='" . $email . "' where id='" . $student_id . "'";

    $recodes = $conf->updateValue($table);

//fee package 


  $table = STUDENTFEE . " set  `month_fee`='" . $month_fee . "', `month_image`='" . $month_image . "', `student_free`='" . $student_free . "', `fee_image`='" . $fee_image . "', `staff_kid`='" . $staff_kid . "', `staff_id`='" . $staff_id . "', `stationary`='" . $stationary . "', `admission_detail`='" . $admission_detail . "',  `commitment`='" . $commitment . "', `reference`='" . $reference . "', `conession_form`='" . $conession_form . "' where std_id='" . $student_id . "'";

  $recodes = $conf->updateValue($table);
 
  
  
  //student fee table entry
  
    
  for ($i = 0; $i < count($fee_type); $i++) {
  $table = STUDENTFEEDETAIL . " set  `fee_type`='" . $fee_type[$i]. "', `actual_fee`='" . $actual_fee[$i] . "', `concession_fee`='" . $concession_fee[$i] . "', `package_payable`='" .  $package_payable[$i] . "' where student_fee_id='" . $student_id . "'";

  $recodes = $conf->updateValue($table);

} 



 


    if ($recodes == true) {
      $success = "Record <strong>Updated</strong> Successfully";

      // $gen->redirecttime( 'student-view.php', '2000' );
    } else {
      $error = "Student Not Updated";
    }
}
}
$table_fetch = Student . " where id='" . $student_id . "'";
$row = $conf->singlev($table_fetch);
$table_fetch1= STUDENTFEE . " where std_id='" . $student_id . "'";
$stdfee= $conf->singlev($table_fetch1);





//-------Std session, campus, class

$std_session_id = 7;
$std_campus_id = 3;
$std_class_id = 10;










// $class=$conf->fetchall( CLASStbl . " WHERE is_deleted=0" );
$fee_type = $conf->fetchall(FEETYPE . " WHERE is_deleted=0");
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0 ORDER BY id DESC");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
$routes = $conf->fetchall(ROUTE . " WHERE is_deleted=0");
$actual_fee = $conf->fetchall(ACTUALFEE . " WHERE is_deleted=0");

$staffs = $conf->fetchall(STAFF . " WHERE is_deleted=0");

// $section=$conf->fetchall( SECTION );

// Student fee table form

$sql = "SELECT fd.id, fd.fee_default_pkg_id, fd.fee_type, fd.actual_fee, ft.fee_type as fee_head FROM 
`fee_default_package_detail` fd INNER JOIN fee_type ft ON ft.id = fd.fee_type 
WHERE fee_default_pkg_id = (SELECT id FROM `fee_default_package` WHERE `session_id` = 
'" . $std_session_id . "' AND `campus` = '" . $std_campus_id . "' AND `class`= '" . $std_class_id . "');";
$fee_type = $conf->QueryRun($sql);




?>


<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <form action="" method="POST">

            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="addmission_no">Admission Number</label>
                    <input type="text" class="form-control" id="addmission_no" value="<?php echo $row->addmission_no; ?>" name="addmission_no" tabindex="1" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="b_form">B-Form Number</label>
                    <input type="text" class="form-control" id="b_form" name="b_form" tabindex="2" value="<?php echo $row->b_form; ?>" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $row->name; ?>" name="name" tabindex="3" placeholder="" required>
                  </div>
                </div>
               
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                  <label for="session_name" class="form-label ">Session</label>
                    <select class="form-select form-control" id="session_name" tabindex="5" name="session_name" required>
                      <?php foreach ($session_year as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->session_name) {
                                                                              echo "selected";
                                                                            } ?>><?php echo $data->session_year; ?>
                        </option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="campus" class="form-label ">Campus</label>
                    <select class="form-select form-control campus" id="campus" tabindex="6" name="campus" required>
                      <?php foreach ($campus_name as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->campus) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $data->campus_name; ?>
                        </option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                
                  <div class="form-group">
                    <label for="class" class="form-label ">Class</label>
                    <select class="form-select form-control class" id="class" tabindex="7" name="class" required>
                      <?php foreach ($class_name as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->class) { echo "selected";  } ?>><?php echo $data->class_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-group">
                <label for="section_name" class="form-label ">Section</label>
                    <select class="form-select form-control" id="section_name" tabindex="8" name="section_name" required>
                      <?php foreach ($section_title as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->section_name) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $data->section_title; ?></option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="gender" class="form-label ">Gender</label>
                    <select class="form-select form-control" id="gender" tabindex="5" value="<?php echo $row->gender; ?>" name="gender" required>
                      <option value="male" <?php if ($row->gender == "male") {
                                              echo 'selected';
                                            } ?>>Male</option>
                      <option value="female" <?php if ($row->gender == "female") {
                                                echo 'selected';
                                              } ?>>Female</option>
                      <option value="other" <?php if ($row->gender == "other") {
                                              echo 'selected';
                                            } ?>>Other</option>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="admission_date">Date of Admission </label>

                    <input type="date" class="form-control" id="admission_date" value="<?php echo $row->admission_date; ?>" name="admission_date" tabindex="6" placeholder="" required>

                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="date_birth"> Date Of Birth </label>

                    <input type="date" class="form-control" id="date_birth" value="<?php echo $row->date_birth; ?>" name="date_birth" tabindex="7" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="age">Age </label>
                    <input type="text" class="form-control" id="age" value="<?php echo $row->age; ?>" name="age" tabindex="8" placeholder=""  readonly required>
                  </div>
                </div>
               
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="place_birth">Place Of Birth </label>
                    <input type="text" class="form-control" id="place_birth" value="<?php echo $row->place_birth; ?>" name="place_birth" tabindex="10" placeholder="" required>
                  </div>
                </div>
               
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" value="<?php echo $row->nationality; ?>" name="nationality" tabindex="12" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" value="<?php echo $row->religion; ?>" name="religion" tabindex="13" placeholder="" required>
                  </div>
                </div>
               
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="last_school"> Last School Attended </label>
                    <input type="text" class="form-control" id="last_school" value="<?php echo $row->last_school; ?>" name="last_school" tabindex="15" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="routes" class="form-label ">Routes</label>
                    <select class="form-select form-control" id="routes" tabindex="16" name="routes" required>
                      <?php foreach ($routes as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->routes) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $data->routes; ?></option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="image" class="form-label">Student Image </label>
                    <input class="form-control form-controll-style" type="file" id="image" value="<?php echo $row->image; ?>" name="image" tabindex="17" required>
                    <img src="upload/student/<?php echo $row->image; ?>" alt="" height="100" width="100"/>
                  </div>
                </div>
                <div id="expirydate" style="display:none;" class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>
                    <input type="date" class="form-control" id="expiry_date" value="<?php echo $row->expiry_date; ?>" name="expiry_date" tabindex="18" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                  <div class="form-check ">
                    <input type="checkbox" name="guest" id="guest" tabindex="19" value="<?php echo $data->id; ?>" <?php if ($data->guest==1) echo  "checked"; ?>>
                    <label class="form-check-label font-weight-bold  ml-2" for="guest"> Guest Adm </label>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="father_name"> Father Name </label>
                    <input type="text" class="form-control" id="father_name" value="<?php echo $row->father_name; ?>" name="father_name" tabindex="20" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="cnic">CNIC</label>
                    <input type="text" class="form-control" id="cnic" value="<?php echo $row->cnic; ?>" name="cnic" tabindex="21" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" class="form-control" id="mother_name" value="<?php echo $row->mother_name; ?>" name="mother_name" tabindex="22" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="fathre_occupt" class="form-label ">Fathre Occuption</label>
        <input type="text" class="form-control" id="fathre_occupt" value="<?php echo $row->fathre_occupt; ?>"
         name="fathre_occupt" tabindex="23" placeholder="" required>
                  
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="mother_occup" class="form-label ">Mother Occuption</label>
                    <input type="text" class="form-control" id="mother_occup" value="<?php echo $row->mother_occup; ?>"
         name="mother_occup" tabindex="24" placeholder="" required>
                   
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="app_user">App User Name</label>
                    <input type="text" class="form-control" id="app_user" value="<?php echo $row->app_user; ?>" name="app_user" tabindex="25" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="password">App Password</label>
                    <input type="password" class="form-control" id="password" value="<?php echo $row->password; ?>" name="password" tabindex="26" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="gurdian_name">Gurdian Name</label>
                    <input type="text" class="form-control" id="gurdian_name" value="<?php echo $row->gurdian_name; ?>" name="gurdian_name" tabindex="27" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="gurdian" class="form-label ">Gurdian Occuption</label>
                    <input type="text" class="form-control" id="gurdian" value="<?php echo $row->gurdian; ?>"
         name="gurdian" tabindex="28" placeholder="" required>
                   
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="address"> Perment Address </label>
                    <input type="text" class="form-control" id="address" value="<?php echo $row->address; ?>" name="address" tabindex="29" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="home_address"> Home Address </label>
                    <input type="text" class="form-control" id="home_address" value="<?php echo $row->home_address; ?>" name="home_address" tabindex="30" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="office_address"> Office Address </label>
                    <input type="text" class="form-control" id="office_address" value="<?php echo $row->office_address; ?>" name="office_address" tabindex="31" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="land_number">Land Line Number</label>
                    <input type="text" class="form-control" id="land_number" value="<?php echo $row->land_number; ?>" name="land_number" tabindex="32" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" value="<?php echo $row->mobile_number; ?>" name="mobile_number" tabindex="33" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="emergency_phone">Emergency Phone Number</label>
                    <input type="text" class="form-control" id="emergency_phone" value="<?php echo $row->emergency_phone; ?>" name="emergency_phone" tabindex="34" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="email">Email </label>
                    <input type="text" class="form-control" id="email" value="<?php echo $row->email; ?>" name="email" tabindex="35" placeholder="" required>
                  </div>
                </div>




                <div class="col-lg-12 ">
                  <div class="p-2  ">
                    <h3 class=" "> Fee Package</h3>
                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <label class="form-check-label font-weight-bold  ml-2" for="month_fee"> 1 Month Fee Plan: </label>
                    <input type="checkbox" name="month_fee" id="month_fee" tabindex="36" value="<?php echo $stdfee->id; ?>" <?php if ($stdfee->month_fee==1) echo  "checked"; ?>>

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <input type="file" name="month_image" id="month_image" tabindex="37">
                    <img src="upload/student/<?php echo $stdfee->month_image; ?>" alt="" height="100" width="100"/>

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <label class="form-check-label font-weight-bold  ml-2" for="student_free"> Student Free: </label>
                    <input type="checkbox" name="student_free" id="student_free" tabindex="38" value="<?php echo $stdfee->id; ?>" <?php if ($stdfee->student_free==1) echo  "checked"; ?>>

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <input type="file" name="fee_image" id="fee_image" value="<?php echo $stdfee->fee_image; ?>"  tabindex="39">
                    <img src="upload/student/<?php echo $stdfee->fee_image; ?>" alt="" height="100" width="100"/>


                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <label class="form-check-label font-weight-bold  ml-2" for="staff_kid"> Staff Kid: </label>
                    <input type="checkbox" name="staff_kid" id="staff_kid" tabindex="40" value="<?php echo $stdfee->id; ?>" <?php if ($stdfee->staff_kid==1) echo  "checked"; ?> >

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">

                    <label class="form-check-label font-weight-bold  ml-2" for="stationary"> Apply Stationary </label>
                    <input type="checkbox" name="stationary" id="stationary" tabindex="41" 
                    value="<?php echo $stdfee->id; ?>" <?php if ($stdfee->stationary==1) echo  "checked"; ?>>

                  </div>
                </div>
                <div id="staffkid" style="display:none;" class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="staff" class="form-label ">Staff</label>
                    <select class="form-select form-control" id="staff_id" tabindex="42" name="staff_id">

                      <?php foreach ($staffs as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->employel_name) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $data->employel_name; ?></option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="admission_detail">Admission Detail</label>
                    <input type="text" class="form-control" id="admission_detail" value="<?php echo $stdfee->admission_detail; ?>" name="admission_detail" tabindex="43" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="commitment">Commitment if any</label>
                    <input type="text" class="form-control" id="commitment"   value="<?php echo $stdfee->commitment; ?>" name="commitment" tabindex="44" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="reference">Reference</label>
                    <input type="text" class="form-control" id="reference"  value="<?php echo $stdfee->reference; ?>"  name="reference" tabindex="45" placeholder="">

                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="conession_form" class="form-label">Conession Form </label>
                    <input class="form-control form-controll-style" type="file"  value="<?php echo $stdfee->conession_form; ?>" id="conession_form" name="conession_form" tabindex="46">
                    <img src="upload/student/<?php echo $stdfee->conession_form; ?>" alt="" height="100" width="100"/>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12" id="feetablearea">
                  <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <p>Please select Session, Campus and Class to display fee</p>
                  </div>



                </div>

                
                
              </div>
              <div class="text-center mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="36" />
              </div>
            </div>

            <!-- /.card-body -->
          </form>



        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>