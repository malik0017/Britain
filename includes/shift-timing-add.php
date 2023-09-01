<?php
if (isset($_POST['submit'])) {
  
  $ShiftName = ($_POST['ShiftName']);

  $StartTime = date("H:i:s", strtotime($_POST['StartTime']));
  $EndTime = date("H:i:s", strtotime($_POST['EndTime']));
  $StartTime1 = date("H:i:s", strtotime($_POST['StartTime1']));
  $EndTime1 = date("H:i:s", strtotime($_POST['EndTime1']));
  $StartTime2 = date("H:i:s", strtotime($_POST['StartTime']));
  $EndTime2 = date("H:i:s", strtotime($_POST['StartTime2']));

  
  if (empty($error)) {
    $data_post = array(
      'ShiftName' => $ShiftName,
      'StartTime' => $StartTime,
      'EndTime' => $EndTime,
      'StartTime1' => $StartTime1,
      'EndTime1' => $EndTime1,
      'StartTime2' => $StartTime2,
      'EndTime2' => $EndTime2,
      'IsActive' => 1,
      'IsWinter' => 0,

      'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, SHIFTTIMING);
    // print_r($data_post);
    // echo "wqqqqqqqqqqqqqq" . $recodes;
    if ($recodes == true) {
      $success = "Data <strong>Added</strong> Successfully";
      //$gen->redirecttime( 'class', '2000' );
    }
  }
}
?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="ShiftName"> Shift Title</label>
                      <input type="text" class="form-control" id="ShiftName" name="ShiftName" tabindex="2" placeholder=""  value="<?php  ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="StartTime"> Start Timing</label>
                      <input type="text" class="form-control" id="StartTime" name="StartTime" tabindex="2" placeholder=""  value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="EndTime"> End Timing</label>
                      <input type="text" class="form-control" id="EndTime" name="EndTime" tabindex="3" placeholder=""   value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                  </div>
                 
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="StartTime1"> Start Timing</label>
                      <input type="text" class="form-control" id="StartTime1" name="StartTime1" tabindex="2" placeholder=""  value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="EndTime1"> End Timing</label>
                      <input type="text" class="form-control" id="EndTime1" name="EndTime1" tabindex="3" placeholder=""   value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="StartTime2"> Start Timing</label>
                      <input type="text" class="form-control" id="StartTime2" name="StartTime2" tabindex="2" placeholder=""  value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="EndTime2"> End Timing</label>
                      <input type="text" class="form-control" id="EndTime2" name="EndTime2" tabindex="3" placeholder=""   value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                </div>
                <div class="text-center mt-5">
                  <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="44" />
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