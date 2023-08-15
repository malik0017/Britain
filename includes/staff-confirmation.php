<?php

if (isset($_POST['submit'])) {


  $employel_name = ($_POST['employel_name']);


  $confirmation_date = ($_POST['confirmation_date']);
  $basic_salary = ($_POST['basic_salary']);

  $ded_ration = ($_POST['ded_ration']);
  $lunch_allowance = ($_POST['lunch_allowance']);
  $fund_duction = ($_POST['fund_duction']);
  $staff_confirmation = ($_POST['staff_confirmation']);

  $table = STAFF . " set  `confirmation_date`='" . $confirmation_date . "', `lunch_allowance`='" . $lunch_allowance . "',
  `basic_salary`='" . $basic_salary . "', `ded_ration`='" . $ded_ration . "', `fund_duction`='" . $fund_duction . "',
  `staff_confirmation`='" . $staff_confirmation . "' where id='" . $employel_name . "'";
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
                      <label for="employel_name"> Employee</label>

                      <select class="form-select form-control salary" id="employel_name" name="employel_name" tabindex="1" placeholder="" required>
                        <?php foreach ($employel_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->id . '-' . $data->employel_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>



                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="confirmation_date"> Confirmation Date </label>

                      <input type="date" class="form-control" id="confirmation_date" value="" name="confirmation_date" tabindex="2" placeholder="" required>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="basic_salary"> Basic Salary </label>
                      <input type="text" class="form-control" id="basic_salary" name="basic_salary" readonly tabindex="3" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="ded_ration"> Ded.Ratio </label>
                      <input type="text" class="form-control" id="ded_ration" name="ded_ration" tabindex="4" placeholder="" readonly required>

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="lunch_allowance"> Lunch Allowance </label>
                      <input type="text" class="form-control" id="lunch_allowance" name="lunch_allowance" tabindex="5" placeholder="" readonly="readonly" required>

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="fund_duction"> P.Fund Deduction </label>
                      <input type="text" class="form-control" id="fund_duction" name="fund_duction" tabindex="6" placeholder="" readonly required>

                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <label class="form-check-label font-weight-bold mt-5" for="staff_confirmation"> Staff Confirmation: </label>
                      <input type="checkbox" name="staff_confirmation" value="1" id="staff_confirmation" tabindex="7" value="1">

                    </div>
                  </div>

                </div>
                <div class="text-center mt-5">
                  <input type="submit" name="submit" value="Update" class="btn btn-warning " tabindex="8" />



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