<?php
if ( isset( $_POST[ 'search' ] ) ) {

	$campus = $_POST[ 'campus' ];
	
	$session_name = $_POST[ 'session_name' ];
	
	$class_name = $_POST[ 'class_name' ];
	$section_name = $_POST[ 'section_name' ];
  $defaulter = $_POST[ 'defaulter' ];

 $query = "" . Student . " as si INNER JOIN " . CLASStbl . " as sid ON si.id = sid.class_name WHERE si.id between 
   '$campus' AND '$session_name' ";
	$results = $conf->select( ' * ', $query );

  

// print_r($query);

}
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$class_name=$conf->fetchall( CLASStbl . " WHERE is_deleted=0" );
$session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");
$section_title=$conf->fetchall( SECTION . " WHERE is_deleted=0" );
$addmission_no=$conf->fetchall(Student." where  is_deleted = 0");
$name=$conf->fetchall(Student." where  is_deleted = 0");

// print_r($name);
// exit();
?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">



            <div class="card center1">
              <div class="card-header ">
                
              </div>
              <div class="">
                <form name="" action="" method="post">
                  <div class="row py-3">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="session_name" class="form-label ">Session</label>
                        <select class="form-select form-control" id="session_name" tabindex="3" name="session_name">
                          <?php foreach ($session_year as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->session_year; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <div class="form-group">
                        <label for="campus" class="form-label ">Campus</label>
                        <select class="form-select form-control" id="campus" tabindex="1" name="campus">
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="class_name" class="form-label ">Class</label>
                        <select class="form-select form-control" id="class_name" tabindex="2" name="class_name" required>                                        
                        <?php foreach($class_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->class_name; ?></option>
                            <?php  }?>                                           
                             
                            </select>
                           </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="section_name" class="form-label ">Section</label>
                            <select class="form-select form-control" id="section_name" tabindex="3" name="section_name" required>                                        
                            <?php foreach($section_title as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->section_title; ?></option>
                            <?php  }?>    
                                </select>
                               </div>
                          </div>
                         
                          <div class="col-lg-3 col-md-6 col-sm-6 mt-5">
                          
                    <div class="form-check">
                      <input type="checkbox" name="defaulter" id="defaulter" value="1" tabindex="9" >
                      <label class="form-check-label font-weight-bold   ml-2" for="defaulter" >Show Summary Report </label>
                    </div>
                    </div>
                     
                    <div class="text-center my-auto mx-auto">
                              <input type="submit" name="search" value="Preview Report" class="btn btn-warning " tabindex="8"/>
                             </div>
                             <!-- <div class="text-center my-auto mx-auto">
                              <input type="submit" name="submit" value="Export" class="btn btn-warning " tabindex="8"/>
                             </div> -->


                  </div>

                </form>

              </div>
              <!-- /.card-header -->
              <div class="card-body">



                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <th style="width:5%">Adm #</th>
                      <th style="width:10%">Student Name</th>
                      <th style="width:10%">Father Name</th>
                      <th style="width:10%">Contact</th>
                      <th style="width:5%">Fee</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   

                    foreach ($results as $data) {
                     
                    ?>
                      <tr>

                        <td><?= $data->addmission_no ?> </td>
                         
                         <td><?= $data->name ?></td> 
                          
                        
                         <td><?= $data->father_name ?></td> 
                         <td><?= $data->mobile_number ?></td>
                        <td> </td> 
                       
                       
                                                    <form action="" method="post">
                                                        <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">

                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                                                    </form>
                                                </td> -->


                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>