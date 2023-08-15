<?php
$fee_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $fee_type =$_POST[ 'fee_type' ];
  

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }
  if ( empty( $error ) ) {

    $table = FEETYPE . " set `fee_type`='" . $fee_type .  "' where id='" . $fee_id . "'";
		$recodes = $conf->updateValue( $table );

		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";

			$gen->redirecttime( 'fee-type-view.php', '2000' );
		} 
    else {
			$error = "Fee Not Updated";
		}
	}
	}
  $table_fetch = FEETYPE . " where id='" . $fee_id . "'";
$row = $conf->singlev( $table_fetch );
?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
                          <div class="card-body">
                          <form action="" method="post">
                          <div class="card-body">
                           <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="fee_type">Fee Type</label>
                                <input type="text" class="form-control" id="fee_type" value="<?php echo $row->fee_type; ?>" name="fee_type" tabindex="1" placeholder="" required>
                            </div>
                            </div>
                          </div>
                        
                        
                        
                         <div class="text-center mt-2">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="2"/>
                              </div>
                        </div>
                        
                          </form>
                          
                
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>