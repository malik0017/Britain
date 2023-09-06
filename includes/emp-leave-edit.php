<?php
$id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $campus_id =$_POST[ 'campus_id' ];
  $emp_id =$_POST[ 'emp_id' ];
  $leave_type_id =$_POST[ 'leave_type_id' ];
  $short_leave_hour =$_POST[ 'short_leave_hour' ];
  $date_from =$_POST[ 'date_from' ];
  $date_to =$_POST[ 'date_to' ];
  $is_paid =$_POST[ 'is_paid' ];
  $aproved_by =$_POST[ 'aproved_by' ];

//   $isliamic =$_POST[ 'isliamic' ];
//   $franchise = $_POST[ 'franchise' ];
//   $college = $_POST[ 'college' ];

if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	
    if ( empty( $error ) ) {

      $table = EMPleave . " set `employel_level`='" . $employel_level . "' where id='" . $id . "'";





      $recodes = $conf->updateValue( $table );
      
  
  
      if ( $recodes == true ) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        $gen->redirecttime( 'emp-leave-view.php', '2000' );
      } 
      else {
        $error = "Employee Leave Not Updated";
      }
      
    }
    
	}

  $sql = "SELECT *
  FROM ".EMPleave." 

  INNER JOIN ".CAMPUStbl. " ON ".EMPleave.".is_deleted = ".CAMPUStbl. ".id

  INNER JOIN ".STAFF. "  ON  ".EMPleave.".is_deleted = ".STAFF. ".id
 
  INNER JOIN ".LEAVE. " ON ".EMPleave.".is_deleted = ".LEAVE. ".id";

  // echo $sql;
$results = $conf->QueryRun($sql);












  $table_fetch = EMPleave . " where id='" . $id . "'";
$row = $conf->singlev( $table_fetch );
?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="post">
              <div class="col-lg-3  col-md-6 col-sm-6">
              <div class="form-group">
                                    <label for="campus_id" > Campus</label>
                                    <input type="text" class="form-control" id="campus_id" value="<?php echo $row->campus_name; ?>" name="campus_id" tabindex="1" placeholder="" required>
                                    
                                </div>
                            </div>

                       
				</div>
				<div id="staffkid" class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="employel_id" class="form-label">Staff</label>
                        <select class="form-select form-control" id="employel_id" value="<?php echo $row->employel_name; ?>" tabindex="42" name="employel_id">
                          <!-- Staff options will be dynamically populated here -->
                        </select>
                      </div>
                    </div>
                   

                  <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="form-group">
                     <label for="leave_type_id" class="form-label ">Leave</label>
                          <select class="form-select form-control" id="leave_type_id" tabindex="1" name="leave_type_id" required>
                        <?php foreach ($leave_type as $data) { ?>
                        <option value="<?php echo $data->id; ?>" ><?php echo $data->name; ?></option>
                    <?php  } ?>
                    </select>
                     </div>
                    </div>





                    <div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
 <label for="short_leave_hour" class="form-label ">Short Leave hour</label>

      <select class="form-select form-control" id="short_leave_hour" value="<?php echo $row->short_leave_hour; ?>" tabindex="1" name="short_leave_hour" required>
    
    <option >1 Hour</option>
    <option >2 Hour</option>
    <option >3 Hour</option>
    <option >4 Hour</option>
    <option >5 Hour</option>
    <option >6 Hour</option>
    <option >7 Hour</option>
    <option >8 Hour</option>
    <option >9 Hour</option>
    <!-- <option >1 Hour</option> -->


</select>
 </div>
</div>





<!-- <div class="col-lg-3 col-md-6 col-sm-6"> -->

<div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
  <label for="date_from" class="form-label ">From</label>
  <input type="date" class="form-control" id="date_from" value="<?php echo $row->date_from; ?>" name="date_from" tabindex="1" placeholder="" required>
</div>
</div>



<div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
  <label for="date_to" class="form-label ">To</label>
  <input type="date" class="form-control" id="date_to" value="<?php echo $row->date_to; ?>" name="date_to" tabindex="1" placeholder="" required>
</div>
</div>
                        <!-- </div> -->

     
                        

                        <div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
 <label for="is_paid" class="form-label ">Status</label>
      <select class="form-select form-control" id="is_paid" value="<?php echo $row->is_paid; ?>" tabindex="1" name="is_paid" required>
    
    <option >Unpaid</option>
    <option >Paid</option>



</select>
 </div>
</div>




                        <div class="col-lg-3 col-md-6 col-sm-6">

<div class="form-group">
  <label for="aproved_by" class="form-label ">Approved By</label>
  <textarea class="form-select form-control" id="aproved_by" value="<?php echo $row->approved_by; ?>" tabindex="1" name="aproved_by" placeholder="Enter Name here" required></textarea>
  <!-- <input type="text" class="form-control" id="approval" name="approval" tabindex="1" placeholder="" required> -->
</div>
</div>
















                          <div class="text-center mt-2">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="2"/>
                              </div>
                          </div>
                          </form>
                
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>