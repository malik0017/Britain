<?php
$emply_id =  $_REQUEST['CD'];
if (isset($_POST['submit'])) {

  $employel_type = $_POST['employel_type'];
  $lunch_allowance = $_POST['lunch_allowance'];
  //   $franchise = $_POST[ 'franchise' ];
  //   $college = $_POST[ 'college' ];

  if (!$val->isSuccess()) {

    $error = $val->displayErrors();
  }


  if (empty($error)) {

    $table = EMPLOYETYE . " set `employel_type`='" . $employel_type . "' , `lunch_allowance`='" . $lunch_allowance . "'where id='" . $emply_id . "'";
    $recodes = $conf->updateValue($table);



    if ($recodes == true) {
      $success = "Record <strong>Updated</strong> Successfully";

      $gen->redirecttime('employel-type-view.php', '2000');
    } else {
      $error = "Employee Level Not Updated";
    }
  }
}
$table_fetch = EMPLOYETYE . " where id='" . $emply_id . "'";
$row = $conf->singlev($table_fetch);
// $class=$conf->fetchall( CLASStbl . " WHERE is_deleted=0" );
$campus_type = $conf->fetchall(CAMPUSTYPE . " WHERE is_deleted=0");
// $section=$conf->fetchall( SECTION );
?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <form action="" method="post">
              <div class="row">
                <div class="col-lg-6  col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="employel_type"> Employel Type</label>
                  <input type="text" class="form-control" id="employel_type" value="<?php echo $row->employel_type; ?>" name="employel_type" tabindex="1" placeholder="" required>

                </div>
                  </div> 
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="lunch_allowance"> Lunch Allowance </label>
                      <input type="text" class="form-control" id="lunch_allowance" value="<?php echo $row->lunch_allowance; ?>" name="lunch_allowance" tabindex="2" placeholder="" required>

                    </div>
                  </div>
                
              </div>
              <div class="text-center mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="3" />
              </div>
          </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->
</div>