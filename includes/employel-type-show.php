<?php
$emply_id =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( EMPLOYETYE . " WHERE id='" . $emply_id . "'" );



?>


<div class="content">
  
      <div class="container">
        
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  New Employel Type
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="employel-type-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex">
                        <dt class="col-sm-6">Employel Type:</dt>
                        <dd class="col-sm-6"><?php echo $results->employel_type; ?></dd>
                    </div> 
                    </div>                                    
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Lunch Allowance:</dt>
                        <dd class="col-sm-6"><?php echo $results->lunch_allowance; ?></dd>
                    </div>                                     
               
              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>