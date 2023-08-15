<?php

$bank_id =  $_REQUEST['CD'];
if (isset($_POST['submit'])) {

  $bank_name = ($_POST['bank_name']);
  // $banks_logo = ($_POST['banks_logo']);

  //Banks logo image 
  $site_favicon = $_FILES[ "banks_logo" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'banks_logo' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "asssss".$site_favicon;
	move_uploaded_file( $_FILES[ "banks_logo" ][ "tmp_name" ], "upload/campus/" . $_FILES[ "banks_logo" ][ "name" ] );
	$banks_logo = $_FILES[ "banks_logo" ][ "name" ];
//  echo "=====".$banks_logo;
 

  $val->name('Bank Name')->value($bank_name)->pattern('text')->required();

  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }

  if (empty($error)) {
    $table = BANK . " set `bank_name`='" . $bank_name . "',`banks_logo`='" . $banks_logo . "' where id='" . $bank_id . "'";
    $recodes = $conf->updateValue($table);

    if ($recodes == true) {
      $success = "Record <strong>Updated</strong> Successfully";

      $gen->redirecttime('section-view.php', '2000');
    } else {
      $error = "Section Not Updated";
    }
  }
}
$table_fetch = BANK . " where id='" . $bank_id . "'";
$row = $conf->singlev($table_fetch);
?>


<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12"><?php include('includes/messages.php') ?></div>
      <div class="col-lg-12 card card-primary card-outline">
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" class="form-control" id="bank_name" value="<?php echo $row->bank_name; ?>" name="bank_name" tabindex="1" placeholder="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="form-group">
                    <label for="banks_logo" class="form-label">Bank Logo </label>
                    <input class="form-control form-controll-style" type="file" id="banks_logo"
                     value="<?php echo $row->banks_logo; ?>"<?php if ($data->id == $row->banks_logo) {
                          echo "selected";} ?> name="banks_logo" tabindex="2" required>
                          
                          <img src="upload/student/<?php echo $row->banks_logo; ?>" alt="" height="100" width="100"/>
                          
                  </div>
                </div>

              </div>
              <div class="text-center mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="3" />
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