<?php
$class_id =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( CLASStbl . " WHERE id='" . $class_id . "'" );
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
                  Show Class
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="class-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Class :</dt>
                        <dd class="col-sm-6"><?php echo $results->class_name; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Is College:</dt>
                       <dd class="col-sm-6"><?php echo $results->is_college;  ?>  </dd>
                    </div>
                    
                             
                  
                               
                  
              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>