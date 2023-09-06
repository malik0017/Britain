<?php
$id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $name = ($_POST[ 'name' ]);
  



  $val->name('Name')->value($name)->pattern('text')->required();
  

  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	
    if ( empty( $error ) ) {

      $table = LEAVE . " set `name`='" . $name . "' where id='" . $id . "'";
      $recodes = $conf->updateValue( $table );
      
  
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'leave-type-view.php', '2000' );
      } 
      else {
        $error = "Record Not Updated";
      }
      
    }
		
}
$table_fetch = LEAVE . " where id='" . $id . "'";
$row = $conf->singlev( $table_fetch );
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
                                <label for="class_title" >Name </label>
                                <input type="text" class="form-control" id="class_title"  value="<?php echo $row->name; ?>" name="name" tabindex="1" placeholder="" required>
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