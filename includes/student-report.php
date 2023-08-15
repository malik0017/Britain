<?php
//delete record
if (isset($_POST['deleteid'])) {
  $deleteid = $_POST['deleteid'];
  //delete From Database
  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = Student . " set `is_deleted`= 1  where id='" . $deleteid . "'";
  $flagmain = $conf->updateValue($table);
  if ($flagmain) {
    $success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
  }
}
$results = $conf->fetchall(Student . " where  is_deleted = 0");

// $fee_type=$conf->fetchall( STUDENTFEE . " WHERE is_deleted=0" );
// $campus_type=$conf->fetchall( CAMPUSTYPE . " WHERE is_deleted=0" );
// $session_year=$conf->fetchall( SESSIONYEAR . " WHERE is_deleted=0" );
// $class_name=$conf->fetchall( CLASSNAME . " WHERE is_deleted=0" );
// $query="SELECT  * from Student INNER JOIN STUDENTFEE on Student.sid=STUDENTFEE.sid";

// $sql = "SELECT * FROM Student INNER JOIN STUDENTFEE ON Student.st_id = STUDENTFEE.fee_id";  
//  $result = mysqli_query($conn, $sql);  

?>
<section class="content">
  <div class="container">
    <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 "><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="card center1">
              <div class="card-header ">
                <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
                <div class="float-right mt-3">
                  <a class="btn btn-warning float-right" href="student-report.php"> Print Report
                    </a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div id="tabledata_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline no-footer collapsed" 
                      aria-describedby="tabledata_info">

                        <thead class="btn-warning">

                          <tr>
                            <th style="width:5%">Adm# </th>
                            <th style="width:10%">Student Name</th>
                            <th style="width:8%"> Father Name</th>
                            <th style="width:5%">B Form No</th>
                            <th style="width:5%">Gender</th>
                            <th style="width:10%">Date of Birth</th>
                            <!-- <th style="width:5%">1Mnth</th> -->
                            <!-- <th style="width:5%">Free</th> -->
                            <!-- <th style="width:5%">Freeze</th> -->
                            <th style="width:5%">Campus</th>
                            <!-- <th style="width:5%">PassOut</th> -->
                            <th style="width:5%">Class</th>
                            <th style="width:5%">Nationality</th>
                            <!-- <th style="width:5%">StruckOff</th> -->
                            <th style="width:5%">Religion</th>
                            <!-- <th style="width:5%">staff kid</th>
                            <th style="width:5%">Left</th> -->
                          </tr>

                        </thead>

                        <tbody>
                        <?php
               
               foreach ($results as $data) {
                // $studName = STUDENTFEE . " where id='" . $data->month_fee . "'";
                // $cat = $conf->singlev($studName);s

                // $ClassName = CLASSNAME . " where id='" . $data->class_name . "'";
                // $com = $conf->singlev($ClassName);


                // $sessionName = SESSIONYEAR . " where id='" . $data->session_name . "'";
                // $session = $conf->singlev($sessionName);

                // $sectionName = SECTION . " where id='" . $data->section_name . "'";
                // $section = $conf->singlev($sectionName);
                   
              ?>
                                       <tr>


                                           <td>
                                               <?=$data->addmission_no?>
                                           </td>
                                           <td>
                                               <?=$data->name?>
                                           </td>
                                           <td>
                                               <?=$data->father_name?>

                                           </td>
                                           <td>
                                                  <?=$data->mobile_number?>    

                                           </td>
                                           <td>
                                                <?=$data->gender?> 

                                           </td>
                                           <td>
                                               <!-- <?=$data->date_birth?> -->
                                               <?php echo date("d-m-Y", strtotime($data->date_birth)); ?>

                                           </td>
                                           <td>
                                                <?=$data->campus?> 

                                           </td>
                                           <td>
                                                <?=$data->class?> 

                                                </td>
                                                <td>
                                                <?=$data->nationality?> 

                                                </td>
                                                <td>
                                                <?=$data->religion?> 

                                                </td>
                                           
                                       </tr>
                                       <?php } ?>
                                       
                          
                        </tbody>
                        

                      </table>
                      
                      
                    </div>


                  </div>
                </div>


                <!-- /.card-body -->
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid -->
  </div>
</section>



