<?php
$shift_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $shift_title = ($_POST[ 'shift_title' ]);
  $start_time = ($_POST[ 'start_time' ]);
  $end_time = ($_POST[ 'end_time' ]);


  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	
  if ( empty( $error ) ) {

    $table = SHIFTTIMING . " set `shift_title`='" . $shift_title . "', `start_time`='" . $start_time . "',
     `end_time`='" . $end_time . "' where id='" . $shift_id . "'";

		$recodes = $conf->updateValue( $table );

		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";

			// $gen->redirecttime( 'staff-view.php', '2000' );
		} 
    else {
			$error = "Staff Not Updated";
		}
    
		
	}
}
$table_fetch = SHIFTTIMING . " where id='" . $shift_id . "'";
$row = $conf->singlev( $table_fetch );
?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="POST">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="shift_title"> Shift Title</label>
                                <input type="text" class="form-control" id="shift_title" value="<?php echo $row->shift_title; ?>" name="shift_title" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="start_time" > Shift Start</label>
                                <input type="text" class="form-control" id="start_time" value="<?php echo $row->start_time; ?>" name="start_time" tabindex="3" placeholder="" required>                                          
                             </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="end_time"> Shift End </label>
                                <input type="text" class="form-control" id="end_time" value="<?php echo $row->end_time; ?>" name="end_time" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            </div>
                          
                              <div class="text-center mt-5">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="44"/>
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