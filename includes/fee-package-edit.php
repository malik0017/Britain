<?php
$package_id =  $_REQUEST[ 'CD' ] ;

if ( isset( $_POST[ 'submit' ] ) ) {
  $session_name = ($_POST[ 'session_id' ]); 
  $campus = ($_POST[ 'campus' ]);
  $class = ($_POST[ 'class' ]);
  $actual_fee = ($_POST[ 'actual_fee' ]);
  
  
  $fee_type = ($_POST[ 'fee_type' ]);
  
if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    $table = FEEDEFAULTPACKAGE . " set `session_id`='" . $session_name . "',`campus`='" . $campus . "', `class`='" . $class . "', `actual_fee`='" . $actual_fee . "',
      `fee_type`='" . $fee_type ."' where id='" . $package_id . "'";
		$recodes = $conf->updateValue( $table );
    // print_r($recodes);
    // exit();
    $tabledata = FEEDEFAULTPACKAGEDETAIL . " set `actual_fee`='" . $actual_fee ;

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
$table_fetch = FEEDETAIL . " where id='" . $package_id . "'";
$row = $conf->singlev( $table_fetch );

// $table_fetch = FEETYPE . " where id='" . $fee_type . "'";
// $row = $conf->singlev( $table_fetch );
// print_r($table_fetch);
$fee_type=$conf->fetchall( FEETYPE . " WHERE is_deleted=0" );
// print_r($fee_type);
$campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );
$class=$conf->fetchall( CLASStbl . " WHERE is_deleted=0" );
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");


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
                    <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                        <label for="session_name" class="form-label ">Session</label>
                        <select class="form-select form-control" id="session_name" tabindex="2" name="session_name">
                        <?php foreach ($session_year as $data) { ?>
                        <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->session_name) {
                        echo "selected"; } ?>><?php echo $data->session_year; ?>
                        </option>
                      <?php  } ?>
                        </select>
                      </div>
                      </div>
                   
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                            <label for="campus" class="form-label ">Campus</label>
                        <select class="form-select form-control" id="campus" tabindex="1" name="campus"  required="">                                        
                        <?php foreach($campus_name as $data){ ?> 
                                  <option value="<?php echo $data->id; ?>"<?php if($data->id==$row->campus_name){ echo "selected";} ?>>
                                  <?php echo $data->campus_name; ?></option>
                                    <?php  }?>                                     
                                                                   
                            </select>
                            </div>
                            </div>
                           
                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                            <label for="class" class="form-label ">Class</label>
                        <select class="form-select form-control" id="class" tabindex="2" name="class" required="">                                        
                        <?php foreach($class as $data){ ?>
                                                            
                                                                
                       <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->class_name) {
                        echo "selected"; } ?> ><?php echo $data->class_name; ?></option>
                       <?php  }?>                                 
                                

                               
                            </select>
                            </div>
                            </div>

          <div class="col-lg-12 ">
            <div class="p-2  border border-primary">
            <h5 class=" "> Fee Package</h5>
            </div>          
        </div>
      
       <div class="col-lg-12 col-md-4 col-sm-6  ">
       <table class="table">    <thead>
      <tr>
        <th>Fee Type</th>
        <th>Actual</th>
        <!-- <th>Concession</th> -->
      </tr>
    </thead>
    <tbody>
      
      <?php 
      $i=0;
      foreach($fee_type as $data){ 
        
        ?> 
        <tr>
         <td><?php echo $data->fee_type;  ?></td> 
        <td><input type="number" value="<?php echo $data->actual_fee ?>" name="actual_fee[]"/></td>
        
        <!-- <td><input type="number" value="<?php echo $data->concession_fee ?>" name="concession_fee[]"/></td> -->
        <input type="hidden" name="fee_type[]" value="<?php echo $data->id ?>"/>
      </tr> 
      <?php 
    
    $i++;
    } ?>

    </tbody>
  </table>
                            </div>
                       
                              </div >
 <div class="text-center mt-2 ">
 <input type="submit" name="submit" value="Save" class="btn btn-warning " tabindex="10"/>
   <!-- <input type="submit" name="submit" value="Clear" class="btn btn-warning " tabindex="10"/>  -->
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