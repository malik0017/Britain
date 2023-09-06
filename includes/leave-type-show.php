

<?php
$id =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( LEAVE . " WHERE id='" . $id . "'" );
// $class_name = $conf->singlev( class_title . " WHERE id='" . $results->class_name . "'" );
// $is_college = $conf->singlev( is_college . " WHERE id='" . $results->is_college . "'" );



?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Record
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="leave-type-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Name :</dt>
                        <dd class="col-sm-6"><?php echo $results->name; ?></dd>
                    </div>                                     
                    
                    
                             
                  
                               
                  
              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>




















