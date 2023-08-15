<?php
$employle_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $employel_level =$_POST[ 'employel_level' ];
//   $isliamic =$_POST[ 'isliamic' ];
//   $franchise = $_POST[ 'franchise' ];
//   $college = $_POST[ 'college' ];

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	
    if ( empty( $error ) ) {

      $table = EMPLOYELEVEL . " set `employel_level`='" . $employel_level . "' where id='" . $employle_id . "'";
      $recodes = $conf->updateValue( $table );
      
  
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'employel-level-view.php', '2000' );
      } 
      else {
        $error = "Employee Level Not Updated";
      }
      
    }
    
	}
  $table_fetch = EMPLOYELEVEL . " where id='" . $employle_id . "'";
$row = $conf->singlev( $table_fetch );
?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="post">
              <div class="col-lg-3  col-md-6 col-sm-6">
              <div class="form-group">
                                    <label for="employel_level" > Employel Level</label>
                                    <input type="text" class="form-control" id="employel_level" value="<?php echo $row->employel_level; ?>" name="employel_level" tabindex="1" placeholder="" required>
                                    
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