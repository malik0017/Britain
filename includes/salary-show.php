<?php
 $show_id =  $_REQUEST[ 'CD' ] ;


 $sql = " SELECT sf.*, s.employel_name as employel_name, s.father_name as father_name , c.campus_name as campus , s.contact as contact
	FROM ".STAFFSALARY." AS sf
	INNER JOIN ".STAFF." AS s ON sf.emp_id =s.employel_id
  INNER JOIN ".CAMPUStbl." AS c ON sf.campus_id =c.id
	WHERE sf.id = $show_id ";


  // echo $sql = " SELECT *, FROM ".STAFFSALARY."
	// WHERE id = $show_id ";
  $results = $conf->QueryRun($sql);
  $results1 =$results[0];
  // print_r($results);
// $results = $conf->singlev( SECTION . " WHERE id='" . $section_id . "'");



?>




<div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title btn1 float-left">
                  <!-- <i class="fas fa-text-width"></i> -->
                  Show Salary
                </h3>
                <div class="float-right">
                <a class="btn btn-warning" href="salary-view.php"> Back</a>
            </div>
              </div>
           

              
              <!-- /.card-body -->

               <!-- /.card-header -->
               <div class="card-body f-flex">
                <div class="row ">
                  <div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Staff Name:</dt>
                        <dd class="col-sm-6"><?php echo $results1->employel_name; ?></dd>
                    </div>     
                    <div class="d-flex">
                        <dt class="col-sm-6">Campus:</dt>
                        <dd class="col-sm-6"><?php echo $results1->campus; ?></dd>
                    </div>                                  
                    <div class="d-flex">
                        <dt class="col-sm-6">Salary Month:</dt>
                        <dd class="col-sm-6"><?php echo $results1->salary_month; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Basic Salary:</dt>
                        <dd class="col-sm-6"><?php echo $results1->basic_salary; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Detection Leave Amount:</dt>
                        <dd class="col-sm-6"><?php echo $results1->d_leave_amount; ?></dd>
                    </div>   
                    <div class="d-flex">
                        <dt class="col-sm-6">Lunch Allowance:</dt>
                        <dd class="col-sm-6"><?php echo $results1->a_lunch; ?></dd>
                    </div>  

                    <div class="d-flex">
                        <dt class="col-sm-6">Security Detection:</dt>
                        <dd class="col-sm-6"><?php echo $results1->d_security; ?></dd>
                    </div>  

                  
                    <div class="d-flex">
                        <dt class="col-sm-6">Other Allowance:</dt>
                        <dd class="col-sm-6"><?php echo $results1->other_allowance; ?></dd>
                    </div> 
                       <div class="d-flex">
                        <dt class="col-sm-6">Detection Loan:</dt>
                        <dd class="col-sm-6"><?php echo $results1->d_loan; ?></dd>
                    </div>  
              </div>
<div class="col-6 ">
                    <div class="d-flex">
                        <dt class="col-sm-6">Contact:</dt>
                        <dd class="col-sm-6"><?php echo $results1->contact; ?></dd>
                    </div>                                     
                    <div class="d-flex">
                        <dt class="col-sm-6">Salary Year:</dt>
                        <dd class="col-sm-6"><?php echo $results1->salary_year; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Leaves:</dt>
                        <dd class="col-sm-6"><?php echo $results1->leaves; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Kids Fee :</dt>
                        <dd class="col-sm-6"><?php echo $results1->free_kids; ?></dd>
                    </div>   
                    <div class="d-flex">
                        <dt class="col-sm-6">Detection Income Tax:</dt>
                        <dd class="col-sm-6"><?php echo $results1->d_income_tax; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Detection Provident Funds:</dt>
                        <dd class="col-sm-6"><?php echo $results1->d_provident_funds; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Net Salary:</dt>
                        <dd class="col-sm-6"><?php echo $results1->net_salary; ?></dd>
                    </div>  
                    <div class="d-flex">
                        <dt class="col-sm-6">Loan Id :</dt>
                        <dd class="col-sm-6"><?php echo $results1->loan_id; ?></dd>
                    </div>  
                   <div class="d-flex">
                        <dt class="col-sm-6">Remarks :</dt>
                        <dd class="col-sm-6"><?php echo $results1->remarks; ?></dd>
                    </div>  
              </div>
              </div>
              <!-- /.card-body -->
            </div>

          </div>         
        </div>      
      </div><!-- /.container-fluid -->
    </div>