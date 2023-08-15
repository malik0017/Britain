<?php
$bank_id =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( BANK . " WHERE id='" . $bank_id . "'" );
?>

<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Bank
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="banks-view.php"> Back</a>
            </div>
              </div>

              <div class="row campus-image justify-content-end img-fluid p-3">
                        <img src="upload/student/<?php echo $results->banks_logo; ?>" alt="" height="150" width="150"/>
                </div>
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Bank Name:</dt>
                        <dd class="col-sm-6"><?php echo $results->bank_name; ?></dd>
                    </div> 
                    <!-- <div class="d-flex">
                        <dt class="col-sm-6">Bank Logo:</dt>
                        <dd class="col-sm-6"><?php echo $results->banks_logo; ?></dd>
                    </div>                                      -->
                    
                    
                             
                  
                               
                  
              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>