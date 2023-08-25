<?php
if (isset($_POST['submit'])) {
  
  $shift_title = ($_POST['shift_title']);

  $start_time = date("Y-m-d H:i:s", strtotime($_POST['start_time']));
  $end_time = date("Y-m-d H:i:s", strtotime($_POST['end_time']));


  if (empty($error)) {
    $data_post = array(
      'shift_title' => $shift_title,
      'start_time' => $start_time,
      'end_time' => $end_time,

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
                  <div class="col-lg-6  col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="shift_title"> Shift Title</label>
                      <input type="text" class="form-control" id="shift_title" name="shift_title" tabindex="2" placeholder=""  value="<?php  ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="start_time"> Start Timing</label>
                      <input type="text" class="form-control" id="start_time" name="start_time" tabindex="2" placeholder=""  value="<?php  echo date('H:i'); ?>" required>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="end_time"> End Timing</label>
                      <input type="text" class="form-control" id="end_time" name="end_time" tabindex="3" placeholder=""   value="<?php  echo date('H:i'); ?>" required>
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