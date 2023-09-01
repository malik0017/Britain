<?php
//delete record


$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");

if (isset($_POST['submit'])) {
  // Get form data
  $campusId = $_POST['campus'];
  $staffId = $_POST['staff_id'];
  $expiryDate = $_POST['expiry_date'];
  $amount = $_POST['amount'];
  
         $date=date("Y-m-d");
				$description='Funds BY'.$staffId.' Date '.$date.' amount is '.$amount;
				$vno = $conf->VoucherNo();
				$vno = 'PF'.$vno;
				
				

				$recodes=$conf->FundsEntry(PROVIDENTFUNDS,$description, $amount, $staffId, 'db',0,1, $date, $vno);
    if ($recodes == true) {
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
            <h1 class="m-0">Provident funds Withdrawl</h1>
          </div>
          <div class="col-sm-6">            
          </div>
        </div>
                <form action=" " method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="campus" class="form-label">Campus</label>
                        <select class="form-select form-control campus" id="campus" tabindex="6" name="campus" required>
                          <?php foreach ($campus_name as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div id="staffkid" class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Staff</label>
                        <select class="form-select form-control" id="staff_id" tabindex="42" name="staff_id">
                          <!-- Staff options will be dynamically populated here -->
                        </select>
                      </div>
                    </div>
                    <div id="staffkid" class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="staff" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder=""/>
                      </div>
                    </div>
                   
                    <div id="expirydate" class="col-lg-6 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="expiry_date">Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="">
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