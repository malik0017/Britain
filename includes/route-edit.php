<?php
$route_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $routes =$_POST[ 'routes' ];
//   $isliamic =$_POST[ 'isliamic' ];
//   $franchise = $_POST[ 'franchise' ];
//   $college = $_POST[ 'college' ];

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	
    if ( empty( $error ) ) {
      $table = ROUTE . " set `routes`='" . $routes . "' where id='" . $route_id . "'";
        $recodes = $conf->updateValue( $table );
    
        if ( $recodes == true ) {
          $success = "Record <strong>Updated</strong> Successfully";
    
          $gen->redirecttime( 'route-view.php', '2000' );
        } 
        else {
          $error = "Route Not Updated";
        }
    }
	}
  $table_fetch = ROUTE . " where id='" . $route_id . "'";
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
                        <div class="form-group">
                                <label for="routes">Routes Name</label>
                                <input type="text" class="form-control" value="<?php echo $row->routes; ?>" id="routes" name="routes" tabindex="1" placeholder="" required>
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