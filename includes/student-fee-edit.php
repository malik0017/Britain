<?php
$student_fee_id =  $_REQUEST[ 'CD' ] ;

if ( isset( $_POST[ 'submit' ] ) ) {

  $month_fee = ($_POST[ 'month_fee' ])
  ;$month_image = ($_POST[ 'month_image' ])
  ;$student_free = ($_POST[ 'student_free' ]);
  $fee_image = ($_POST[ 'fee_image' ]);
  $staff_kid = ($_POST[ 'staff_kid' ]);
  $stationary = ($_POST[ 'stationary' ]);
  $admission_detail = ($_POST[ 'admission_detail' ]);
  $commitment = ($_POST[ 'commitment' ]);
  $reference = ($_POST[ 'reference' ]);
  $conession_form = ($_POST[ 'conession_form' ]);
  $fee_type = ($_POST[ 'fee_type' ]);
  $actual_fee = ($_POST[ 'actual_fee' ]);
  $concession_fee = ($_POST[ 'concession_fee' ]);
if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    $table = STUDENTFEE . " set `month_fee`='" . $month_fee . "', `month_image`='" . $month_image . "', 
    `student_free`='" . $student_free . "',
     `fee_image`='" . $fee_image . "', `staff_kid`='" . $staff_kid . "', `stationary`='" . $stationary . "',
      `admission_detail`='" . $admission_detail . "', `commitment`='" . $commitment . "', `reference`='" . $reference . "'
      , `conession_form`='" . $conession_form . "' where id='" . $fee_id . "'";
		$recodes = $conf->updateValue( $table );

		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";

			$gen->redirecttime( 'fee-package-view.php', '2000' );
		} 
    else {
			$error = "Fee Package Not Updated";
		}
    
		
	}
}
$table_fetch = STUDENTFEE . " where id='" . $student_fee_id . "'";
$row = $conf->singlev( $table_fetch );
$fee_type=$conf->fetchall( FEETYPE . " WHERE is_deleted=0" );
$campus_type=$conf->fetchall( CAMPUSTYPE . " WHERE is_deleted=0" );
$session_year=$conf->fetchall( SESSIONYEAR . " WHERE is_deleted=0" );
$class_name=$conf->fetchall( CLASStbl . " WHERE is_deleted=0" );
$section_title=$conf->fetchall( SECTION . " WHERE is_deleted=0" );
$routes=$conf->fetchall( ROUTE . " WHERE is_deleted=0" );
$actual_fee=$conf->fetchall( ACTUALFEE . " WHERE is_deleted=0" );
?>


<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="POST">
                
                <div class="card-body">
                    <div class="row">
                    <div class=" col-lg-12  ">
            <h3 class=" "> Fee Package</h3>
            </div>
          

            
           
         <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
         <div class="form-check ">
         <label class="form-check-label font-weight-bold  ml-2" for="month_fee" > 1 Month Fee Plan: </label>
                              <input type="checkbox" value="<?php echo $row->month_fee; ?>" name="month_fee" id="month_fee" tabindex="34" value="1">
                              
                            </div>
         </div>

         <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
         <div class="form-check ">
                              <input type="file" value="<?php echo $row->month_image; ?>" name="month_image" id="month_image" tabindex="35">
                              
                            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
          <div class="form-check ">
          <label class="form-check-label font-weight-bold  ml-2" for="student_free" > Student Free: </label>
                              <input type="checkbox" value="<?php echo $row->student_free; ?>" name="student_free" id="student_free" tabindex="36" value="1">
                              
                            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
          <div class="form-check ">
                              <input type="file" value="<?php echo $row->fee_image; ?>" name="fee_image" id="fee_image" tabindex="37" >
                              
                            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
          <div class="form-check ">
          <label class="form-check-label font-weight-bold  ml-2" for="staff_kid" > Staff Kid: </label>
                              <input type="checkbox" value="<?php echo $row->staff_kid; ?>" name="staff_kid" id="staff_kid" tabindex="38" value="1">
                              
                            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
          <div class="form-check ">

          <label class="form-check-label font-weight-bold  ml-2" for="stationary" > Apply Stationary </label>
            <input type="checkbox" value="<?php echo $row->stationary; ?>" name="stationary" id="stationary" tabindex="39" value="1">
                             
          </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="admission_detail">Admission Deltail</label>
                            <input type="text" class="form-control" id="admission_detail" value="<?php echo $row->admission_detail; ?>" name="admission_detail" tabindex="40" placeholder="" required>
                        </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="commitment">Commitment if any</label>
                                <input type="text" class="form-control" id="commitment" value="<?php echo $row->commitment; ?>" name="commitment" tabindex="42" placeholder="" required>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="reference" >Reference</label>
                                <input type="text" class="form-control" id="reference" value="<?php echo $row->reference; ?>" name="reference" tabindex="43" placeholder="" required>                                      
                                    
                        </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="conession_form" class="form-label">Conession Form </label>
                            <input class="form-control form-controll-style" type="file" id="conession_form" value="<?php echo $row->conession_form; ?>"  name="conession_form" tabindex="44">
                            </div>
                         </div>

                          </div>


        <div class="col-lg-12 col-md-6 col-sm-12   ">
                          <table class="table ">
    <thead>
      <tr class="col-lg-3 col-md-4 col-sm-12">
        <th>Fee Type</th>
        <th>Actual</th>
        <th>Concession</th>
      </tr>
    </thead>
    <tbody>
      
      <?php 
      $i=0;
      foreach($fee_type as $data){ ?> 
        <tr>
         <td><?php echo $data->fee_type;  ?></td> 
                                             
                                   
        <td><input type="number" value="<?php echo $row->actual_fee; ?>" name="actual_fee[]"/></td>
        <td><input type="number" value="<?php echo $row->concession_fee; ?>" name="concession_fee[]"/></td>
        <input type="hidden" value="<?php echo $row->fee_type; ?>" name="fee_type[]" value="<?php echo $data->id ?>"/>
      </tr> 
                    <?php 
    
                     $i++;
                           } ?>
      
                      </tr>

     

                            </tbody>
                            </table>
                            
                             
                      
                           </div>
                              </div >
                             <div class="text-center mt-2">
                        <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="45"/>
                        </div>
                        </div>
                   
                       
          
                <!-- /.card-body -->
            </form>
                
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>