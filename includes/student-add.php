<?php


$admissionno = $conf->VoucherNo();
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
    echo "";
  } else {
    // echo "Invalid CNIC number";
  }



  $addmission_no = $conf->VoucherNo();
  // $addmission_no = ($_POST['addmission_no']);
  $b_form = ($_POST['b_form']);
  $name = ($_POST['name']);
  $session_name = ($_POST['session_name']);
  
  $gender = ($_POST['gender']);
  $date_birth = ($_POST['date_birth']);
  $age = ($_POST['age']);
  $campus = ($_POST['campus']);
  $place_birth = ($_POST['place_birth']);
  $class = ($_POST['class']);
  $nationality = ($_POST['nationality']);
  $religion = ($_POST['religion']);
  $section_name = ($_POST['section_name']);
  $admission_date = ($_POST['admission_date']);
  $last_school = ($_POST['last_school']);
  $routes = ($_POST['routes']);

  $expiry_date = ($_POST['expiry_date']);
  $father_name = ($_POST['father_name']);

  $cnic = $_POST['cnic'];

  $mother_name = ($_POST['mother_name']);
  $fathre_occupt = ($_POST['fathre_occupt']);
  $mother_occup = ($_POST['mother_occup']);

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
  
  
  
  //Image upload code
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


  // Sudent fee values add in this form
  $std_id = $_POST['std_id'];
  $month_fee = ($_POST['month_fee']);
  // $month_image = ($_POST['month_image']);


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

  
  $student_free = ($_POST['student_free']);
  // $fee_image = ($_POST['fee_image']);

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


  $staff_kid = ($_POST['staff_kid']);
  $staff_id = ($_POST['staff_id']);
  $stationary = ($_POST['stationary']);
  $admission_detail = ($_POST['admission_detail']);
  $commitment = ($_POST['commitment']);
  $reference = ($_POST['reference']);
  // $conession_form = ($_POST['conession_form']);

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

 
  $fee_type = ($_POST['fee_type']);
  $actual_fee = ($_POST['actual_fee']);
  $concession_fee = ($_POST['concession_fee']);
  $package_payable = ($_POST['package_payable']);




  // $month_fee = ($_POST[ 'month_fee' ])
  // ;$month_image = ($_POST[ 'month_image' ])
  // ;$student_fee = ($_POST[ 'student_fee' ]);
  // $fee_image = ($_POST[ 'fee_image' ]);
  // $staff_kid = ($_POST[ 'staff_kid' ]);
  
  // $stationary = ($_POST[ 'stationary' ]);
  // $admission_detail = ($_POST[ 'admission_detail' ]);
  // $commitment = ($_POST[ 'commitment' ]);
  // $reference = ($_POST[ 'reference' ]);
  // $conession_form = ($_POST[ 'conession_form' ]);
  // $fee_type = ($_POST[ 'fee_type' ]);
  // $actual_fee = ($_POST[ 'actual_fee' ]);
  // $concession_fee = ($_POST[ 'concession_fee' ]);


  //  $val->name('Addmission No')->value($addmission_no)->pattern('text')->required();
  //   $val->name('Name')->value($name)->pattern('text')->required();
  //   $val->name('Session Name')->value($session_name)->pattern('words')->required();


  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }
  // 'conession_form' => $conession_form, 
  if (empty($error)) {
    $data_post = array(
      'addmission_no' => $addmission_no, 'b_form' => $b_form, 'name' => $name, 'session_name' => $session_name,
      'gender' => $gender, 'date_birth' => $date_birth, 'age' => $age,
      'campus' => $campus, 'place_birth' => $place_birth, 'class' => $class, 'nationality' => $nationality, 'religion' => $religion,
      'section_name' => $section_name, 'admission_date' => $admission_date, 'last_school' => $last_school,   'routes' => $routes, 'image' => $path, 
      'expiry_date' => $expiry_date,
      'father_name' => $father_name, 'cnic' => $cnic, 'mother_name' => $mother_name, 'fathre_occupt' => $fathre_occupt, 'mother_occup' => $mother_occup,
      // 'age' => $age, 
      'app_user' => $app_user, 'password' => $addmission_no, 'gurdian_name' => $gurdian_name, 'gurdian' => $gurdian, 'address' => $address,
      'home_address' => $home_address, 'office_address' => $office_address, 'land_number' => $land_number, 'mobile_number' => $mobile_number,
      'emergency_phone' => $emergency_phone, 'email' => $email, 'guest' => $guest,


      'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    ); 
    $recodes = $conf->insert($data_post, Student);
    


    // 'conession_form' => $conession_form, 
    if (empty($error)) {
      $data_post = array(
        'std_id' => $recodes, 'month_fee' => $month_fee, 'month_image' => $month_image, 'student_free' => $student_free,
        'fee_image' => $fee_image, 'staff_kid' => $staff_kid,  'staff_id' => $staff_id, 'stationary' => $stationary, 'admission_detail' => $admission_detail,
        'commitment' => $commitment, 'reference' => $reference, 'conession_form' => $conession_form, 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
      );
      $recodesfee = $conf->insert($data_post, STUDENTFEE);

      

      //student fee table entry
      for ($i = 0; $i < count($fee_type); $i++) {
        $data_post = array(
          'student_fee_id' => $recodesfee,'std_id' => $recodes, 'fee_type' => $fee_type[$i],
          'actual_fee' => $actual_fee[$i], 'concession_fee' => $concession_fee[$i], 'package_payable' => $package_payable[$i],
          'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
        );
        $recodes2 = $conf->insert($data_post, STUDENTFEEDETAIL);
      }





      //student fee table entry
      //  for($i=0;$i<=count($fee_type);$i++){
      //   $data_post = array(  'st_id' => $recodes, 'fee_type' => $fee_type[$i],
      //   'actual_fee' => $actual_fee[$i],'concession_fee' => $concession_fee[$i],
      //    'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
      // 	$recodes2 = $conf->insert( $data_post, STUDENTFEEDETAIL );
      //  }


      if ($recodes == true) {
        $success = "Data <strong>Added</strong> Successfully";
        //$gen->redirecttime( 'class', '2000' );
      }
    }
  }
}



//-------Std session, campus, class

$std_session_id = 7;
$std_campus_id = 3;
$std_class_id = 10;


$fee_type = $conf->fetchall(FEETYPE . " WHERE is_deleted=0");
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0 ORDER BY id DESC");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
$routes = $conf->fetchall(ROUTE . " WHERE is_deleted=0");
$actual_fee = $conf->fetchall(ACTUALFEE . " WHERE is_deleted=0");

$staffs = $conf->fetchall(STAFF . " WHERE is_deleted=0");

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
          <form action=" " method="POST" enctype="multipart/form-data">

            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="addmission_no">Admission Number</label>
                    <input type="text" class="form-control" id="addmission_no" name="addmission_no" tabindex="1" placeholder="" readonly="" value=<?php echo $admissionno; ?>>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="b_form">B-Form Number</label>
                    <input type="text" class="form-control" id="b_form" name="b_form" tabindex="2" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" class="form-control" id="name" name="name" tabindex="3" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="gender" class="form-label ">Gender</label>
                    <select class="form-select form-control" id="gender" tabindex="4" name="gender" required>
                      <option>Select The Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="session_name" class="form-label ">Session</label>
                    <select class="form-select form-control" id="session_name" tabindex="5" name="session_name" required>

                      <?php foreach ($session_year as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->session_year; ?></option>
                      <?php  } ?>


                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="campus" class="form-label ">Campus</label>
                    <select class="form-select form-control campus" id="campus" tabindex="6" name="campus" required>

                      <?php foreach ($campus_name as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="class" class="form-label ">Class</label>
                    <select class="form-select form-control class" id="class" tabindex="7" name="class" required>

                      <!-- <?php foreach ($class_name as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                      <?php  } ?> -->

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="section_name" class="form-label ">Section</label>
                    <select class="form-select form-control" id="section_name" tabindex="8" name="section_name" required>

                      <!-- <?php foreach ($section_title as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->section_title; ?></option>
                      <?php  } ?> -->


                    </select>
                  </div>
                </div>
               
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="admission_date">Date of Admission </label>

                    <input type="date" class="form-control" id="admission_date" name="admission_date" tabindex="9" placeholder="" required>

                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="date_birth"> Date Of Birth </label>

                    <input type="date" class="form-control" id="date_birth" name="date_birth" tabindex="10" placeholder="" required>

                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="age">Age </label>
                    <input type="text" class="form-control" id="age" name="age" tabindex="11" placeholder="" readonly required>
                  </div>
                </div>

               
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="place_birth">Place Of Birth </label>
                    <input type="text" class="form-control" id="place_birth" name="place_birth" tabindex="12" placeholder="" required>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" value="Pakistan" tabindex="13" placeholder="Pakistan" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" tabindex="14" value="Islam" placeholder="Islam" required>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="last_school"> Last School Attended </label>
                    <input type="text" class="form-control" id="last_school" name="last_school" tabindex="15" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="routes" class="form-label ">Routes</label>
                    <select class="form-select form-control" id="routes" tabindex="16" name="routes">

                      <?php foreach ($routes as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->routes; ?></option>
                      <?php  } ?>


                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="image" class="form-label">Student Image </label>
                    <input type="file" class="form-control form-controll-style" id="image" name="image" tabindex="17" require>
                  </div>
                </div>
                <div id="expirydate" style="display:none;" class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>

                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" tabindex="18" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                  <div class="form-check ">
                    <input type="checkbox" name="guest" id="guest" tabindex="19" value="1">
                    <label class="form-check-label font-weight-bold  ml-2" for="guest"> Guest Adm </label>
                  </div>
                </div>

                <div class="col-lg-12 ">
                  <div class="p-2  ">
                    <h3 class=" "> Guardian</h3>
                  </div>


                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="father_name"> Father Name </label>
                    <input type="text" class="form-control" id="father_name" name="father_name" tabindex="20" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" tabindex="21" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="fathre_occupt" class="form-label">Father Occuption</label>
                    <input type="text" class="form-control" id="fathre_occupt" name="fathre_occupt" tabindex="22" placeholder="">

                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="mother_occup" class="form-label ">Mother Occuption</label>
                    <input type="text" class="form-control" id="mother_occup" name="mother_occup" tabindex="23" placeholder="">

                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="cnic">CNIC</label>
                    <input type="text" class="form-control" id="cnic" name="cnic" tabindex="24" placeholder="" required>
                    <div id="cnicError" style="color: red;"></div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="app_user">App User Name</label>
                    <input type="text" class="form-control" id="app_user" name="app_user" tabindex="25" placeholder="" readonly>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="password">App Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="" tabindex="26" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="gurdian_name">Gurdian Name</label>
                    <input type="text" class="form-control" id="gurdian_name" name="gurdian_name" tabindex="27" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="gurdian" class="form-label ">Gurdian Occuption</label>
                    <input type="text" class="form-control" id="gurdian" name="gurdian" tabindex="28" placeholder="">

                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="address"> Perment Address </label>
                    <input type="text" class="form-control" id="address" name="address" tabindex="29" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="home_address"> Home Address </label>
                    <input type="text" class="form-control" id="home_address" name="home_address" tabindex="30" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="office_address"> Office Address </label>
                    <input type="text" class="form-control" id="office_address" name="office_address" tabindex="31" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="land_number">Land Line Number</label>
                    <input type="text" class="form-control" id="land_number" name="land_number" tabindex="32" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" tabindex="33" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="emergency_phone">Emergency Phone Number</label>
                    <input type="text" class="form-control" id="emergency_phone" name="emergency_phone" tabindex="34" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name="email" tabindex="35" placeholder="">
                  </div>
                </div>



                <!-- student fee table data in this form -->
                <div class="col-lg-12 ">
                  <div class="p-2  ">
                    <h3 class=" "> Fee Package</h3>
                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <label class="form-check-label font-weight-bold  ml-2" for="month_fee"> 1 Month Fee Plan: </label>
                    <input type="checkbox" name="month_fee" id="month_fee" tabindex="36" value="1">

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <input type="file" name="month_image" id="month_image" tabindex="37">

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <label class="form-check-label font-weight-bold  ml-2" for="student_free"> Student Free: </label>
                    <input type="checkbox" name="student_free" id="student_free" tabindex="38" value="1">

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <input type="file" name="fee_image" id="fee_image" tabindex="39">

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">
                    <label class="form-check-label font-weight-bold  ml-2" for="staff_kid"> Staff Kid: </label>
                    <input type="checkbox" name="staff_kid" id="staff_kid" tabindex="40" value="1">

                  </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                  <div class="form-check ">

                    <label class="form-check-label font-weight-bold  ml-2" for="stationary"> Apply Stationary </label>
                    <input type="checkbox" name="stationary" id="stationary" tabindex="41" value="1">

                  </div>
                </div>
                <div id="staffkid" style="display:none;" class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="staff" class="form-label ">Staff</label>
                    <select class="form-select form-control" id="staff_id" tabindex="42" name="staff_id">

                      <?php foreach ($staffs as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->employel_name; ?></option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="admission_detail">Admission Detail</label>
                    <input type="text" class="form-control" id="admission_detail" name="admission_detail" tabindex="43" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="commitment">Commitment if any</label>
                    <input type="text" class="form-control" id="commitment" name="commitment" tabindex="44" placeholder="">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="reference">Reference</label>
                    <input type="text" class="form-control" id="reference" name="reference" tabindex="45" placeholder="">

                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="conession_form" class="form-label">Conession Form </label>
                    <input class="form-control form-controll-style" type="file" id="conession_form" name="conession_form" tabindex="46">
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12" id="feetablearea">
                  <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <p>Please select Session, Campus and Class to display fee</p>
                  </div>



                </div>


              </div>

              <div class="text-center mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="47" />
              </div>
            </div>

            <!-- /.card-body -->
          </form>



        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>