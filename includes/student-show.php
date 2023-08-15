<?php
$stud_id =  $_REQUEST[ 'CD' ] ;

// $results = $conf->singlev( Student. " WHERE id='" . $stud_id . "'" );
// print_r($stud_id);

$sql = "SELECT a.*, c.class_name, s.section_title, p.campus_name, y.session_year
FROM ".Student." as a


INNER JOIN ".CLASStbl. " as c ON a.class = c.id
INNER JOIN ". SECTION." as s ON a.section_name = s.id
INNER JOIN ". SESSIONYEAR." as y ON a.session_name = y.id
INNER JOIN ".CAMPUStbl." as  p ON a.campus = p.id


WHERE a.id = $stud_id";

// echo  "ewwwwwwwwwwwwwwww".$sql;
$results1 = $conf->QueryRun($sql);
$res = $results1[0];


  //  print_r($res);
// $sql2="SELECT *
// FROM ".STUDENTFEE." as sf
//  where sf.id=$stud_id ";
// $results2 = $conf->QueryRun($sql2);
// $results = $results2;


$sql2="SELECT sf.*, st.* 
FROM ".STUDENTFEE." sf
INNER JOIN ".Student." st ON sf.id = st.id

WHERE sf.id = $stud_id";
echo"aassssssssssssss".$sql2;
// print_r($sql2);
$results2 = $conf->QueryRun($sql2);
$results = $results2[0];
print_r($results);


?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Student
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="student-view.php"> Back</a>
            </div>
              </div>
              <div class="row campus-image justify-content-end img-fluid p-3">
                        <img src="upload/student/<?php echo $results->image; ?>" alt="" height="150" width="150"/>
                        <img src="upload/student/<?php echo $results->month_image; ?>" alt="" height="150" width="150"/>
                        <img src="upload/student/<?php echo $results->fee_image; ?>" alt="" height="150" width="150"/>
                        <img src="upload/student/<?php echo $results->conession_form; ?>" alt="" height="150" width="150"/>
                       
                </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-lg-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Addmission No:</dt>
                        <dd class="col-sm-6"><?php echo $results->addmission_no; ?></dd>
                    </div>     
                    <div class="d-flex">
                        <dt class="col-sm-6">B-Form Numbe:</dt>
                        <dd class="col-sm-6"><?php echo $results->b_form; ?></dd>
                    </div>                                    
                    <div class="d-flex">
                       <dt class="col-sm-6"> Student Name:</dt>
                       <dd class="col-sm-6"><?php echo $results->name;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Session:</dt>
                  <dd class="col-sm-6"> <?php echo $res->session_year;  ?> </dd>
                  </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Campus:</dt>
                  <dd class="col-sm-6"> <?php echo $res->campus_name;  ?> </dd>
                  </div>
                  <div class="d-flex">
                    <dt class="col-sm-6"> Gender:</dt>
                    <dd class="col-sm-6"> <?php echo $results->gender;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Date Of Birth:</dt>
                    <dd class="col-sm-6"> <?php echo date("d-m-Y", strtotime($results->date_birth)); ?>  </dd>
                     </div> 
                     <div class="d-flex">
                    <dt class="col-sm-6"> Age:</dt>
                    <dd class="col-sm-6"> <?php echo $results->age;  ?>  </dd>
                     </div> 

                     <div class="d-flex">
                        <dt class="col-sm-6">Section:</dt>
                        <dd class="col-sm-6"><?php echo $res->section_title; ?></dd>
                    </div>   
                    <div class="d-flex">
                        <dt class="col-sm-6">Date of Admission:</dt>
                        <dd class="col-sm-6"><?php echo $results->admission_date; ?></dd>
                    </div>                                  
                    <div class="d-flex">
                       <dt class="col-sm-6"> Last School Attended:</dt>
                       <dd class="col-sm-6"><?php echo $results->last_school;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Routes:</dt>
                  <dd class="col-sm-6"> <?php echo $res->routes;  ?> </dd>
                  </div>
                  <!-- <div class="d-flex">
                    <dt class="col-sm-6"> Student Image :</dt>
                    <dd class="col-sm-6"> <?php echo $results->image;  ?> </dd>
                     </div> -->
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Expiry Date:</dt>
                    <dd class="col-sm-6">
                      
                    <?php echo date("d-m-Y", strtotime($results->expiry_date)); ?> 
                   </dd>
                     </div> 
                     <div class="d-flex">
                    <dt class="col-sm-6"> Guest Adm:</dt>
                    <dd class="col-sm-6"><?php echo $results->guest;  ?>  </dd>
                   </div>

                     <div class="d-flex">
                        <dt class="col-sm-6">Father Name:</dt>
                        <dd class="col-sm-6"><?php echo $results->father_name; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> CNIC:</dt>
                       <dd class="col-sm-6"><?php echo $results->cnic;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Mother Name:</dt>
                  <dd class="col-sm-6"> <?php echo $results->mother_name;  ?> </dd>
                  </div>
      
                  <div class="d-flex">
                  <dt class="col-sm-6">Place Of Birth:</dt>
                  <dd class="col-sm-6"><?php echo $results->place_birth;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6">Class:</dt>
                    <dd class="col-sm-6"><?php echo $res->class_name;  ?>  </dd>
                   </div>

                   <div class="d-flex">
                  <dt class="col-sm-6">Nationality:</dt>
                  <dd class="col-sm-6"> <?php echo $results->nationality;  ?>  </dd>
                   </div>

                  <div class="d-flex">
                  <dt class="col-sm-6">Religion:</dt>
                  <dd class="col-sm-6">  <?php echo $results->religion;  ?> </dd>
                   </div>
                   </div>
                  <div class="col-6 ">
                               
                  

                   <div class="d-flex">
                      <dt class="col-sm-6">Perment Address:</dt>
                      <dd class="col-sm-6"> <?php echo $results->address;  ?> </dd>
                    </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Home Address:</dt>
                  <dd class="col-sm-6"><?php echo $results->home_address;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6"> Office Address:</dt>
                    <dd class="col-sm-6"><?php echo $results->office_address;  ?>  </dd>
                   </div>
                               
                  <div class="d-flex">
                  <dt class="col-sm-6">Land Line Number:</dt>
                  <dd class="col-sm-6"> <?php echo $results->land_number;  ?>  </dd>
                   </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Mobile Number:</dt>
                  <dd class="col-sm-6">  <?php echo $results->mobile_number;  ?> </dd>
                   </div>

                   <div class="d-flex">
                    <dt class="col-sm-6"> Fathre Occuption:</dt>
                    <dd class="col-sm-6"> <?php echo $results->fathre_occupt;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Mother Occuption:</dt>
                    <dd class="col-sm-6"><?php echo $results->mother_occup;  ?>  </dd>
                     </div> 

                     <!-- <div class="d-flex">
                        <dt class="col-sm-6">Age:</dt>
                        <dd class="col-sm-6"><?php echo $results->addmission_no; ?></dd>
                    </div>                                      -->
                    <div class="d-flex">
                       <dt class="col-sm-6"> App User Name:</dt>
                       <dd class="col-sm-6"><?php echo $results->app_user;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">App Password:</dt>
                  <dd class="col-sm-6"> <?php echo $results->password;  ?> </dd>
                  </div>
                  <div class="d-flex">
                    <dt class="col-sm-6"> Gurdian Name:</dt>
                    <dd class="col-sm-6"> <?php echo $results->gurdian_name;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Gurdian Occuption:</dt>
                    <dd class="col-sm-6"><?php echo $results->gurdian;  ?>  </dd>
                     </div> 

                   <div class="d-flex">
                      <dt class="col-sm-6">Emergency Phone Number:</dt>
                      <dd class="col-sm-6"> <?php echo $results->emergency_phone;  ?> </dd>
                    </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Email:</dt>
                  <dd class="col-sm-6"><?php echo $results->email;  ?>   </dd>
                   </div>
                   <!-- <div class="d-flex">
                    <dt class="col-sm-6"> Guest Adm:</dt>
                    <dd class="col-sm-6"><?php echo $results->guest;  ?>  </dd>
                   </div> -->
                   <div class="d-flex">
                    <dt class="col-sm-6"> Month Fee Plan:</dt>
                    <dd class="col-sm-6"> <?php echo $results->month_fee;  ?> </dd>
                     </div> 
                     <div class="d-flex">
                    <dt class="col-sm-6"> Student Free::</dt>
                    <dd class="col-sm-6"> <?php echo $results->student_free;  ?> </dd>
                     </div>
                     <div class="d-flex">
                    <dt class="col-sm-6"> Staff:</dt>
                    <dd class="col-sm-6"> <?php echo $results->employel_name;  ?> </dd>
                     </div>
                     <div class="d-flex">
                    <dt class="col-sm-6">  Staff Kid:</dt>
                    <dd class="col-sm-6"> <?php echo $results->staff_kid;  ?> </dd>
                     </div>

                     <div class="d-flex">
                    <dt class="col-sm-6"> Apply Stationary:</dt>
                    <dd class="col-sm-6"> <?php echo $results->stationary;  ?> </dd>
                     </div> 
                     <div class="d-flex">
                    <dt class="col-sm-6"> Admission Detail:</dt>
                    <dd class="col-sm-6"> <?php echo $results->admission_detail;  ?> </dd>
                     </div>
                     <div class="d-flex">
                    <dt class="col-sm-6">Commitment if any:</dt>
                    <dd class="col-sm-6"> <?php echo $results->commitment;  ?> </dd>
                     </div>
                     <div class="d-flex">
                    <dt class="col-sm-6"> Reference:</dt>
                    <dd class="col-sm-6"> <?php echo $results->reference;  ?> </dd>
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