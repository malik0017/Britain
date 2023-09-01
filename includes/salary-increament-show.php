<?php
$empid =  $_REQUEST[ 'CD' ] ;
//  echo "aaaaaaaaaa".$empid;

//  $results = $conf->singlev(INREAMENTSALARY . " WHERE id=$empid");
//         $results = "SELECT * FROM ".INREAMENTSALARY." where id = $empid";
//         $results = $conf->QueryRun($results);
//         $empid= $results[0]->emp_id;
        
        
        echo $sql = "SELECT i.*, c.campus_name,s.employel_name as employee 
        FROM " . INREAMENTSALARY . " as i
        INNER JOIN " . STAFF . " as s ON i.emp_id = s.employel_id
        INNER JOIN " . CAMPUStbl . " as c ON i.campus_id = c.id
        WHERE i.id = $empid ";
           
         $results1 = $conf->QueryRun($sql);
         $result = $results1[0];
print_r($result);
?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Increament Salary
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="salary-increament-view.php"> Back</a>
            </div>
              </div>
                
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Date:</dt>
                        <dd class="col-sm-6"><?php echo $result->date; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                       <dt class="col-sm-6"> Campus:</dt>
                       <dd class="col-sm-6"><?php echo $result->campus_name;  ?>  </dd>
                    </div>
                    <div class="d-flex">
                  <dt class="col-sm-6">Employee Name:</dt>
                  <dd class="col-sm-6"> <?php echo $result->employee;  ?> </dd>
                  </div>
                  <div class="d-flex">
                    <dt class="col-sm-6"> Previos Salary:</dt>
                    <dd class="col-sm-6"> <?php echo $result->pre_salary;  ?> </dd>
                     </div>
                   
                    <div class="d-flex">
                    <dt class="col-sm-6"> Increament Amount:</dt>
                    <dd class="col-sm-6"><?php echo $result->increament_amount;  ?>  </dd>
                     </div> 
                     <div class="d-flex">
                      <dt class="col-sm-6">New Salary:</dt>
                      <dd class="col-sm-6"> <?php echo $result->new_salary;  ?> </dd>
                    </div>
                    
               
              </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>