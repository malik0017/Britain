<?php
$fee_id  =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( FEETYPE . " WHERE id='" . $fee_id  . "'" );



?>


<div class="content">
  
      <div class="container">
        
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Fee Type
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="fee-type-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Fee Type:</dt>
                        <dd class="col-sm-6"><?php echo $results->fee_type; ?></dd>
                    </div>                                     
                    
              
              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>