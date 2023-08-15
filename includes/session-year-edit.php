<?php
$year_id =  $_REQUEST['CD'];
if (isset($_POST['submit'])) {

  $session_year = $_POST['session_year'];
  

  if (!$val->isSuccess()) {

    $error = $val->displayErrors();
  }
  if (empty($error)) {
    $table = SESSIONYEAR . " set `session_year`='" . $session_year . "' where id='" . $year_id . "'";
    $recodes = $conf->updateValue($table);

    if ($recodes == true) {
      $success = "Record <strong>Updated</strong> Successfully";

      $gen->redirecttime('session-year-view.php', '2000');
    } else {
      $error = "Session Year Not Updated";
    }
  }
}
$table_fetch = SESSIONYEAR . " where id='" . $year_id . "'";
$row = $conf->singlev($table_fetch);
?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <form action="" method="post">
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                  <div class="form-group">
                    <label for="session_year"> Session</label>
                    <input type="text" class="form-control" id="session_year" value="<?php echo $row->session_year; ?>" name="session_year" tabindex="1" placeholder="" required>
                  </div>
                  <div class="text-center mt-2">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="2" />
                  </div>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>