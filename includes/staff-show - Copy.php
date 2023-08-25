<?php
$shift_id =  $_REQUEST[ 'CD' ] ;


 $sql = "SELECT *  FROM ".SHIFTTIMING." WHERE id = $shift_id";
        //  echo "qwwwwwwwwwww".$sql;
        // print_r($sql);
        $results1 = $conf->QueryRun($sql);
        $results = $results1[0];
        //issues join campus ;
?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Shift Timing
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
                        <dd class="col-sm-6"><?php echo $results->shift_title; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6">User id:</dt>
                       <dd class="col-sm-6"><?php echo $results->user_id;  ?>  </dd>
                    </div>                                  
                </div>
                             
                <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Start Time:</dt>
                        <dd class="col-sm-6"><?php echo $results->start_time; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> End Time :</dt>
                       <dd class="col-sm-6"><?php echo $results->end_time;  ?>  </dd>
                    </div>                                  
                </div>

              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>