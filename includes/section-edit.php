<?php

$section_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $section_title = ($_POST[ 'section_title' ]);

  $val->name('Section title')->value($section_title)->pattern('text')->required();

  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

  if ( empty( $error ) ) {
    $table = SECTION . " set `section_title`='" . $section_title . "' where id='" . $section_id . "'";
      $recodes = $conf->updateValue( $table );
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'section-view.php', '2000' );
      } 
      else {
        $error = "Section Not Updated";
      }
  }
}
$table_fetch = SECTION . " where id='" . $section_id . "'";
$row = $conf->singlev( $table_fetch );
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
                            <input type="text" class="form-control" id="section_title" value="<?php echo $row->section_title; ?>" name="section_title" tabindex="1" placeholder="" required>
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