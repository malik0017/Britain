<?php
$shift_id =  $_REQUEST[ 'CD' ] ;
       
    $table_fetch = SHIFTTIMING . " where ShiftID='" . $shift_id . "'";
    $results = $conf->singlev( $table_fetch );

?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Staff Timing Show
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="shift-timing-view.php"> Back</a>
            </div>
              </div>
            
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Shift Title:</dt>
                        <dd class="col-sm-6"><?php echo $results->ShiftName; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Start Timing:</dt>
                       <dd class="col-sm-6"><?php echo $results->StartTime;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">End Timing:</dt>
                  <dd class="col-sm-6"> <?php echo $results->EndTime;  ?> </dd>
                  </div>
                  

                    
                 
                </div>
                             
                  <div class="col-6 ">
                   
                  <div class="d-flex">
                    <dt class="col-sm-6"> Start Timing1:</dt>
                    <dd class="col-sm-6"> <?php echo $results->StartTime1;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> End Timing1:</dt>
                    <dd class="col-sm-6"><?php echo $results->EndTime1;  ?>  </dd>
                     </div> 
                     <div class="d-flex">
                      <dt class="col-sm-6">Start Timing2:</dt>
                      <dd class="col-sm-6"> <?php echo $results->StartTime2;  ?> </dd>
                    </div>
                    <div class="d-flex">
                      <dt class="col-sm-6">End Timing2:</dt>
                      <dd class="col-sm-6"> <?php echo $results->EndTime2;  ?> </dd>
                    </div>

                   </div>
              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>