<?php
if ( isset( $_POST[ 'submit' ] ) ) {

  $fee_type =$_POST[ 'fee_type' ];
  // $van_charge =$_POST[ 'van_charge' ];
  // $resourse = $_POST[ 'resourse' ];
  // $registration_fee = $_POST[ 'registration_fee' ];
  // $admission_fee =$_POST[ 'admission_fee' ];
  // $security_deposit =$_POST[ 'security_deposit' ];
  // $re_voching_fee = $_POST[ 're_voching_fee' ];
  // $re_admission_fee = $_POST[ 're_admission_fee' ];

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    
		$data_post = array( 'fee_type' => $fee_type, 'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, FEETYPE );
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
                          <div class="card-body">
                           <div class="row">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="fee_type">Fee Head</label>
                                <input type="text" class="form-control" id="fee_type" name="fee_type" tabindex="1" placeholder="" required>
                            </div>
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