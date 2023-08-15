<?php
//delete record
if (isset($_POST['deleteid'])) {
  $deleteid = $_POST['deleteid'];
  //delete From Database
  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = Student . " set `is_deleted`=1  where id='" . $deleteid . "'";
  $flagmain = $conf->updateValue($table);
  if ($flagmain) {
    $success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
  }
}
// $results = $conf->fetchall(Student . " where  is_deleted = 0");
$results = "SELECT * FROM ".Student." where  is_deleted = 0 ORDER BY id ASC LIMIT 100";
$results = $conf->QueryRun($results);
// print_r($results);




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
                  <a class="btn btn-warning float-right" href="student-add.php"> Create New
                    Student</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div id="tabledata_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline 
                      no-footer collapsed" aria-describedby="tabledata_info">

                        <thead class="btn-warning">

                          <tr>
                            <th style="width:5%">Addm# </th>
                            <!-- <th style="width:8%">B-Form Number</th> -->
                            <th style="width:1%">Name</th>
                            <th style="width:1%">Father Name</th>
                            <th style="width:1%">Mother Name</th>
                            <th style="width:3%">Session</th>
                            
                            <th style="width:1%">Campus</th>
                            <th style="width:1%">Class</th>
                            <th style="width:1%">Section</th>
                            <th style="width:1%">CNIC</th>
                            <th style="width:1%">Routes</th>
                            <!-- <th style="width:8%">Date Of Birth</th> -->
                            <!-- <th style="width:1%">Age</th> -->
                           
                            <!-- <th style="width:1%">Gender</th> -->
                          
                            <!-- <th style="width:1%">Nationality</th>
                            <th style="width:1%">Religion</th>
                            <th style="width:5%">Place Of Birth</th>
                            <th style="width:5%">Perment Address</th>
                            <th style="width:5%">Home Address</th>
                            <th style="width:5%">Office Address</th>
                            <th style="width:5%">Land Line Number</th>
                            <th style="width:5%">Mobile Number</th>
                            <th style="width:5%">Fathre Occuption</th>
                            <th style="width:5%">Mother Occuption</th>
                            <th style="width:5%">Last School Attended</th>
                           
                            <th style="width:1%">Image</th>
                            <th style="width:1%">Expiry Date</th>
                            <th style="width:1%">Guest Adm</th>
                           
                           
                            <th style="width:1%">App User Name</th>
                            <th style="width:1%">App Password</th>
                            <th style="width:1%">Gurdian Name</th>
                            <th style="width:1%">Gurdian Occuption</th>
                            <th style="width:5%">Emergency Phone Number</th>
                            <th style="width:5%">Email</th> -->
                             
                            
                            <th style="width:1%">View</th>
                            <th style="width:1%">Edit</th>
                            <th style="width:1%">Delete</th>
                          </tr>

                        </thead>

                        <tbody>
                        <?php
               
               foreach ($results as $data){

                $sessionName = SESSIONYEAR . " where id='" . $data->session_name . "'";
                $session = $conf->singlev($sessionName);

                $campusName = CAMPUStbl . " where id='" . $data->campus . "'";
                $cat = $conf->singlev($campusName);

                $ClassName = CLASStbl . " where id='" . $data->class . "'";
                $com = $conf->singlev($ClassName);


               


                $sectionName = SECTION . " where id='" . $data->section_name . "'";
                $section = $conf->singlev($sectionName);

                $routesName = ROUTE . " where id='" . $data->routes . "'";
                $routes = $conf->singlev($routesName);
                   
              ?>
                                       <tr>


                                           <td>
                                               <?=$data->addmission_no?>
                                           </td>
                                           <!-- <td>
                                               <?=$data->b_form?>
                                           </td> -->
                                           <td>
                                               <?=$data->name?>

                                           </td>
                                           <td>
                                               <?=$data->father_name?>

                                           </td>
                                           <td>
                                               <?=$data->mother_name?>

                                           </td>
                                           <td>
                                            <?= $session->session_year ?>
                                        </td>

                                            <td> 
                                                <?= $cat->campus_name ?>
                                            </td>

                                                <td>
                                                    <?= $com->class_name ?>
                                                </td>

                                                

                                           
                                           <td>
                                               <?=$section->section_title?>

                                           </td>
                                           <td>
                                               <?=$data->cnic?>

                                           </td>
                                            <td>
                                               <?=$routes->routes?>

                                           </td>
                                           <!-- <td>
                                                <?=$data->date_birth?>
                                               <?php echo date("d-m-Y", strtotime($data->date_birth)); ?>

                                           </td> -->
                                           <!-- <td>
                                               <?=$data->age?>

                                           </td> -->
                                          
                                           <!-- <td>
                                               <?=$data->gender?>

                                           </td> -->
                                           <!-- <td>
                                               <?=$data->nationality?>

                                           </td>
                                           <td>
                                               <?=$data->religion?>

                                           </td>
                                           <td>
                                               <?=$data->place_birth?>

                                           </td>
                                           <td>
                                               <?=$data->address?>

                                           </td>
                                           <td>
                                               <?=$data->home_address?>

                                           </td>
                                           <td>
                                               <?=$data->office_address?>

                                           </td>
                                           <td>
                                               <?=$data->land_number?>

                                           </td>
                                           <td>
                                               <?=$data->mobile_number?>

                                           </td>
                                           <td>
                                               <?=$data->fathre_occupt?>

                                           </td>
                                           <td>
                                               <?=$data->mother_occup?>

                                           </td>
                                           <td>
                                               <?=$data->last_school?>

                                           </td>
                                           
                                           <td>
                                               <?=$data->image?>

                                           </td>
                                           <td>
                                               <?=$data->expiry_date?>

                                           </td>
                                           <td>
                                               <?=$data->guest?>

                                           </td>
                                           <td>
                                               <?=$data->app_user?>

                                           </td>
                                           <td>
                                               <?=$data->password?>

                                           </td>
                                           <td>
                                               <?=$data->gurdian_name?>

                                           </td>
                                           <td>
                                               <?=$data->gurdian?>

                                           </td>
                                           <td>
                                               <?=$data->emergency_phone?>

                                           </td>
                                          
                                           <td>
                                               <?=$data->email?>

                                           </td> -->
                                          
                                           
                                          



                                           <td class="">

                                               <form action="student-show.php?CD=<?php echo $data->id; ?>"
                                                   method="post">
                                                   <button type="submit" class="btn btn-primary">Show</button>

                                               </form>

                                           </td>
                                           <td>
                                               <form action="student-edit.php?CD=<?php echo $data->id; ?>"
                                                   method="post">

                                                   <button type="submit" class="btn btn-primary">Edit</button>

                                               </form>
                                           </td>
                                           <td>
                                               <form action="" method="post">
                                                   <input type="hidden" name="deleteid"
                                                       value="<?php echo $data->id; ?>">

                                                   <button type="submit" class="btn btn-danger"
                                                       onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                                               </form>
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



