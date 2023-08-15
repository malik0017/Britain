<?php

if (isset($_POST['submit'])) {

  $session_name = ($_POST['session_name']);
  $class_name = ($_POST['class_name']);
  
  $section_name = ($_POST['section_name']);
  $exam = ($_POST['exam']); 
  $name = ($_POST['name']);
  $exam_name = ($_POST['exam_name']);
  
  $subject = ($_POST['subject']);
  $passed = ($_POST['passed']);
  $total_marks = $_POST['total_marks'];
  $obtained = $_POST['obtained'];
  $result = $_POST['result'];
   $promoted = ($_POST['promoted']);
  

  // $val->name('Campus type')->value($campus_type)->pattern('text')->required();
  // $val->name('Class name')->value($class_name)->pattern('text')->required();
  // $val->name('Section name')->value($session_name)->pattern('text')->required();



  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array(
      'session_name' => $session_name,'class_name' => $class_name, 'section_name' => $section_name,'exam' => $exam,
      
      'name' => $name, 'exam_name' => $exam_name, 'subject' => $subject,
      'passed' => $passed,'total_marks' => $total_marks,'obtained' => $obtained,'result' => $result,'promoted' => $promoted, 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, EXAMPROMOTION);
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
$campus_type = $conf->fetchall(CAMPUSTYPE . " WHERE is_deleted=0");
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
                <div class="col-lg-2 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="session_name" class="form-label ">Session</label>
                            <select class="form-select form-control" id="session_name" tabindex="1" name="session_name" required>                                        
                            <?php foreach($session_year as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->session_year; ?></option>
                            <?php  }?>  
                                </select>
                               </div>
                          </div>
               
                        <div class="col-lg-2 col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="class_name" class="form-label ">Class</label>
                        <select class="form-select form-control" id="class_name" tabindex="2" name="class_name" required>                                        
                        <?php foreach($class_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->class_name; ?></option>
                            <?php  }?>                                           
                             
                            </select>
                           </div>
                            </div>
                           
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="section_name" class="form-label ">Section</label>
                            <select class="form-select form-control" id="section_name" tabindex="3" name="section_name" required>                                        
                            <?php foreach($section_title as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->section_title; ?></option>
                            <?php  }?>    
                                </select>
                               </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="exam">Exam</label>
                      <input type="text" class="form-control" id="exam" name="exam" tabindex="4" placeholder="" required>

                    </div>
                  </div>
                          <div class="col-lg-2 col-md-6 col-sm-6 " style="margin-top: 35px;">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary">
                        Load
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="name">Student</label>
                      <input type="text" class="form-control" id="name" name="name" tabindex="5" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="exam_name">Exam</label>
                      <input type="text" class="form-control" id="exam_name" name="exam_name" tabindex="6" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" class="form-control" id="subject" name="subject" tabindex="7" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-1 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="passed">Passed</label>
                      <input type="text" class="form-control" id="passed" name="passed" tabindex="8" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-1 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="total_marks">Total Marks</label>
                      <input type="text" class="form-control" id="total_marks" name="total_marks" tabindex="9" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="obtained">Obtained Marks</label>
                      <input type="text" class="form-control" id="obtained" name="obtained" tabindex="10" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-1 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="result">Result</label>
                      <input type="text" class="form-control" id="result" name="result" tabindex="11" placeholder="" required>

                    </div>
                  </div>
                
                  <div class="col-lg-1 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="promoted">Promoted</label>
                      <input type="text" class="form-control" id="promoted" name="promoted" tabindex="12" placeholder="" required>

                    </div>
                  </div>
                 
                </div>

              </div>
              <div class="text-center mt-2 p-3">
                <input type="submit" name="submit" value="Save" class="btn btn-warning " tabindex="13" />

                <input type="reset" name="reset" value="Clear" class="btn btn-warning " tabindex="14" />
              </div>

              <!-- /.card-body -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

</div>