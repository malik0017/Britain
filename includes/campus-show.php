<?php
$campus_id =  $_REQUEST[ 'CD' ] ;

// $results = $conf->singlev( CAMPUStbl . " WHERE id='" . $campus_id . "'" );

$sql = "SELECT a.*, c.campus_type
FROM ".CAMPUStbl." as a
INNER JOIN ".CAMPUSTYPE. " as c ON a.campus_type = c.id

WHERE a.id = $campus_id";
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
                  Show Campus
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="campus-view.php"> Back</a>
            </div>
              </div>
              <div class="row campus-image justify-content-end img-fluid p-3">
              <div class="p-3">
                        <img src="upload/campus/<?php echo $results->campus_logo; ?>" alt="" height="150" width="150"/>
                </div>
                <div class="p-3">
                        <img src="upload/campus/<?php echo $results->landscape_header; ?>" alt="" height="150" width="150"/>
                </div>
                <div class="p-3">
                        <img src="upload/campus/<?php echo $results->portrait_header; ?>" alt="" height="150" width="150"/>
                </div>
                <div class="p-3">
                        <img src="upload/campus/<?php echo $results->landscape_footer; ?>" alt="" height="150" width="150"/>
                </div>
                <div class="p-3 float-end">
                        <img src="upload/campus/<?php echo $results->portrait_footer; ?>" alt="" height="150" width="150"/>
                </div>
                </div>

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Campus Type:</dt>
                        <dd class="col-sm-6"><?php echo $results->campus_type; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Campus Name:</dt>
                       <dd class="col-sm-6"><?php echo $results->campus_name;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Campus Address:</dt>
                  <dd class="col-sm-6"> <?php echo $results->campus_address;  ?> </dd>
                  </div>
                  <!-- <div class="d-flex">
                    <dt class="col-sm-6">Campus Logo:</dt>
                    <dd class="col-sm-6"> <?php echo $results->campus_logo;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6">Landscape Header:</dt>
                    <dd class="col-sm-6"><?php echo $results->landscape_header;  ?>  </dd>
                     </div> 
                 
                </div>
                             
                  <div class="col-6 ">
                    <div class="d-flex">
                      <dt class="col-sm-6">Portrait Header:</dt>
                      <dd class="col-sm-6"> <?php echo $results->portrait_header;  ?> </dd>
                    </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Lanscape Footer:</dt>
                  <dd class="col-sm-6"><?php echo $results->landscape_footer;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6">Portrait Footer:</dt>
                    <dd class="col-sm-6"><?php echo $results->portrait_footer;  ?>  </dd>
                   </div>
                                -->
                  <div class="d-flex">
                  <dt class="col-sm-6">Is Franchise:</dt>
                  <dd class="col-sm-6"> <?php echo $results->franchise;  ?>  </dd>
                   </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Is College:</dt>
                  <dd class="col-sm-6">  <?php echo $results->college;  ?> </dd>
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