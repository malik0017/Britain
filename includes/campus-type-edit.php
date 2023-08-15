<?php
$campus_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $campus_type =$_POST[ 'campus_type' ];


if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }


    if ( empty( $error ) ) {

      $table = CAMPUSTYPE . " set `campus_type`='" . $campus_type . "' where id='" . $campus_id . "'";
      $recodes = $conf->updateValue( $table );
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'campus-type-view.php', '2000' );
      } 
      else {
        $error = "Campus Type Not Updated";
      }
      
    }

}
  
  $table_fetch = CAMPUSTYPE . " where id='" . $campus_id . "'";
$row = $conf->singlev( $table_fetch );
?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="post">
                   <div class="col-lg-4 col-md-4 col-sm-6">
                      
                        <div class="form-group">
                                <label for="campus_type"> Campus Type</label>
                                <input type="text" class="form-control" id="campus_type" value="<?php echo $row->campus_type; ?>" name="campus_type" tabindex="1" placeholder="" required>
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
   