<?php

if (isset($_POST['submit'])) {

  $std_id = ($_POST['std_id']);
  $employel_name = ($_POST['employel_name']);
  
  $staff_kid = ($_POST['staff_kid']);
  $confirmation_date = ($_POST['confirmation_date']);

  $table = STUDENTFEE . " set  `staff_id`='" . $employel_name . "',`staff_kid`='" . $staff_kid . "', `confirmation_date`='" . $confirmation_date . "' where std_id='" . $std_id . "'";
  $recodes = $conf->updateValue($table);

  if ($recodes == true) {
    $success = "Data <strong>Updated</strong> Successfully";
  }
}
echo $table;

$employel_level = $conf->fetchall(EMPLOYELEVEL . " WHERE is_deleted=0");
$employel_type = $conf->fetchall(EMPLOYETYE . " WHERE is_deleted=0");
$campus_type = $conf->fetchall(CAMPUSTYPE . " WHERE is_deleted=0");
$department = $conf->fetchall(DEPARTMENT . " WHERE is_deleted=0");
$salary_type = $conf->fetchall(SALARY . " WHERE is_deleted=0");
$max_id = $conf->single(STAFF, 'MAX(id) as max_id ');

$employel_name = $conf->fetchall(STAFF . " WHERE is_deleted=0");


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
                      <label for="std_id">Student ID</label>
                      <input type="text" class="form-control" id="std_id" name="std_id" 
                      tabindex="1" placeholder="" required>
                    </div>
                  </div>

                  



                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="employel_name"> Employee</label>

                      <select class="form-select form-control" id="employel_name" name="employel_name"  tabindex="2" placeholder="" required>
                        <?php foreach ($employel_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->id.'-'.$data->employel_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>



                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="confirmation_date"> Confirmation Date </label>

                      <input type="date" class="form-control" id="confirmation_date" value="" name="confirmation_date" tabindex="3" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <label class="form-check-label font-weight-bold mt-5" for="staff_kid"> Staff Kid: </label>
                      <input type="checkbox" name="staff_kid" value="1" id="staff_kid" tabindex="4" value="1">

                    </div>
                  </div>

                </div>
                <div class="text-center mt-5">
                  <input type="submit" name="submit" value="Update" class="btn btn-warning " tabindex="5" />



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