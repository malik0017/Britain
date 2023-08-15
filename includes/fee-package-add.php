<?php

if ( isset( $_POST[ 'submit' ] ) ) {

$session_name = ($_POST[ 'session_id' ]);  
$campus = ($_POST[ 'campus' ]);
$class = ($_POST[ 'class' ]);
$actual_fee = ($_POST[ 'actual_fee' ]);
$fee_type = ($_POST[ 'fee_type' ]);

//  $val->name('Admission Detail ')->value($admission_detail)->pattern('text')->required();
//   $val->name('Commitment')->value($commitment)->pattern('text')->required();
//   $val->name('Reference Name')->value($reference)->pattern('words')->required();

if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
		$data_post = array( 'session_id' => $session_name, 'campus' => $campus, 'class' => $class, 'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, FEEDEFAULTPACKAGE );
		if ( $recodes == true ) {
			$success = "Data <strong>Added</strong> Successfully";
			
		}
 
    for($i=0;$i<=count($fee_type);$i++){
        if(!empty($actual_fee[$i])){
        $data_post = array('fee_default_pkg_id' => $recodes, 
        'fee_type' => $fee_type[$i],
        'actual_fee' => $actual_fee[$i],
        'created_at' => $cDateTime);
        $recodes2 = $conf->insert( $data_post, FEEDEFAULTPACKAGEDETAIL );
      }
    }
    //$gen->redirecttime( 'class', '2000' );

	}
}
$table_fetch = FEETYPE . " where id='" . $fee_type . "'";
$row = $conf->singlev( $table_fetch );
$fee_type=$conf->fetchall( FEETYPE . " WHERE is_deleted=0" );
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
                            <select class="form-select form-control" id="session_name" tabindex="2" name="session_id">
                              <?php foreach ($session_year as $data) { ?>
                                <option value="<?php echo $data->id; ?>"><?php echo $data->session_year; ?></option>
                              <?php  } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="campus" class="form-label ">Campus</label>
                                <select class="form-select form-control" id="campus" tabindex="1" name="campus"  required="" multiple>                                        
                                <?php foreach($campus_name as $data){ ?> 
                                  <option value="<?php echo $data->id; ?>" ><?php echo $data->campus_name; ?></option>
                                    <?php  }?>                         
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="class" class="form-label ">Class</label>
                        <select class="form-select form-control" id="class" tabindex="2" name="class" required="">                                        
                        <?php foreach($class as $data){ ?>     
                       <option value="<?php echo $data->id; ?>" ><?php echo $data->class_name; ?></option>
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
        <th>Fee Head</th>
        <th>Actual</th>
        <!-- <th>Concession</th> -->
      </tr>
    </thead>
    <tbody>
      
      <?php 
      $i=0;
      foreach($fee_type as $data){ ?> 
        <tr>
         <td><?php echo $data->fee_type;  ?></td> 
        <td><input type="number" name="actual_fee[]"/></td>
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
                              <input type="submit" name="submit" value="Clear" class="btn btn-warning " tabindex="10"/> 
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