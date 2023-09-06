<?php
if ( isset( $_POST[ 'submit' ] ) ) {

  $name =$_POST[ 'name' ];
//   $isliamic =$_POST[ 'isliamic' ];
//   $franchise = $_POST[ 'franchise' ];
//   $college = $_POST[ 'college' ];

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    
		$data_post = array( 'name' => $name, 'id' => $_SESSION[ 'user_reg' ],'creates_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, LEAVE );
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
                   <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="form-group">
                        <div class="form-group">
                                <label for="campus_type"> Name</label>
                                <input type="text" class="form-control" id="name" name="name" tabindex="1" placeholder="" required>
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















  