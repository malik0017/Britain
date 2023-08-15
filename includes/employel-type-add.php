<?php
if (isset($_POST['submit'])) {

  $employel_type = $_POST['employel_type'];
  $lunch_allowance = $_POST['lunch_allowance'];
  //   $isliamic =$_POST[ 'isliamic' ];
  //   $franchise = $_POST[ 'franchise' ];
  //   $college = $_POST[ 'college' ];

  if (!$val->isSuccess()) {

    $error = $val->displayErrors();
  }

  if (empty($error)) {

    $data_post = array('employel_type' => $employel_type,'lunch_allowance' => $lunch_allowance, 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime);
    $recodes = $conf->insert($data_post, EMPLOYETYE);
    if ($recodes == true) {
      $success = "Data <strong>Added</strong> Successfully";

      //$gen->redirecttime( 'campus', '2000' );
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
            <form action="" method="post">
              <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                  <label for="employel_type"> Employel Type</label>
                  <input type="text" class="form-control" id="employel_type" name="employel_type" tabindex="1" placeholder="" required>

                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                  <label for="lunch_allowance"> Lunch Allowance </label>
                  <input type="text" class="form-control" id="lunch_allowance" name="lunch_allowance" tabindex="2" placeholder="">

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