<?php

if (isset($_POST['submit'])) {

  $campus = ($_POST['campus']);
  $addmission_no = ($_POST['addmission_no']);
  $addmission_date = ($_POST['addmission_date']);
  $name = ($_POST['name']);
    $father_name = ($_POST['father_name']);
  $class_name = ($_POST['class_name']);
   $section_name = ($_POST['section_name']);  
  $entry_date = ($_POST['entry_date']);
  $in_date = ($_POST['in_date']);
   $campus_in = ($_POST['campus_in']);
  // $stdid = $_POST['stdid'];

  $val->name('Campus')->value($campus)->pattern('text')->required();
  $val->name('Class name')->value($class_name)->pattern('text')->required();
  // $val->name('Section name')->value($session_name)->pattern('text')->required();



  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array(
      'campus' => $campus, 'addmission_no' => $addmission_no, 'addmission_date' => $addmission_date,
      'name' => $name, 'father_name' => $father_name, 'class_name' => $class_name,
      'section_name' => $section_name,  'entry_date' => $entry_date, 'in_date' => $in_date,'campus_in' => $campus_in,  'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, STUDENTTRANSFER);
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
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
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
                  <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="form-group">
                      <label for="campus" class="form-label ">Campus</label>
                      <select class="form-select form-control" id="campus" tabindex="1" name="campus" required>
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_no">Admission #:</label>
                      <input type="text" class="form-control" id="addmission_no" name="addmission_no" tabindex="2" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 " style="margin-top: 35px;">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary">
                        Load
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
                      <input type="text" class="form-control" id="addmission_no" name="addmission_no" tabindex="3" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_date">Addmission Date</label>
                      <input type="date" class="form-control" value="<?= date('d-m-Y') ?>" id="addmission_date" name="addmission_date" tabindex="4" placeholder="" required>
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
                      <input type="text" class="form-control" id="name" name="name" tabindex="5" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="father_name"> Father Name </label>
                      <input type="text" class="form-control" id="father_name" name="father_name" tabindex="6" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="class_name" class="form-label ">Class</label>
                      <select class="form-select form-control" id="class_name" tabindex="7" name="class_name" required>
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="section_name" class="form-label ">Section</label>
                      <select class="form-select form-control" id="section_name" tabindex="8" name="section_name" required>
                        <?php foreach ($section_title as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->section_title; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12 ">
                    <div class="p-2  ">
                      <h3 class=" ">Transfer OUT Info</h3>
                    </div>
                  </div>


                  <div class="col-lg-5 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="entry_date">Entry Date</label>
                      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="entry_date" name="entry_date" tabindex="9" placeholder="" required>
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
                  <div class="col-lg-12 ">
                    <div class="p-2  ">
                      <h3 class=" ">Transfer IN Info</h3>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="in_date">Entry Date IN</label>
                      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="in_date" name="in_date" tabindex="10" placeholder="" required>
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
                  <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="form-group">
                      <label for="campus_in" class="form-label ">Campus In</label>
                      <select class="form-select form-control" id="campus_in" tabindex="11" name="campus_in" required>
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
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