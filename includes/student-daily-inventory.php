<?php

if (isset($_POST['load'])) {
   
  $campus = ($_POST['campus']);
  
  $session_name = ($_POST['session_name']);
  
echo "wwwwwwwwwwwwwww".$campus;

  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array(
      'campus' => $campus, 'session_name' => $session_name, 
       
       'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $results = $conf->fetchall(Student . " where session_name = '".$session_name."' AND campus = '".$campus."'");
  
 
    print_r($results);
  }
}


 



$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");

$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");


?>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">



            <div class="card center1">
             
              <div class="">
                <form name="post" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                  <div class="row py-3">
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
                        <label for="attendance_date">Attendance Date</label>
                        <input type="date" class="form-control" value="<?= date('d-m-Y') ?>" id="attendance_date" name="attendance_date" tabindex="3" placeholder="" required>
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
                    <div class="text-center my-auto mx-auto">
                              <input type="submit" name="load" value="Preview Report" class="btn btn-warning " tabindex="4"/>
                             </div>
                             <!-- <div class="text-center my-auto mx-auto">
                              <input type="submit" name="submit" value="Export" class="btn btn-warning " tabindex="8"/>
                             </div> -->


                  </div>

                </form>

              </div>
              <!-- /.card-header -->
              <div class="card-body">



                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <th style="width:5%">Class</th>
                      <th style="width:5%">Section</th>
                      <th style="width:10%">Session</th>
                      <th style="width:10%">Strength</th>
                      <th style="width:5%">Present</th>
                      <th style="width:5%">Absent</th>
                      <th style="width:10%">New Adm.</th> 
                       <th style="width:5%">Left</th>
                      <th style="width:10%">Transfer IN</th>
                      <th style="width:10%">Transfer OUT</th>
                      <th style="width:10%">Absent Students</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach ($results as $data) {
                      $campusName = CAMPUStbl . " where id='" . $data->campus_name . "'";
                      $cat = $conf->singlev($campusName);

                      


                      $sessionName = SESSIONYEAR . " where id='" . $data->session_name . "'";
                      $session = $conf->singlev($sessionName);

                     
                    ?>
                      <tr>

                        <td> <?= $cat->campus_name ?></td>
                         
                        <td><?= $session->session_year ?></td>
                         <td> </td> 
                         <td> </td>
                         <td> </td> 
                        <!-- <td><?= $session->session_year ?></td>
                         <td><?= $section->section_title ?></td> 
                         <td><?= $session->session_year ?></td>
                         <td><?= $section->section_title ?></td> 
                        <td><?php echo date("d-m-Y", strtotime($data->attendance_date)); ?></td> -->

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>