<?php
if ( isset( $_POST[ 'submit' ] ) ) {

  $employel_level =$_POST[ 'employel_level' ];
//   $isliamic =$_POST[ 'isliamic' ];
//   $franchise = $_POST[ 'franchise' ];
//   $college = $_POST[ 'college' ];

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    
		$data_post = array( 'employel_level' => $employel_level, 'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, EMPLOYELEVEL );
		if ( $recodes == true ) {
			$success = "Data <strong>Added</strong> Successfully";

			//$gen->redirecttime( 'campus', '2000' );
		}
    }
	}
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
                                    <input type="text" class="form-control" id="employel_level" name="employel_level" tabindex="1" placeholder="" required>
                                    
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