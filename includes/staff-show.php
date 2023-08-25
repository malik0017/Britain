<?php
$staff_id =  $_REQUEST[ 'CD' ] ;

// $results = $conf->singlev( STAFF. " WHERE id='" . $stud_id . "'" );

//  $sql = "SELECT a.*, e.employel_level, s.employel_type, p.campus_name, d.department ,t.salary_type

//  FROM ".STAFF." as a


//  INNER JOIN ".EMPLOYELEVEL. " as e ON a.employel_level = c.id
//  INNER JOIN ". EMPLOYETYE." as s ON a.employel_type = s.id
//   INNER JOIN ". DEPARTMENT." as d ON a.department = d.id
//  INNER JOIN ".CAMPUStbl." as  p ON a.campus = p.id
//  INNER JOIN ".SALARY." as  t ON a.salary_type = t.id

//  WHERE a.id = $staff_id";
 

 $sql = "SELECT a.*, e.employel_level, s.employel_type, p.campus_name, d.department, t.salary_type
        FROM ".STAFF." AS a
        INNER JOIN ".EMPLOYELEVEL." AS e ON a.employel_level = e.id
        INNER JOIN ".EMPLOYETYE." AS s ON a.employel_type = s.id
        INNER JOIN ".DEPARTMENT." AS d ON a.department = d.id
        INNER JOIN ".CAMPUStbl." AS p ON a.campus = p.id
        INNER JOIN ".SALARY." AS t ON a.salary_type = t.id
        WHERE a.id = $staff_id";
        //  echo "qwwwwwwwwwww".$sql;
        // print_r($sql);
        $results1 = $conf->QueryRun($sql);
        $results = $results1[0];
        //issues join campus ;
       

?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Staff
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="staff-view.php"> Back</a>
            </div>
              </div>
                <div class="row campus-image justify-content-end img-fluid p-3">
                        <img src="upload/staff/<?php echo $results->employel_image; ?>" alt="" height="150" width="150"/>
                </div>
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Employee Level:</dt>
                        <dd class="col-sm-6"><?php echo $results->employel_level; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Employee id:</dt>
                       <dd class="col-sm-6"><?php echo $results->id;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Employee Name:</dt>
                  <dd class="col-sm-6"> <?php echo $results->employel_name;  ?> </dd>
                  </div>
                  <div class="d-flex">
                    <dt class="col-sm-6"> Gender:</dt>
                    <dd class="col-sm-6"> <?php echo $results->gender;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Father Name:</dt>
                    <dd class="col-sm-6"><?php echo $results->father_name;  ?>  </dd>
                     </div> 
                     <div class="d-flex">
                      <dt class="col-sm-6">Father Contact:</dt>
                      <dd class="col-sm-6"> <?php echo $results->father_contact;  ?> </dd>
                    </div>
                    <div class="d-flex">
                      <dt class="col-sm-6">Campus:</dt>
                      <dd class="col-sm-6"> <?php echo $results->campus_name;  ?> </dd>
                    </div>

                    <div class="d-flex">
                      <dt class="col-sm-6">Employee Type:</dt>
                      <dd class="col-sm-6"> <?php echo $results->employel_type;  ?> </dd>
                    </div>
                    
                    <div class="d-flex">
                      <dt class="col-sm-6">Department:</dt>
                      <dd class="col-sm-6"> <?php echo $results->department;  ?> </dd>
                    </div>

                    <div class="d-flex">
                    <dt class="col-sm-6"> Shift:</dt>
                    <dd class="col-sm-6"> <?php echo $results->shift;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> CNIC:</dt>
                    <dd class="col-sm-6"><?php echo $results->cnic;  ?>  </dd>
                     </div> 
                     <div class="d-flex">
                      <dt class="col-sm-6">Contact:</dt>
                      <dd class="col-sm-6"> <?php echo $results->contact;  ?> </dd>
                    </div>
                    <div class="d-flex">
                      <dt class="col-sm-6">Address:</dt>
                      <dd class="col-sm-6"> <?php echo $results->address;  ?> </dd>
                    </div>

                    <div class="d-flex">
                      <dt class="col-sm-6">City:</dt>
                      <dd class="col-sm-6"> <?php echo $results->city;  ?> </dd>
                    </div>
                    
                    <div class="d-flex">
                      <dt class="col-sm-6">Salary Type:</dt>
                      <dd class="col-sm-6"> <?php echo $results->salary_type;  ?> </dd>
                    </div>
                    <div class="d-flex">
                    <dt class="col-sm-6">  Basic Salary:</dt>
                    <dd class="col-sm-6"> <?php echo $results->basic_salary;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Account No:</dt>
                    <dd class="col-sm-6"><?php echo $results->account_no;  ?>  </dd>
                     </div> 
                     <div class="d-flex">
                      <dt class="col-sm-6">Ded.Ratio:</dt>
                      <dd class="col-sm-6"> <?php echo $results->ded_ration;  ?> </dd>
                    </div>
                    <div class="d-flex">
                      <dt class="col-sm-6">Travelling Allowane:</dt>
                      <dd class="col-sm-6"> <?php echo $results->travelling_allowane;  ?> </dd>
                    </div>

                    <div class="d-flex">
                      <dt class="col-sm-6">Lunch Allowance:</dt>
                      <dd class="col-sm-6"> <?php echo $results->lunch_allowance;  ?> </dd>
                    </div>
                    
                    <div class="d-flex">
                      <dt class="col-sm-6">Other Allowance:</dt>
                      <dd class="col-sm-6"> <?php echo $results->other_allowance;  ?> </dd>
                    </div>
                    <div class="d-flex">
                      <dt class="col-sm-6">P.Fund Deduction:</dt>
                      <dd class="col-sm-6"> <?php echo $results->fund_duction;  ?> </dd>
                    </div>
                 
                </div>
                             
                  <div class="col-6 ">
                   
                  <div class="d-flex">
                  <dt class="col-sm-6">Spouse Name:</dt>
                  <dd class="col-sm-6"><?php echo $results->spouse_name;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6"> Spouse Contact:</dt>
                    <dd class="col-sm-6"><?php echo $results->spouse_contact;  ?>  </dd>
                   </div>
                               
                  <div class="d-flex">
                  <dt class="col-sm-6"> Date Of Birth :</dt>
                  <dd class="col-sm-6"> 
                  <?php echo date("d-m-Y", strtotime($results->date_birth)); ?> 
                </dd>
                   </div>
                  <div class="d-flex">
                  <dt class="col-sm-6"> Jouning Date:</dt>
                 
                  <?php echo date("d-m-Y", strtotime($results->jouning_date)); ?> 
                
                </dd>
                   </div>


                   
                   <div class="d-flex">
                    <dt class="col-sm-6">Bank Account:</dt>
                    <dd class="col-sm-6"><?php echo $results->bank_account;  ?>  </dd>
                   </div>
                               
                  <div class="d-flex">
                  <dt class="col-sm-6"> Grace Time :</dt>
                  <dd class="col-sm-6"> <?php echo $results->grace_time;  ?>  </dd>
                   </div>
                  <div class="d-flex">
                  <dt class="col-sm-6"> Employee Email :</dt>
                  <dd class="col-sm-6">  <?php echo $results->employel_email;  ?> </dd>
                   </div>


                   <div class="d-flex">
                  <dt class="col-sm-6">Remarks:</dt>
                  <dd class="col-sm-6"><?php echo $results->remarks;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6">  Experience:</dt>
                    <dd class="col-sm-6"><?php echo $results->experience;  ?>  </dd>
                   </div>
                               
                  <div class="d-flex">
                  <dt class="col-sm-6"> Organization :</dt>
                  <dd class="col-sm-6"> <?php echo $results->organization;  ?>  </dd>
                   </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Total Year:</dt>
                  <dd class="col-sm-6">  <?php echo $results->total_year;  ?> </dd>
                   </div>

                   <div class="d-flex">
                  <dt class="col-sm-6">Total Months:</dt>
                  <dd class="col-sm-6"><?php echo $results->total_months;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6">  Designation:</dt>
                    <dd class="col-sm-6"><?php echo $results->designation;  ?>  </dd>
                   </div>
                               
                  <div class="d-flex">
                  <dt class="col-sm-6"> Starting salary :</dt>
                  <dd class="col-sm-6"> <?php echo $results->starting_salary;  ?>  </dd>
                   </div>
                  <!-- <div class="d-flex">
                  <dt class="col-sm-6">Employee Image:</dt>
                  <dd class="col-sm-6">  <?php echo $results->employel_image;  ?> </dd>
                   </div> -->


                   <div class="d-flex">
                  <dt class="col-sm-6">Last Qualification:</dt>
                  <dd class="col-sm-6"><?php echo $results->last_qualification;  ?>   </dd>
                   </div>
                   <div class="d-flex">
                    <dt class="col-sm-6">  Institute:</dt>
                    <dd class="col-sm-6"><?php echo $results->institute;  ?>  </dd>
                   </div>
                               
                  <div class="d-flex">
                  <dt class="col-sm-6"> Passing Year :</dt>
                  <dd class="col-sm-6"> <?php echo $results->passing_year;  ?>  </dd>
                   </div>
                  <div class="d-flex">
                  <dt class="col-sm-6">Appoitment For Class:</dt>
                  <dd class="col-sm-6">  <?php echo $results->appointmate_class;  ?> </dd>
                   </div>
                   <div class="d-flex">
                  <dt class="col-sm-6">Confirmation Date :</dt>
                  <dd class="col-sm-6">  <?php echo date("d-m-Y", strtotime($results->jouning_date)); ?>  </dd>
                   </div>
                   <div class="d-flex">
                  <dt class="col-sm-6">  Transfer to Bank:</dt>
                  <dd class="col-sm-6"><?php echo $results->transfer_bank;  ?>   </dd>
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