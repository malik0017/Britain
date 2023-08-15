<?php

if (isset($_POST['submit'])) {

  $campus = ($_POST['campus']);
  $class_name = ($_POST['class_name']);
  $session_name = ($_POST['session_name']);
  $section_name = ($_POST['section_name']);
  $attendance_date = ($_POST['attendance_date']);
  $remarks = ($_POST['remarks']);
  $teacher_absent = ($_POST['teacher_absent']);
  $is_holiday = ($_POST['is_holiday']);
  $stdid = $_POST['stdid'];





  $val->name('Campus ')->value($campus)->pattern('text')->required();
  // $val->name('Class name')->value($class_name)->pattern('text')->required();
  $val->name('Section name')->value($session_name)->pattern('text')->required();



  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array(
      'campus' => $campus, 'class_name' => $class_name, 'session_name' => $session_name,  'section_name' => $section_name, 'attendance_date' => $attendance_date, 'remarks' => $remarks,
      'teacher_absent' => $teacher_absent, 'is_holiday' => $is_holiday, 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, ATTENDANCE);
    $attendance_id = $recodes;
    $num = 0;
    foreach ($stdid as $sid) {
      $num++;
      $data_post = array('attendance_id' => $attendance_id, 'std_id' => $sid, 'attendance_date' => $attendance_date, 'attendance' => $_POST['attennce_' . $num], 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime);
      $recodes = $conf->insert($data_post, ATTENDANCE_DETAILS);
    }



    if ($recodes == true) {
      $success = "Data <strong>Added</strong> Successfully";
      //$gen->redirecttime( 'class', '2000' );

    }
  }
}
if (isset($_POST['load'])) {
   
  $campus = ($_POST['campus']);
  $class_name = ($_POST['class_name']);
  $session_name = ($_POST['session_name']);
  $section_name = ($_POST['section_name']);
  //  echo "============".$session_name;


  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array(
      'campus' => $campus, 'class_name' => $class_name, 'session_name' => $session_name, 
       'section_name' => $section_name,
       'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $results = $conf->fetchall(Student . " where session_name = '".$session_name."' AND campus = '".$campus."'
  AND class = '".$class_name."' AND section_name = '".$section_name."'");
  
//  print_r($results);
    
  }
}








$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");
$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
// $results = $conf->fetchall(Student . " where  is_deleted = 0");


?>

<div class="content">

  <div class="container">

    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>

        <div class="card card-primary card-outline">
          <div class="card-body">


            <div class="card-body">
              <form name=" " action=" " method="POST">
                <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="session_name" class="form-label ">Session</label>
                      <select class="form-select form-control" id="session_name" tabindex="1" name="session_name">
                        <?php foreach ($session_year as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->session_year; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="form-group">
                      <label for="campus" class="form-label ">Campus</label>
                      <select class="form-select form-control" id="campus" tabindex="2" name="campus">
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="class_name" class="form-label ">Class</label>
                      <select class="form-select form-control" id="class_name" tabindex="3" name="class_name">
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="section_name" class="form-label ">Section</label>
                      <select class="form-select form-control" id="section_name" tabindex="4" name="section_name">
                        <?php foreach ($section_title as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->section_title; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="attendance_date">Attendance Date</label>
                      <input type="date" class="form-control" value="<?= date('d-m-Y') ?>" id="attendance_date" name="attendance_date" tabindex="5" placeholder="">
                      <script>
                        $(document).ready(function() {
                          var now = new Date();
                          var day = now.getDate();
                          var month = (now.getMonth() + 1);
                          if (day < 10)
                            day = "0" + day;
                          if (month < 10)
                            month = "0" + month;

                          var today = now.getFullYear() + day + month + '-';
                          $('#datePicker').val(today);
                        });
                      </script>
                    </div>
                  </div>


                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="remarks">Remarks</label>
                      <input type="text" class="form-control" id="remarks" name="remarks" tabindex="6" placeholder="">
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                    <div class="form-check ">
                      <input type="checkbox" name="teacher_absent" value="1" id="teacher_absent" tabindex="7">
                      <label class="form-check-label font-weight-bold  ml-2" for="teacher_absent">Teacher Absent </label>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                    <div class="form-check ">
                      <input type="checkbox" name="is_holiday" value="1" id="is_holiday" tabindex="8">
                      <label class="form-check-label font-weight-bold  ml-2" for="is_holiday">Is Holiday </label>
                    </div>
                  </div>
                  


                </div>
               
                  <div class="text-center mb-2">
                <input type="submit" name="load" value="Load" class="btn btn-warning " tabindex="9" />
              </div>
              
              </form>
              <!-- <div class="text-center mt-4 p-2">
                              <input type="submit" name="submit" value="Load" class="btn btn-warning " tabindex="8"/>
                             </div> -->
              <form action="" method="post">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <table class="table ">
                    <thead>
                      <tr class="col-lg-2 col-md-4 col-sm-12">
                        <th>Sr#</th>
                        <th>Admin#</th>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Persent</th>
                        <th>Absent</th>
                        <th>Leave</th>
                        <th>Holiday</th>

                      </tr>
                    </thead>
                    <tbody>


                      <tr>
                        <td>
                          <?php
                          $cnt = 0;
                          foreach ($results as $data) {
                            $cnt++;
                          ?>
                      <tr>


                        <td>
                          <?= $data->id ?>
                          <input type="hidden" name="stdid[<?= $cnt ?>]" value="<?= $data->id ?>">
                        </td>

                        <td>
                          <?= $data->addmission_no ?>

                        </td>
                        <td>
                          <?= $data->name ?>

                        </td>
                        <td>
                          <?= $data->father_name ?>

                        </td>

                        </td>



                        </td>
                        <td>

                          <input class="form-check-input" type="radio" name="attennce_<?= $cnt ?>" value="1" id="preent_<?= $cnt ?>" checked>

                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="attennce_<?= $cnt ?>" value="0" id="absent_<?= $cnt ?>">

                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="attennce_<?= $cnt ?>" value="2" id="leave_<?= $cnt ?>">


                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="attennce_<?= $cnt ?>" value="3" id="holiday_<?= $cnt ?>">


                </div>
                </td>

                </td>
              <?php         } ?>
              </tr>

              </tbody>
              </table>
              <div class="text-center mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="10" />
              </div>
              <input type="hidden" name="campus" value="<?php echo $results[0]->campus; ?>"/>
              <input type="hidden" name="class_name" value="<?php echo $results[0]->class_name; ?>"/>
              <input type="hidden" name="session_name" value="<?php echo $results[0]->session_name; ?>"/>
              <input type="hidden" name="section_name" value="<?php echo $results[0]->section_name; ?>"/>
              </form>
            </div>

          </div>

          <!-- /.card-body -->

        </div>
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->

</div>