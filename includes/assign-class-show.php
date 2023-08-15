<?php
$assign_id =  $_REQUEST[ 'CD' ] ;

// $results = $conf->singlev( ATTENDANCE . " WHERE id='" . $atten_id . "'" );
// // print_r ($results);
// $class = $conf->singlev( CLASStbl . " WHERE id='" . $results->class_name . "'" );
// $section = $conf->singlev( SECTION . " WHERE id='" . $results->section_name . "'" );
// $campus_name = $conf->singlev( CAMPUStbl . " WHERE id='" . $results->campus_name . "'" );


// $results = $conf->fetchall( CLASStbl );
// $results_1 = $conf->fetchall( COMPANIES );
// inner 
$sql = "SELECT a.*, c.class_name, p.campus_name
FROM ".ASSIGNCLASS." as a
INNER JOIN ".CLASStbl. " as c ON a.class_name = c.id

INNER JOIN ".CAMPUStbl." as  p ON a.campus = p.id
WHERE a.id = $assign_id";
$results1 = $conf->QueryRun($sql);
$results = $results1[0];

// print_r($sql);
?>


<div class="content">
  
      <div class="container">
        
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Assign Class To Campus
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="assign-class-view.php"> Back</a>
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
                 
              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>