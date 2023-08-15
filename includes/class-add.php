<?php
if ( isset( $_POST[ 'submit' ] ) ) {

  $class_name = ($_POST[ 'class_name' ]);
  $college = ($_POST[ 'college' ]);


  $val->name('Class Name')->value($class_name)->pattern('text')->required();
  

  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
		$data_post = array( 'class_name' => $class_name,'is_college' => $college, 'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, CLASStbl );
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
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="post">                
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12"><?php include('includes/messages.php')?></div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="form-group">
                                <label for="class_title" >Class </label>
                                <input type="text" class="form-control" id="class_title" name="class_name" tabindex="1" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 mt-5 ml-3">
                          <div class="form-check ">
                            <input type="checkbox" name="college" id="college" value="1" tabindex="2">
                            <label class="form-check-label font-weight-bold  ml-2" for="college" > Is College </label>
                          </div>
                          </div> 
                              </div>
                              <div class="text-center mt-2">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="5"/>
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