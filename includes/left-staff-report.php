<?php
// require 'setup/config.php';

//delete record
if (isset($_POST['deleteid'])) {
  $deleteid = $_POST['deleteid'];
  //delete From Database
  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = STAFF . " set `is_deleted`=1  where id='" . $deleteid . "'";
  $flagmain = $conf->updateValue($table);
  if ($flagmain) {
    $success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
  }
}


$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");


if (isset($_POST['search_by_campus'])) {

   
  $campus_id = $_POST['campus'];

  $sql_query = "SELECT * FROM ".STAFF." where is_deleted = 0 && IsLeft= 1 &&  campus = $campus_id ";

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
                          
                <form name="post" action="" method="post">
                  <div class="row py-3 ml-4">
                  
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
                              <input type="submit" name="search_by_campus" value="Search" class="btn btn-warning " tabindex="8"/>
                      </div>
                  </div>
                      </form>
                   
                   

                

              </div>
              <!-- <div class="text-center float-right mt-3  mr-4">
                              <input type="submit" name="print" value="Print" class="btn btn-warning " tabindex="8"/>
                             </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                
              
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <th style="width:10%">Employee id</th>
                      <th style="width:10%">Employee Name</th>
                      <th style="width:8%">Father Name</th>
                      <th style="width:10%">Gender</th>
                      <th style="width:5%">Contact</th>
                      
                      <th style="width:8%">Father Contact</th>




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

                        <td>
                          <?= $data->id ?>
                        </td>

                        <td>
                          <?= $data->employel_name ?>

                        </td>
                        <td>
                          <?= $data->father_name ?>

                        </td>
                        <td>
                          <?= $data->gender ?>

                        </td>
                        <td>
                          <?= $data->contact ?>

                        </td>
                        <td>
                          <?= $data->father_contact ?>

                        </td>


                      



                       
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <a class="btn btn-primary" style="float: right" href="left-staff-print-report.php">Print</a>

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