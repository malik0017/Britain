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
  $val->name('Class name')->value($class_name)->pattern('text')->required();
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
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <img src="image/logo.png" class="img-fluid img-thumbnail" alt="The Message">
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12  d-flex justify-content-end">

                  
                  <div class="form-group">
                    <label for="campus" class="form-label ">Campus</label>
                    <select class="form-select form-control campus" id="campus" tabindex="9" name="campus" required>

                      <?php foreach ($campus_name as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                      <?php  } ?>

                    </select>
                  </div>
                
                  </div>
                  <div class="form-group w-100">
                    <h1>STUDENT FEE LEDGER</h1>
                  </div>


                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group w-75 ">
                      <label for="session_name" class="form-label ">Session</label>
                      <select class="form-select form-control" id="session_name" tabindex="3" name="session_name" required>
                        <?php foreach ($session_year as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->session_year; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>


                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group  w-75">
                      <label for="class_name" class="form-label ">Class/Section</label>
                      <select class="form-select form-control" id="class_name" tabindex="2" name="class_name" required>
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="reg">REG#</label>
                      <input type="text" class="form-control" id="reg" name="reg" tabindex="5" placeholder="" required>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="rem arks">STUDENT NAME</label>
                      <input type="text" class="form-control" id="remarks" name="remarks" tabindex="5" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="rem arks">FATHER NAME</label>
                      <input type="text" class="form-control" id="remarks" name="remarks" tabindex="5" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="attendance_date">Attendance Date</label>
                      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="attendance_date" name="attendance_date" tabindex="4" placeholder="" required>
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

                  <!-- <div class="col-lg- col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="session_name" class="form-label ">Session Name</label>
                            <select class="form-select form-control" id="session_name" tabindex="3" name="session_name" required>                                        
                            <?php foreach ($session_year as $data) { ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->session_year; ?></option>
                            <?php  } ?>  
                                </select>
                                
                               </div>
                          </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="section_name" class="form-label ">Section Name</label>
                            <select class="form-select form-control" id="section_name" tabindex="3" name="section_name" required>                                        
                            <?php foreach ($section_title as $data) { ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->section_title; ?></option>
                            <?php  } ?>    
                                </select>
                               </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="attendance_date">Attendance Date</label>
                           <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="attendance_date" name="attendance_date" tabindex="4" placeholder="" required>
                           <script>
                          $(document).ready( function() {
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
                       <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="form-group">
                                <label for="rem arks" >Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks" tabindex="5" placeholder="" required>
                            </div>
                        </div> -->
                  <!-- <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                            <div class="form-check ">
                              <input type="checkbox" name="teacher_absent" value="1" id="teacher_absent" tabindex="6">
                              <label class="form-check-label font-weight-bold  ml-2" for="teacher_absent" >Teacher Absent </label>
                            </div>
                            </div> 
                            <div class="col-lg-2 col-md-4 col-sm-6 mt-5 ml-3">
                              <div class="form-check ">
                                <input type="checkbox" name="is_holiday"  value="1" id="is_holiday" tabindex="7">
                                <label class="form-check-label font-weight-bold  ml-2" for="is_holiday" >Is Holiday </label>
                              </div>
                              </div>  -->
                </div>


                <div class="row">
                  <!-- <div class="d-flex">     -->
                  <div class="col-lg-8 col-md-6 col-sm-12 table-responsive">
                    <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">

                      <thead class="btn-warning">


                        <tr>

                          <th>Month Year</th>

                          <th>Campus Name</th>

                          <th>Due Date</th>

                          <th>Registration Fee</th>

                          <th class="no-sort">Admission Fee</th>
                          <th class="no-sort">Security Fee</th>
                          <th class="no-sort">Stationary Charges</th>
                          <th class="no-sort">Tution Fee</th>
                          <th class="no-sort">Re Vouching Fee</th>
                          <th class="no-sort">Re Admission Fee</th>
                          <th class="no-sort">Van Charges</th>
                          <th class="no-sort">Arrears</th>
                          <th class="no-sort">Fee Due</th>

                        </tr>

                      </thead>

                      <tbody style="font-size:8px;">
                        <tr>
                          <td>
                            Aug-2021
                          </td>
                          <td>
                            The Message
                          </td>
                          <td>
                            7-Aug-21
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            6000
                          </td>
                          <td>
                            5400
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            5400
                          </td>

                        </tr>
                        <tr>
                          <td>
                            Aug-2021
                          </td>
                          <td>
                            The Message
                          </td>
                          <td>
                            7-Aug-21
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            6000
                          </td>
                          <td>
                            5400
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            5400
                          </td>

                        </tr>
                        <tr>
                          <td>
                            Aug-2021
                          </td>
                          <td>
                            The Message
                          </td>
                          <td> 7-Aug-21 </td>
                          <td> 0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            6000
                          </td>
                          <td>
                            5700
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            0
                          </td>
                          <td>
                            5400
                          </td>

                        </tr>

                      </tbody>

                    </table>
                  </div>

                  <div class="col-lg-4 col-md-6 col-sm-12 table-responsive">
                    <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">

                      <thead class="btn-warning">


                        <tr>

                          <th>Month Year</th>

                          <th>Campus Name</th>

                          <th>Due Date</th>

                          <th>Registration Fee</th>


                        </tr>

                      </thead>

                      <tbody style="font-size:8px;">
                        <tr>
                          <td>
                            Aug-2021
                          </td>
                          <td>
                            The Message
                          </td>
                          <td>
                            7-Aug-21
                          </td>
                          <td>
                            0
                          </td>



                        </tr>


                      </tbody>

                    </table>

                  </div>
                  <!-- </div> -->
                </div>
                <div class="text-center mt-2">
                  <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="8" />
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