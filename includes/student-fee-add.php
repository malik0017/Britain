<?php
if (isset($_POST['submit'])) {

  $std_id = 56; //$_POST['std_id'];
  $month_fee = ($_POST['month_fee']);
  $month_image = ($_POST['month_image']);
  $student_free = ($_POST['student_free']);
  $fee_image = ($_POST['fee_image']);
  $staff_kid = ($_POST['staff_kid']);
  $stationary = ($_POST['stationary']);
  $admission_detail = ($_POST['admission_detail']);
  $commitment = ($_POST['commitment']);
  $reference = ($_POST['reference']);
  $conession_form = ($_POST['conession_form']);
  $fee_type = ($_POST['fee_type']);
  $actual_fee = ($_POST['actual_fee']);
  $concession_fee = ($_POST['concession_fee']);
  $package_payable = ($_POST['package_payable']);

  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }
  // 'conession_form' => $conession_form, 
  if (empty($error)) {
    $data_post = array(
      'std_id' => $std_id, 'month_fee' => $month_fee, 'month_image' => $month_image, 'student_free' => $student_free,
      'fee_image' => $fee_image, 'staff_kid' => $staff_kid, 'stationary' => $stationary, 'admission_detail' => $admission_detail,
      'commitment' => $commitment, 'reference' => $reference, 'conession_form' => $conession_form, 'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
    );
    $recodes = $conf->insert($data_post, STUDENTFEE);

    //student fee table entry
    for ($i = 0; $i < count($fee_type); $i++) {
      $data_post = array(
        'student_fee_id' => $recodes, 'fee_type' => $fee_type[$i],
        'actual_fee' => $actual_fee[$i], 'concession_fee' => $concession_fee[$i], 'package_payable' => $package_payable[$i],
        'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
      );
      $recodes2 = $conf->insert($data_post, STUDENTFEEDETAIL);
    }


    if ($recodes == true) {
      $success = "Data <strong>Added</strong> Successfully";
      //$gen->redirecttime( 'class', '2000' );
    }
  }
}

//-------Std session, campus, class

$std_session_id = 7;
$std_campus_id = 3;
$std_class_id = 10;

//$fee_type=$conf->fetchall( FEETYPE . " WHERE is_deleted=0" );
$campus_type = $conf->fetchall(CAMPUSTYPE . " WHERE is_deleted=0");
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
$routes = $conf->fetchall(ROUTE . " WHERE is_deleted=0");
$actual_fee = $conf->fetchall(ACTUALFEE . " WHERE is_deleted=0");


$sql = "SELECT fd.id, fd.fee_default_pkg_id, fd.fee_type, fd.actual_fee, ft.fee_type as fee_head FROM 
`fee_default_package_detail` fd INNER JOIN fee_type ft ON ft.id = fd.fee_type 
WHERE fee_default_pkg_id = (SELECT id FROM `fee_default_package` WHERE `session_id` = 
'" . $std_session_id . "' AND `campus` = '" . $std_campus_id . "' AND `class`= '" . $std_class_id . "');";
$fee_type = $conf->QueryRun($sql);
//------tbl_student

// $stdata = "SELECT std.id FROM tbl_student std 
// INNER JOIN student_fee_detail std_fd 
// on std_fd.std_id = std.id";
// $fee_typed = $conf->QueryRun($stdata);
// print_r($fee_typed);

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
                  <div class=" col-lg-12  ">
                    <h3 class=" "> Fee Package</h3>
                  </div>




                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <label class="form-check-label font-weight-bold  ml-2" for="month_fee"> 1 Month Fee Plan: </label>
                      <input type="checkbox" name="month_fee" id="month_fee" tabindex="34" value="1">

                    </div>
                  </div>

                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <input type="file" name="month_image" id="month_image" tabindex="35">

                    </div>
                  </div>

                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <label class="form-check-label font-weight-bold  ml-2" for="student_free"> Student Free: </label>
                      <input type="checkbox" name="student_free" id="student_free" tabindex="36" value="1">

                    </div>
                  </div>

                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <input type="file" name="fee_image" id="fee_image" tabindex="37">

                    </div>
                  </div>

                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">
                      <label class="form-check-label font-weight-bold  ml-2" for="staff_kid"> Staff Kid: </label>
                      <input type="checkbox" name="staff_kid" id="staff_kid" tabindex="38" value="1">

                    </div>
                  </div>

                  <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                    <div class="form-check ">

                      <label class="form-check-label font-weight-bold  ml-2" for="stationary"> Apply Stationary </label>
                      <input type="checkbox" name="stationary" id="stationary" tabindex="39" value="1">

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="admission_detail">Admission Deltail</label>
                      <input type="text" class="form-control" id="admission_detail" name="admission_detail" tabindex="40" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="commitment">Commitment if any</label>
                      <input type="text" class="form-control" id="commitment" name="commitment" tabindex="42" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="reference">Reference</label>
                      <input type="text" class="form-control" id="reference" name="reference" tabindex="43" placeholder="" required>

                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="conession_form" class="form-label">Conession Form </label>
                      <input class="form-control form-controll-style" type="file" id="conession_form" name="conession_form" tabindex="44">
                    </div>
                  </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12   ">
                <div id="tabledata_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                   
                      <tr>

                            <th style="width:5%">Fee Type </th>
                            <th style="width:8%">Actual</th>
                            <th style="width:1%">Concession</th>
                            <th style="width:10%">Package_payable</th>
                          
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $i = 1;
                      foreach ($fee_type as $data) { ?>
                        <?php

                        ?>
                        <tr>
                          <td><?php echo $data->fee_head;  ?></td>


                          <td><input type="number" class="actual_<?php echo $i; ?>" rownum="<?php echo $i; ?>"  name="actual_fee[]" value="<?php echo $data->actual_fee ?>" readonly /></td>
                          <td><input type="number" class="concession com_<?php echo $i; ?>"  rownum="<?php echo $i; ?>" name="concession_fee[]" /></td>

                          <td><input type="number" class="pkgpay_<?php echo $i; ?>" rownum="<?php echo $i; ?>" name="package_payable[]"readonly /></td>
                          <input type="hidden" name="fee_type[]" value="<?php echo $data->fee_type ?>" />
                        </tr>
                      <?php
                        // $package_payable[$i] = $actual_fee[$i] - $concession_fee[$i];
                        // echo "wwwwwwwwwwwwwwwwwww" . $package_payable[$i];
                        $i++;
                      }



                      ?>

                      </tr>



                    </tbody>
                  </table>
                  </div>



                </div>

              </div>
              <div class="text-center mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="45" />
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