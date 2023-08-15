<?php
$student=array();
$results1=array();
if (isset($_POST['submit'])) {

  $campus = ($_POST['campus']);
  $class_name = ($_POST['class_name']);
  $session_name = ($_POST['session_name']);
  $section_name = ($_POST['section_name']); 
  $results1 = $conf->fetchall(Student . " WHERE session_name = $session_name And campus = $campus 
  And class = $class_name And section_name = $section_name And is_deleted=0 ");

}

if (isset($_POST['update'])) {

  $class_name = ($_POST['p_class_name']);
  $session_name = ($_POST['p_session_name']);
  $section_name = ($_POST['p_section_name']); 
  $student = ($_POST['student']);
 
  foreach($student as $data){
    if (empty($error)) {

      $table = Student . " set `session_name`='" . $session_name . "', `class`='" . $class_name . "',
      `section_name`='" . $section_name . "' where id='" . $data . "'";
  
      $recodes = $conf->updateValue($table);
  
      if ($recodes == true) {
        $success = "Record <strong>Updated</strong> Successfully";
  
        // $gen->redirecttime( 'student-view.php', '2000' );
      } else {
        $error = "Student Not Updated";
      }
    }
  } 




 




  
  
}
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");
$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
$results = $conf->fetchall(Student . " where  is_deleted = 0");


?>

<div class="content">

  <div class="container">

    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>

        <div class="card card-primary card-outline">
          <div class="card-body">
           

              <div class="card-body">
              <form action="" method="POST">
                <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="session_name" class="form-label ">Session</label>
                            <select class="form-select form-control" id="session_name" tabindex="1" name="session_name" required>                                        
                            <?php foreach($session_year as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->session_year) {
                                                                    echo "selected";
                                                                  } ?> ><?php echo $data->session_year; ?></option>
                            <?php  }?>  
                                </select>
                               </div>
                          </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                          
                          <div class="form-group">
                            <label for="campus" class="form-label ">Campus</label>
                        <select class="form-select form-control" id="campus" tabindex="2" name="campus" required>                                        
                        <?php foreach($campus_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>"<?php if ($data->id == $row->campus_name) {
                                                                    echo "selected";
                                                                  } ?> ><?php echo $data->campus_name; ?></option>
                            <?php  }?> 
                            </select>
                    </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="class_name" class="form-label ">Class</label>
                        <select class="form-select form-control" id="class_name" tabindex="3" name="class_name" required>                                        
                        <?php foreach($class_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->class_name) {
                                                                    echo "selected";
                                                                  } ?> ><?php echo $data->class_name; ?></option>
                            <?php  }?>                                           
                             
                            </select>
                           </div>
                            </div>
                            
                            <div class="col-lg-2 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="section_name" class="form-label ">Section</label>
                            <select class="form-select form-control" id="section_name" tabindex="4" name="section_name" required>                                        
                            <?php foreach($section_title as $data){ ?> 
                          <option value="<?php echo $data->id; ?>"<?php if ($data->id == $row->section_title) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $data->section_title; ?></option>
                            <?php  }?>    
                                </select>
                               </div>
                          </div>
                          <div class="col-lg-2 col-md-6 col-sm-6 " style="margin-top: 35px;">
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">
                        Load
                      </button>
                    </div>
                  </div>
                  
                 
                </div>
                </form>
              </div>
              <?php 
              if(count($results1)>0)
              {
              ?>
              <div class="card-body">
              <form action="" id="promotedstd" method="POST">
              <div class="row">
              <div class="col-lg-2 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="p_session_name" class="form-label ">Promoted Session</label>
                            <select class="form-select form-control" id="p_session_name" tabindex="1" name="p_session_name" required>                                        
                            <?php foreach($session_year as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->session_year; ?></option>
                            <?php  }?>  
                                </select>
                               </div>
                          </div>
                
                        <div class="col-lg-2 col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="p_class_name" class="form-label ">Promoted Class</label>
                        <select class="form-select form-control" id="p_class_name" tabindex="2" name="p_class_name" required>                                        
                        <?php foreach($class_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->class_name; ?></option>
                            <?php  }?>                                           
                             
                            </select>
                           </div>
                            </div>
                           
                            <div class="col-lg-2 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="p_section_name" class="form-label ">Promoted Section</label>
                            <select class="form-select form-control" id="p_section_name" tabindex="3" name="p_section_name" required>                                        
                            <?php foreach($section_title as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->section_title; ?></option>
                            <?php  }?>    
                                </select>
                               </div>
                          </div>
                          
                  
                 
                </div>
                <hr>
                    <div class="bg-danger p-2 error-pkg" id="error-pkg" style="display:none">Please select at lest 1 Student</div>
              <table class="table ">
                  <thead>
                    <tr class="col-lg-2 col-md-4 col-sm-12">
                    <th width="2px"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                      <th>Admin#</th>
                      <th>Student Name</th>
                      <th>Father Name</th>
                      <th>Admission Date</th>
                      

                    </tr>
                  </thead>
                    <tbody>
                        <?php 
                        foreach($results1 as $data){
                          
                          ?>
                          <tr>
                          <td class=""><input class="case promot_required" type="checkbox" name="student[]" value="<?php echo $data->id;?>" /></td>
                          <td><?php echo $data->addmission_no ?></td>
                          <td><?php echo $data->name ?></td>
                          <td><?php echo $data->father_name ?></td>
                          <td><?php echo $data->created_at ?></td>
                        
                          </tr>
                      <?php } ?>
                    </tbody>
              </table>
              <div class="text-center mt-2 p-3">
                <input type="submit"  name="update" value="Update" class="btn btn-warning " tabindex="4" />

                <input type="reset" name="reset" value="Clear" class="btn btn-warning " tabindex="5" />
              </div>
              </div>
              
              
              
            </form>
              <!-- /.card-body -->
            
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

</div>