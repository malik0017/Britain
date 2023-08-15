<?php
$atten_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $campus_type = ($_POST[ 'campus_type' ]);
  $class_name = ($_POST[ 'class_name' ]);
  $session_name = ($_POST[ 'session_name' ]);
  $section_name = ($_POST[ 'section_name' ]);
  $attendance_date = ($_POST[ 'attendance_date' ]);
  $remarks = ($_POST[ 'remarks' ]);
  $teacher_absent = ($_POST[ 'teacher_absent' ]);
  $holiday = ($_POST[ 'holiday' ]);


  $val->name('Campus type')->value($campus_type)->pattern('text')->required();
  $val->name('Class name')->value($class_name)->pattern('text')->required();
  $val->name('Section name')->value($section_name)->pattern('text')->required();
 
 

  if(!$val->isSuccess()){
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    $table = ATTENDANCE . " set `campus_type`='" . $campus_type . "', `class_name`='" . $class_name . "', `session_name`='" . $session_name . "',
    `section_name`='" . $section_name . "', `teacher_absent`='" . $teacher_absent . "', `is_holiday`='" . $holiday . "' where id='" . $atten_id . "'";
   $recodes = $conf->updateValue( $table );

		
		if ( $recodes == true ) {
			$success = "Data <strong>Added</strong> Successfully";
			//$gen->redirecttime( 'class', '2000' );
		}
	}
}
$table_fetch = ATTENDANCE . " where id='" . $atten_id . "'";
$row = $conf->singlev( $table_fetch );
$class=$conf->fetchall( CLASStbl . " WHERE is_deleted=0" );
$campus=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );
$section=$conf->fetchall( SECTION . " WHERE is_deleted=0");
$session_year=$conf->fetchall( SESSIONYEAR . " WHERE is_deleted=0" );
$campus_type=$conf->fetchall( CAMPUSTYPE . " WHERE is_deleted=0" );

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
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          
                          <div class="form-group">
                            <label for="campus_type" class="form-label ">Campus Type</label>
                        <select class="form-select form-control" id="campus_type" tabindex="1" name="campus_type" required>  
                        <?php foreach($campus_type as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if($data->id==$row->campus_type){ echo "selected";} ?>><?php echo $data->campus_type; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                    </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="class_name" class="form-label ">Class</label>
                            <select class="form-select form-control" id="class_name" tabindex="2" name="class_name" required> 
                            <?php foreach($class as $data){ ?>
                                                            
                                                                
                                <option value="<?php echo $data->id; ?>" <?php if($data->id==$row->class_name){ echo "selected";} ?>><?php echo $data->class_name; ?></option>
                            <?php  }?>
                            </select>
                           </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="session_name" class="form-label ">Session Name</label>
                            <select class="form-select form-control" id="session_name" tabindex="3" name="session_name" required>                                        
                                <?php foreach($session_year as $data){ ?>
                                                            
                                                                
                               <option value="<?php echo $data->id; ?>" <?php if($data->id==$row->session_name ){ echo "selected";} ?>>
                               <?php echo $data->session_year; ?></option>
                               <?php  }?>
                                </select>
                               </div>
                          </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="section_name" class="form-label ">Section Name</label>
                            <select class="form-select form-control" id="section_name" tabindex="3" name="section_name" required>  
                            <?php foreach($section as $data){ ?> 
                                                               
                              <option value="<?php echo $data->id; ?>" <?php if($data->id==$row->section_name){ echo "selected";} ?>><?php echo $data->section_title; ?></option>
                            <?php  }?>                                     
                                    
                        
                                </select>
                               </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="attendance_date">Attendance Date</label>
                           <input type="date" class="form-control" value="<?php echo $row->attendance_date; ?>" id="attendance_date" name="attendance_date"  tabindex="4" placeholder="" required>
                          
                          </div>
                       </div>
                       <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="form-group">
                                <label for="remarks" >Remarks</label>
                                <input type="text" class="form-control" id="remarks" value="<?php echo $row->remarks; ?>" name="remarks" tabindex="5" placeholder="" required>
                            </div>
                        </div>
                          <div class="col-lg-3 col-md-4 col-sm-6 mt-5 ml-3">
                            <div class="form-check ">
                              <input type="checkbox" name="teacher_absent" value="<?php echo $row->remarks; ?>" id="teacher_absent" tabindex="6">
                              <label class="form-check-label font-weight-bold  ml-2" for="teacher_absent" >Teacher Absent </label>
                            </div>
                            </div> 
                            <div class="col-lg-3 col-md-4 col-sm-6 mt-5 ml-3">
                              <div class="form-check ">
                                <input type="checkbox" name="is_holiday"  value="1" id="is_holiday" tabindex="7">
                                <label class="form-check-label font-weight-bold  ml-2" for="is_holiday" >Is Holiday </label>
                              </div>
                              </div> 
                              </div >
                              <div class="text-center mt-2">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="8"/>

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