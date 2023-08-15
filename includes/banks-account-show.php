<?php
$banks_account_id =  $_REQUEST[ 'CD' ] ;

// $results = $conf->singlev( BANKACCOUNT . " WHERE id='" . $banks_account_id . "'" );

$sql = "SELECT a.*, c.campus_name
FROM ".BANKACCOUNT." as a
INNER JOIN ".CAMPUStbl. " as c ON a.campus = c.id

WHERE a.id = $banks_account_id";
$results1 = $conf->QueryRun($sql);
$results = $results1[0];
//  print_r($sql);
?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Banks Account Information
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="banks-account-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Campus :</dt>
                        <dd class="col-sm-6"><?php echo $results->campus_name; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Bank:</dt>
                       <dd class="col-sm-6"><?php echo $results->bank_name;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6"> Account Title:</dt>
                  <dd class="col-sm-6"> <?php echo $results->account_title;  ?> </dd>
                  </div>
                  <div class="d-flex">
                    <dt class="col-sm-6">Account No:</dt>
                    <dd class="col-sm-6"> <?php echo $results->account_no;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6">Branch Name:</dt>
                    <dd class="col-sm-6"><?php echo $results->branch_name;  ?>  </dd>
                     </div> 
                 
                </div>
                             
                  <div class="col-6 ">
                    <div class="d-flex">
                      <dt class="col-sm-6">Branch Code:</dt>
                      <dd class="col-sm-6"> <?php echo $results->branch_code;  ?> </dd>
                    </div>
                    <div class="d-flex">
                      <dt class="col-sm-6">Note:</dt>
                      <dd class="col-sm-6"> <?php echo $results->note;  ?> </dd>
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