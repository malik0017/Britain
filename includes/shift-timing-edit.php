<?php
$shift_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $ShiftName = ($_POST[ 'ShiftName' ]);
  $StartTime = ($_POST[ 'StartTime' ]);
  $EndTime = ($_POST[ 'EndTime' ]);
  $StartTime1 = ($_POST[ 'StartTime1' ]);
  $EndTime1 = ($_POST[ 'EndTime1' ]);
  $StartTime2 = ($_POST[ 'StartTime2' ]);
  $EndTime2 = ($_POST[ 'EndTime2' ]);


  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	
  if ( empty( $error ) ) {

     $table = SHIFTTIMING . " set `ShiftName`='" . $ShiftName . "', `StartTime`='" . $StartTime . "',
     `EndTime`='" . $EndTime . "', `StartTime1`='" . $StartTime1 . "',
     `EndTime1`='" . $EndTime1 . "', `StartTime2`='" . $StartTime2 . "',
     `EndTime2`='" . $EndTime2. "'
      where ShiftID='" . $shift_id . "'";

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
$table_fetch = SHIFTTIMING . " where ShiftID='" . $shift_id . "'";
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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="ShiftName"> Shift Title</label>
                                <input type="text" class="form-control" id="ShiftName" value="<?php echo $row->ShiftName; ?>" name="ShiftName" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="StartTime" > Shift Start</label>
                                <input type="time" class="form-control" id="StartTime" value="<?php echo $row->StartTime; ?>" name="StartTime" tabindex="3" placeholder="" required>                                          
                             </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="EndTime"> Shift End </label>
                                <input type="time" class="form-control" id="EndTime" value="<?php echo $row->EndTime; ?>" name="EndTime" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="StartTime1" > Shift Start 01</label>
                                <input type="time" class="form-control" id="StartTime1" value="<?php echo $row->StartTime1; ?>" name="StartTime1" tabindex="3" placeholder="" required>                                          
                             </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="EndTime1"> Shift End 01 </label>
                                <input type="time" class="form-control" id="EndTime1" value="<?php echo $row->EndTime1; ?>" name="EndTime1" tabindex="2" placeholder="" required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="StartTime2" > Shift Start 02</label>
                                <input type="time" class="form-control" id="StartTime2" value="<?php echo $row->StartTime2; ?>" name="StartTime2" tabindex="3" placeholder="" required>                                          
                             </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="EndTime2"> Shift End 02</label>
                                <input type="time" class="form-control" id="EndTime2" value="<?php echo $row->EndTime2; ?>" name="EndTime2" tabindex="2" placeholder="" required>
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