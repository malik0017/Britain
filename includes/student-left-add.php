<?php

if (isset($_POST['submit'])) {

  $campus = ($_POST['campus']);
  $class_name = ($_POST['class_name']);
  $session_name = ($_POST['session_name']);
  $section_name = ($_POST['section_name']);
  $addmission_no = ($_POST['addmission_no']);
  $name = ($_POST['name']);
  $addmission_date = ($_POST['addmission_date']);
  $father_name = ($_POST['father_name']);
  $student_left = ($_POST['student_left']);
  // $struck = ($_POST['struck']);  
  $left_date = ($_POST['left_date']);
  $reason = ($_POST['reason']);
  // $struck = ($_POST['struck']);
  // $stdid = $_POST['stdid'];

  $val->name('Campus type')->value($campus_type)->pattern('text')->required();
  $val->name('Class name')->value($class_name)->pattern('text')->required();
  $val->name('Section name')->value($session_name)->pattern('text')->required();



  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array(
      'campus' => $campus, 'class_name' => $class_name, 'session_name' => $session_name,  'section_name' => $section_name, 'addmission_no' => $addmission_no,
      'name' => $name, 'addmission_date' => $addmission_date, 'father_name' => $father_name,
      'student_left' => $student_left,  'left_date' => $left_date, 'reason' => $reason,'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, STUDENTLEFT);
    // $attendance_id = $recodes;
    // $num = 0;
    // foreach ($stdid as $sid) {
    //   $num++;
    //   $data_post = array('attendance_id' => $attendance_id, 'std_id' => $sid, 'attendance_date' => $attendance_date, 'attendance' => $_POST['attennce_' . $num], 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime);
    //   $recodes = $conf->insert($data_post, ATTENDANCE_DETAILS);
    



    if ($recodes == true) {
      $success = "Data <strong>Added</strong> Successfully";
      //$gen->redirecttime( 'class', '2000' );

    }
  }
}
$campus_name = $conf->fetchall(CAMPUStbl. " WHERE is_deleted=0");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");
$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
$results = $conf->fetchall(Student . " where  is_deleted = 0");


?>

<div class="content">

  <div class="container">

    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>

        <div class="card card-primary card-outline">
          <div class="card-body">
            <form action="" method="POST">

              <div class="card-body">

                <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="session_name" class="form-label ">Session</label>
                      <select class="form-select form-control" id="session_name" tabindex="3" name="session_name" required>
                        <?php foreach ($session_year as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->session_year; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="form-group">
                      <label for="campus" class="form-label ">Campus</label>
                      <select class="form-select form-control" id="campus" tabindex="1" name="campus" required>
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="class_name" class="form-label ">Class</label>
                      <select class="form-select form-control" id="class_name" tabindex="2" name="class_name" required>
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>
                 
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="section_name" class="form-label ">Section</label>
                      <select class="form-select form-control" id="section_name" tabindex="4" name="section_name" required>
                        <?php foreach ($section_title as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->section_title; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_no">Admission #:</label>
                      <input type="text" class="form-control" id="addmission_no" name="addmission_no" tabindex="5" placeholder="">
                     
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="name">Student</label>
                      <input type="text" class="form-control" id="name" name="name" tabindex="6" placeholder="" required>
                      
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 " style="margin-top: 35px;">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary">
                        <i class="fas fa-search">Search</i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-12 ">
                    <div class="p-2  ">
                      <h3 class=" ">Student Info</h3>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_no">Admission #:</label>
                      <input type="text" class="form-control" id="addmission_no" name="addmission_no" tabindex="7" placeholder="">
                      
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_date">Addmission Date</label>
                      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="addmission_date" name="addmission_date" tabindex="8" placeholder="" required>
                      <script>
                        $(document).ready(function() {
                          var now = new Date();
                          var month = (now.getMonth() + 1);
                          var day = now.getDate();
                          if (month < 10)
                            month = "0" + month;
                          if (day < 10)
                            day = "0" + day;
                          var today = now.getFullYear() + '-' + month + '-' + day;
                          $('#datePicker').val(today);
                        });
                      </script>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="name">Student</label>
                      <input type="text" class="form-control" id="name" name="name" tabindex="9" placeholder="" required>
                      
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="father_name"> Father Name </label>
                      <input type="text" class="form-control" id="father_name" name="father_name" tabindex="10" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="class_name" class="form-label ">Class</label>
                      <select class="form-select form-control" id="class_name" tabindex="11" name="class_name" required>
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="section_name" class="form-label ">Section</label>
                      <select class="form-select form-control" id="section_name" tabindex="12" name="section_name" required>
                        <?php foreach ($section_title as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->section_title; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12 ">
                    <div class="p-2  ">
                      <h3 class=" ">Status</h3>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                            <div class="form-check ">
                              <input type="radio" name="student_left" value="1" id="student_left" tabindex="13">
                              <label class="form-check-label font-weight-bold  ml-2" for="student_left" >Left </label>
                            </div>
                            </div> 
                            <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                            <div class="form-check ">
                              <input type="radio" name="student_left" value="2" id="struck" tabindex="14">
                              <label class="form-check-label font-weight-bold  ml-2" for="struck" >Struck-Off</label>
                            </div>
                            </div> 
                            <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                            <div class="form-check ">
                              <input type="radio" name="student_left" value="3" id="freeze" tabindex="15">
                              <label class="form-check-label font-weight-bold  ml-2" for="freeze" >Freeze</label>
                            </div>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="left_date">Date</label>
                      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="left_date" name="left_date" tabindex="16" placeholder="" required>
                      <script>
                        $(document).ready(function() {
                          var now = new Date();
                          var month = (now.getMonth() + 1);
                          var day = now.getDate();
                          if (month < 10)
                            month = "0" + month;
                          if (day < 10)
                            day = "0" + day;
                          var today = now.getFullYear() + '-' + month + '-' + day;
                          $('#datePicker').val(today);
                        });
                      </script>
                    </div>
                  </div>
                  
                           
                            <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="reason">Reason</label>
                      <input type="text" class="form-control" id="reason" name="reason" tabindex="17" placeholder="" required>
                     
                    </div>
                  </div>
                
                </div>

              </div>
              <div class="text-center mt-2 p-3">
                <input type="submit" name="submit" value="Save" class="btn btn-warning " tabindex="18" />
             
                <input type="reset" name="reset" value="Clear" class="btn btn-warning " tabindex="19" />
              </div>

              <!-- /.card-body -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

</div>