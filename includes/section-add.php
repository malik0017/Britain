<?php
if ( isset( $_POST[ 'submit' ] ) ) {

  $section_title = ($_POST[ 'section_title' ]);
 


  $val->name('Section title')->value($section_title)->pattern('text')->required();
  

  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
		$data_post = array( 'section_title' => $section_title, 'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, SECTION );
		if ( $recodes == true ) {
			$success = "Data <strong>Added</strong> Successfully";
			//$gen->redirecttime( 'class', '2000' );
		}
	}
}
?>


<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12"><?php include('includes/messages.php')?></div>
            <div class="col-lg-12 card card-primary card-outline">
              <div class="card-body">
              <form action="" method="POST">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="section_title" >Section</label>
                            <input type="text" class="form-control" id="section_title" name="section_title" tabindex="1" placeholder="" required>
                        </div>
                        </div>
                       
                    </div>
                    <div class="text-center mt-2">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="2"/>
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