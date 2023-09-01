<?php
// require 'setup/config.php';

//delete record
if (isset($_POST['deleteid'])) {
  $deleteid = $_POST['deleteid'];
  //delete From Database
  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = INREAMENTSALARY . " set `is_deleted`=1  where id='" . $deleteid . "'";
  $flagmain = $conf->updateValue($table);
  if ($flagmain) {
    $success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
  }
}
// echo $sql = "SELECT i.*, d.employel_name as s_name
// 	FROM " . INREAMENTSALARY . " as i
// 	INNER JOIN " . STAFF . " as d ON i.employee_name = d.emp_id
// 	WHERE id = .$emp_id AND d.IsActive = 1 AND d.IsLeft = 0";
	  
// $results = $conf->QueryRun($sql);
// print_r($results);

$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");



if (isset($_POST['search_by_date'])) {

  
  $date_from = $_POST['date'];
  $date_to = $_POST['date_to'];
  $campus_id = $_POST['campus'];
  $sql_query = "SELECT * FROM ".INREAMENTSALARY."  WHERE DATE(date) BETWEEN '" . $date_from . "' AND '" . $date_to . 
"' AND campus_id=" . $campus_id . " order by id ASC";
//  $sql_query;
$results = $conf->QueryRun($sql_query);

$empid= $results[0]->emp_id;
// print_r($empid);
// exit;

$sql = "SELECT i.*, s.employel_name as employee 
 FROM " . INREAMENTSALARY . " as i
 INNER JOIN " . STAFF . " as s ON i.emp_id = s.employel_id
 WHERE i.emp_id = $empid ";
	  
	$results1 = $conf->QueryRun($sql);

}




?>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">



            <div class="card center1">
                          
                <form name="post" action="" method="post">
             
                  <div class="row py-3 ml-4">
                  <div class="col-lg-3 col-md-6 col-sm-6 mb-3">

                      <div class="form-group">
                      <label class="select"> &nbsp; &nbsp;Date From &nbsp;</label>
                        <input type="date" name="date_from" id="invoiceDate2"
                               value="<?php echo date("Y-m-d", strtotime("-1 month")); ?>"
                               class="form-control productSelection datepicker hasDatepicker">
                      </div>
                    </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 mb-3">

                        <div class="form-group">
                        <label class="select" style="font-weight:bold;"> Date To </label>
                        <input type="date" name="date_to" id="invoiceDate2" value="<?php echo date("Y-m-d"); ?>"
                               class="form-control productSelection datepicker hasDatepicker">
                        </div>
                        </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">

                      <div class="form-group">
                        <label for="campus" class="form-label ">Campus</label>
                        <select class="form-select form-control" id="campus" tabindex="1" name="campus">
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                    </div>
                    
                
                    <div class="text-center my-auto mt-5">
                              <input type="submit" name="search_by_date" value="Search" class="btn btn-warning " tabindex="8"/>
                      </div>
                  </div>
                      </form>
                   
                   

                

              </div>
              <!-- <div class="text-center float-right mt-3  mr-4">
                              <input type="submit" name="print" value="Print" class="btn btn-warning " tabindex="8"/>
                             </div> -->
              <!-- /.card-header -->
              <a class="btn btn-primary mt-3" style="float: right;" href="increament-salary-print-report.php? cd=<?=$gen->IDencode($campus_id)?>"> Print</a>
              <div class="card-body">
             
              
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <th style="width:10%">Date</th>
                      <th style="width:10%">Employee Name</th>
                      <th style="width:8%">Previos Salary</th>
                      <th style="width:10%">Increament Amount</th>
                      <th style="width:5%">New Salary</th>
                      
                      <!-- <th style="width:8%">Father Contact</th> -->




                      <!-- <th style="width:1%">View</th>
                      <th style="width:1%">Edit</th>
                      <th style="width:1%">Delete</th> -->



                      <!-- <th class="no-sort" style="width:13%">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach ($results1 as $data) {
                    ?>
                      <tr>

                    <td> 
                          <?= $data->date ?>
                        </td> 

                        <td>
                          <?= $data->employee ?>

                        </td>
                        <td>
                          <?= $data->pre_salary ?>

                        </td>
                        <td>
                          <?= $data->increament_amount ?>

                        </td>
                        <td>
                          <?= $data->new_salary ?>

                        </td>
               
                      </tr>
                    <?php
                    }
                    ?>
                    
                  </tbody>
                 
                  <!-- <a class="btn btn-primary" style="float: right" href="left-staff-print-report.php">Print</a> -->
                  <!-- <a class="btn btn-primary" style="float: right" href="left-staff-print-report.php? cd=<?= $gen->IDencode($campus_id) ?>">Print</a> -->
                  <!-- <a class="btn btn-primary" style="float: right;" href="left-staff-print-report.php?cd=<?= $encoded_campus_id ?>">Print</a> -->
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