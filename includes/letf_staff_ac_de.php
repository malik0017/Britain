<?php
//delete record
if (isset($_POST['deleteid'])) {
  $deleteid = $_POST['deleteid'];
  //delete From Database
  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = STAFF . " set `is_deleted`=1  where id='" . $deleteid . "'";
  
  $flagmain = $conf->updateValue($table);
  if ($flagmain) {
    $success = "<p>Record  is <strong>Deleted</strong> Successfully</p>";
  }
}
// $results = $conf->fetchall(STAFF . " where is_deleted = 0");
$results = "SELECT * FROM ".STAFF." where is_deleted = 0 && IsLeft= 1  LIMIT 100 ";
$results = $conf->QueryRun($results);

$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");

if (isset($_POST['submit'])) {
  // Get form data
  $campusId = $_POST['campus'];
  $staffId = $_POST['staff_id'];
  $expiryDate = $_POST['expiry_date'];

  // Example: Update the 'staff' table with the selected campus, staff, and expiry date
  $query = STAFF . " set `IsLeft`= 1 ,`LeftDate`='" . $expiryDate . "' WHERE employel_id = '" .$staffId ."'";
  $update= $conf->updateValue($query);


  if ( $update == true ) {
    $success = "Record <strong>Updated</strong> Successfully";

    // $gen->redirecttime( 'staff-view.php', '2000' );
  } 
  else {
    $error = "Staff Not Updated";
  }

}

?>

<div class="content">
  
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="card center1">
              <div class="card-header ">
                <!-- <div class="float-right mt-3">
                  <a class="btn btn-warning float-right" href="staff-add.php"> Create New Staff</a>
                </div> -->
                <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0">Staff Deactive </h1>
          </div> -->
          <div class="col-sm-6">            
          </div>
        </div>
                <form action=" " method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="campus" class="form-label">Campus</label>
                        <select class="form-select form-control campus" id="campus" tabindex="6" name="campus" required>
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div id="staffkid" class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Staff</label>
                        <select class="form-select form-control" id="staff_id" tabindex="42" name="staff_id">
                          <!-- Staff options will be dynamically populated here -->
                        </select>
                      </div>
                    </div>
                    <div id="expirydate" class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" tabindex="18" placeholder="">
                      </div>
                    </div>
                      <div class="text-center mt-4 pt-2">
                        <label></label>
                        <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="47" />
                      </div>
                      </div>
                  </form>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0">Active Staff </h1>
          </div> -->
          <div class="col-sm-6">            
          </div>
        </div>
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <th style="width:10%">Employee id</th>
                      <th style="width:10%">Employee Name</th>
                      <th style="width:8%">Father Name</th>
                      <th style="width:10%">Gender</th>
                      <th style="width:5%">Contact</th>
                      
                      <th style="width:8%">Status</th>




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
                        <!-- <td>
                          <?= $data->IsLeft ?>

                        </td> -->
                        <td><?= ($data->IsLeft == 1) ? 'Deactive' : ($data->IsLeft == 0 ? 'Active' : 'Other value') ?></td>


                      



                        <!-- <td class="">

                          <form action="staff-show.php?CD=<?php echo $data->id; ?>" method="post">
                            <button type="submit" class="btn btn-primary">Show</button>

                          </form>

                        </td>
                        <td>
                          <form action="left_staff_edit.php?CD=<?php echo $data->id; ?>" method="post">

                            <button type="submit" class="btn btn-primary">Edit</button>

                          </form>
                        </td>
                        <td>
                          <form action="" method="post">
                            <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                          </form>
                        </td> -->
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>