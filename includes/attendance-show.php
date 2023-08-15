<?php
$atten_id =  $_REQUEST[ 'CD' ] ;

// $results = $conf->singlev( ATTENDANCE . " WHERE id='" . $atten_id . "'" );
// // print_r ($results);
// $class = $conf->singlev( CLASStbl . " WHERE id='" . $results->class_name . "'" );
// $section = $conf->singlev( SECTION . " WHERE id='" . $results->section_name . "'" );
// $campus_name = $conf->singlev( CAMPUStbl . " WHERE id='" . $results->campus_name . "'" );


// $results = $conf->fetchall( CLASStbl );
// $results_1 = $conf->fetchall( COMPANIES );
// inner 
$sql = "SELECT a.*, c.class_name, s.section_title, p.campus_name
FROM ".ATTENDANCE." as a
INNER JOIN ".CLASStbl. " as c ON a.class_name = c.id
INNER JOIN ". SECTION." as s ON a.section_name = s.id
INNER JOIN ".CAMPUStbl." as  p ON a.campus = p.id
WHERE a.id = $atten_id";
$results1 = $conf->QueryRun($sql);
$results = $results1[0];

?>


<div class="content">
  
      <div class="container">
        
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Attendance
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="attendance-view.php"> Back</a>
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
                       <dt class="col-sm-6">Class</dt>
                       <dd class="col-sm-6"><?php echo $results->class_name;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Section Name:</dt>
                  <dd class="col-sm-6"> <?php echo $results->section_title;  ?> </dd>
                  </div>
                  <div class="d-flex">
                    <dt class="col-sm-6">Attendance Date:</dt>
                    <dd class="col-sm-6">
                    <?php echo date("d-m-Y", strtotime($results->attendance_date)); ?></dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6">Remarks:</dt>
                    <dd class="col-sm-6"><?php echo $results->remarks;  ?>  </dd>
                     </div> 
                 
                </div>
                             
                  <div class="col-6 ">
                    <div class="d-flex">
                      <dt class="col-sm-6">Teacher Absent:</dt>
                      <dd class="col-sm-6"> <?php echo $results->teacher_absent;  ?> </dd>
                    </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Is Holiday:</dt>
                  <dd class="col-sm-6"> <?php echo $results->is_holiday;  ?>  </dd>
                   </div>
                   
                   

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>