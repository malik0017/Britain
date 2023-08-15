<?php
$department_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $department =$_POST[ 'department' ];


if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    $table = DEPARTMENT . " set `department`='" . $department . "' where id='" . $department_id . "'";
      $recodes = $conf->updateValue( $table );
      
  
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'department-view.php', '2000' );
      } 
      else {
        $error = "Department Not Updated";
      }
  }
		
	}
  $table_fetch = DEPARTMENT . " where id='" . $department_id . "'";
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
                                            <label for="department" > Department</label>
                                            <input type="text" class="form-control" id="department"  value="<?php echo $row->department; ?>" name="department" tabindex="1" placeholder="" required>
                                            
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