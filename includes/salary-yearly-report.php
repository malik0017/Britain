<?php
// require 'setup/config.php';

//delete record




$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");


if (isset($_POST['submit'])) {

   
  $campusId = $_POST['campus'];
  $staffId = $_POST['staff_id'];
  $startDate = $_POST['start_date'];
  $end_date = $_POST['end_date'];


 

  $sql_query = "SELECT sf.*,s.employel_name as employel_name, d.employel_type as d_name 
  FROM ".STAFFSALARY." as sf
  INNER JOIN ".STAFF." AS s ON s.employel_id = sf.emp_id
  INNER JOIN ".EMPLOYETYE. " as d ON s.employel_type = d.id
  WHERE DATE(sf.created_at) BETWEEN '" . $startDate . "' AND '" . $end_date . 
  "' AND emp_id=" . $staffId . " order by id ASC";


  $results = $conf->QueryRun($sql_query);
  // print_r($results);

}

?>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">



            <div class="card center1">
                          
            <form action=" " method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="campus" class="form-label">Campus</label>
                        <select class="form-select form-control campus" id="campus" tabindex="6" name="campus" required>
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div id="staffkid" class="col-lg-2 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff_id" class="form-label">Staff</label>
                        <select class="form-select form-control" id="staff_id" tabindex="42" name="staff_id">
                          <!-- Staff options will be dynamically populated here -->
                        </select>
                      </div>
                    </div>
                    <div id="expirydate" class="col-lg-2 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="start_date">start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" tabindex="18" placeholder="">
                      </div>
                    </div>

                    <div id="expirydate" class="col-lg-2 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" tabindex="18" placeholder="">
                      </div>
                    </div>

                      <div class="text-center mt-4 pt-2">
                        <label></label>
                        <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="47" />
                      </div>
                      </div>
                  </form>
                   
                   

                

              </div>
              <!-- <div class="text-center float-right mt-3  mr-4">
                              <input type="submit" name="print" value="Print" class="btn btn-warning " tabindex="8"/>
                             </div> -->
              <!-- /.card-header -->
              <a class="btn btn-primary mt-3" style="float: right;" href="left-staff-print-report.php? cd=<?=$gen->IDencode($campus_id)?>"> Print</a>
              <div class="card-body">
             
              
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <!-- <th style="width:10%">Employee id</th> -->
                      <th style="width:10%">Employee Name</th>
                      <th style="width:8%">Designation</th>
                      <th style="width:10%">Leaves</th>
                      <th style="width:5%">Deaction Leave Amount</th>
                      
                      <th style="width:8%">Lunch Allowance</th>
                      <th style="width:8%">Kids Fee</th>
                      <th style="width:8%">Deaction Income Tax</th>
                      <th style="width:8%">Deaction Security</th>
                      <th style="width:8%">Othher Allowance</th>
                      <th style="width:8%">Deaction Provident Funds</th>
                      <th style="width:8%">Basic Salary</th>
                      <th style="width:8%">Net Salary</th>




                      <!-- <th style="width:1%">View</th>
                      <th style="width:1%">Edit</th>
                      <th style="width:1%">Delete</th> -->



                      <!-- <th class="no-sort" style="width:13%">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach ($results as $data) {
                    ?>
                      <tr>

                        <!-- <td>
                          <?= $data->id ?>
                        </td> -->

                        <td>
                          <?= $data->employel_name ?>

                        </td>
                        <td>
                          <?= $data->d_name ?>

                        </td>
                        <td>
                          <?= $data->leaves ?>

                        </td>
                        <td>
                          <?= $data->d_leave_amount ?>

                        </td>
                        <td>
                          <?= $data->a_lunch ?>

                        </td>
                        <td>
                          <?= $data->free_kids ?>

                        </td>

                        <td>
                          <?= $data->d_income_tax ?>

                        </td>
                        <td>
                          <?= $data->d_security ?>

                        </td>
                        <td>
                          <?= $data->other_allowance ?>

                        </td>

                        <td>
                          <?= $data->d_provident_funds ?>

                        </td>
                        <td>
                          <?= $data->basic_salary ?>

                        </td>
                        <td>
                          <?= $data->net_salary ?>

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