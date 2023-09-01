<?php
//delete record


$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");

if (isset($_POST['submit'])) {
  // Get form data
  $campusId = $_POST['campus'];
  $sm_posted = $_POST['month_year'];
  $sm_arr=explode('-',$sm_posted);
	
	
	$salary_month=$sm_arr[0];
	$salary_year=$sm_arr[1];
  // $attfile = $_POST['attendance_file'];


  $attfile = $_FILES[ "attendance_file" ][ "name" ];
  $fileExtension = pathinfo($attfile, PATHINFO_EXTENSION);
  $FileName = $campusId . "_" . date("Ymd_His") . "." . $fileExtension;
  
  
   
	move_uploaded_file( $_FILES[ "attendance_file" ][ "tmp_name" ], "upload/attendance/" .$FileName );

	
  
  $recodes=$conf->attendanceUpload($FileName);
  if ( $recodes == true ) {
    $success = "Data <strong>Added</strong> Successfully";

    //$gen->redirecttime( 'campus', '2000' );
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
          <div class="col-sm-6">
            <h1 class="m-0">Loan Alteration </h1>
          </div>
          <div class="col-sm-6">            
          </div>
        </div>
                <form action=" " method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <!-- <div class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="campus" class="form-label">Campus</label>
                        <select class="form-select form-control campus" id="campus" tabindex="6" name="campus" required>
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div> -->
                    
                    
                    <!-- <div id="staffkid" class="col-lg-6 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_no">Attendance Month:</label>
                      <select class="form-select form-control" name="month_year" id="month_year">
                            <?php
                            $currentYear ='2022';
                            $currentMonth = '2';
                          // $currentYear = date("Y");
                            // $currentMonth = date("n");
                          $selectedValue = $month_year;
                          
                            for ($year = $currentYear; $year <= ($currentYear + 10); $year++) {
                                $startMonth = ($year === $currentYear) ? $currentMonth : 1;
                                
                                for ($month = $startMonth; $month <= 12; $month++) {
                                    $monthName = date("F", mktime(0, 0, 0, $month, 1));
                                    $optionValue = "$month-$year";
                              $selectedAttribute = ($optionValue === $selectedValue) ? 'selected' : '';
                                    echo "<option value='$optionValue'$selectedAttribute>$monthName $year</option>";
                                }
                            }
                            ?>
                        </select>

				            </div>
                    </div> -->
                    <!-- <div id="staffkid" class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder=""/>
                      </div>
                    </div> -->
                    <div id="staffkid" class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="attendance_file" name="attendance_file" />
                      </div>
                    </div>
                    
                      </div>
                      <div class="text-center mt-4 pt-2">
                        <label></label>
                        <input type="submit" name="submit" value="Submit" class="btn btn-warning " />
                      </div>
                  </form>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
          
                
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>