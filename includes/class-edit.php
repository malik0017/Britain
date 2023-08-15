<?php
$class_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $class_name = ($_POST[ 'class_name' ]);
  $college = ($_POST[ 'college' ]);


  $val->name('Class Name')->value($class_name)->pattern('text')->required();
  

  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	
    if ( empty( $error ) ) {

      $table = CLASStbl . " set `class_name`='" . $class_name . "',`is_college`='" . $college . "' where id='" . $class_id . "'";
      $recodes = $conf->updateValue( $table );
      
  
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'class-view.php', '2000' );
      } 
      else {
        $error = "Class Not Updated";
      }
      
    }
		
}
$table_fetch = CLASStbl . " where id='" . $class_id . "'";
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
                                <label for="class_title" >Class </label>
                                <input type="text" class="form-control" id="class_title"  value="<?php echo $row->class_name; ?>" name="class_name" tabindex="1" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 mt-5 ml-3">
                          <div class="form-check ">
                            <input type="checkbox" name="college" id="college" value="<?php echo $row->is_college; ?>" tabindex="2">
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