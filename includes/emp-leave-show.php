<?php
$id =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( EMPleave . " WHERE id='" . $id . "'" );



?>


<div class="content">
  
      <div class="container">
        
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  <!-- Show Employee Leave -->
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="emp-leave-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Employee Leave:</dt>
                        <dd class="col-sm-6"><?php echo $results->campus_id; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->emp_id; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->leave_type_id; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->short_leave_hour; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->date_from; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->date_to; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->is_paid; ?></dd>
                        <dd class="col-sm-6"><?php echo $results->aproved_by; ?></dd>

                    </div>                                     
                   
                    
                  
                               
                  
                  
              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>