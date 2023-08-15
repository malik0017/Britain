<?php
$student_fee_id =  $_REQUEST[ 'CD' ] ;

$results = $conf->singlev( STUDENTFEE . " WHERE id='" . $student_fee_id . "'" );
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
                  Show Fee Package
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="student-fee-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                  <div class="d-flex">
                       <dt class="col-sm-6"> Month Fee Plan:</dt>
                       <dd class="col-sm-6"><?php echo $results->month_fee;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                       <dt class="col-sm-6"> Free Student Form:</dt>
                       <dd class="col-sm-6"><?php echo $results->student_free;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                       <dt class="col-sm-6"> Staff Kid :</dt>
                       <dd class="col-sm-6"><?php echo $results->staff_kid;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                       <dt class="col-sm-6">  Apply Stationary :</dt>
                       <dd class="col-sm-6"><?php echo $results->stationary;  ?>  </dd>
                    </div>
                     </div>

                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Admission Deltail:</dt>
                        <dd class="col-sm-6"><?php echo $results->admission_detail; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Commitment if any:</dt>
                       <dd class="col-sm-6"><?php echo $results->commitment;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                       <dt class="col-sm-6"> Reference:</dt>
                       <dd class="col-sm-6"><?php echo $results->reference;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                       <dt class="col-sm-6"> Conession Form:</dt>
                       <dd class="col-sm-6"><?php echo $results->conession_form;  ?>  </dd>
                    </div>
                
              </div>
              </div>
              </div>



              </div>
              <!-- /.card-body -->
            </div>
            </div>  

        
      </div><!-- /.container-fluid -->
    </div>