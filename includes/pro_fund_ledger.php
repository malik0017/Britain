<?php 

if (isset($_POST['submit'])) {
    $staffId = $_POST['staff_id'];
    // Get form data
     $sql = "SELECT pf.*, s.employel_name 
FROM ".PROVIDENTFUNDS." as pf
INNER JOIN ".STAFF. " as s ON pf.customer_id = s.employel_id
WHERE pf.customer_id = $staffId";
 echo $sql;
// exit;
$results = $conf->QueryRun($sql);

}
$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");

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
            <h1 class="m-0">Provident Funds </h1>
          </div>
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
                   
                      <div class="text-center mt-4 pt-2">
                        <label></label>
                        <input type="submit" name="submit" value="Search" class="btn btn-warning "/>
                      </div>
                      </div>
                  </form>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Provident Funds </h1>
          </div>
          <div class="col-sm-6">            
          </div>
        </div>
                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead class="btn-warning">
                        <tr>
                            <th width="10%">Date</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">parent</th>
                            <th width="30%">Description</th>
                            <th width="13%" class="text-right">Deposit</th>
                            <th width="13%" class="text-right">Withdraw</th>
                            <th width="13%" class="text-right">Current Balance</th>
                           

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($results > 0) {
                            foreach ($results as $itm_vr) {
                                if($itm_vr->cbalance_type == "cr"){
                                    $balance_amount =  $itm_vr->current_balance;   
                                } else{
                                    $balance_amount = -1 * $itm_vr->current_balance; 
                                }      
                                ?>
                                <tr>
                                    <td><?= $gen->date_for_user($itm_vr->t_datetime) ?></td>
                                    <td><?= $itm_vr->voucher_no ?></td>
                                    <td><?= $itm_vr->parent_id ?></td>
                                    <td>
                                        <?php
                                        if ($itm_vr->invoice_id == 0) {
                                            echo $itm_vr->Description;
                                        } else {
                                            if ($itm_vr->reference_type == 1) {

                                                ?>

                                                <a style="font-weight: bold;"
                                                   href="view_sale_invoice.php?CD=<?php echo $gen->IDencode($itm_vr->invoice_id); ?>">Sale
                                                    Invoice <?= $itm_vr->invoice_id ?></a>

                                                <?php
                                            } else if ($itm_vr->reference_type == 2) { ?>
                                                <a style="font-weight: bold;"
                                                   href="view_purchase_invoice.php?CD=<?php echo $gen->IDencode($itm_vr->invoice_id); ?>">Purchase
                                                    Invoice <?= $itm_vr->invoice_id ?></a>
                                            <?php } else if ($itm_vr->reference_type == 3) {
                                                ?>
                                                <a style="font-weight: bold;" href="view_purchase_invoice_md.php?CD=<?php echo $gen->IDencode($itm_vr->invoice_id); ?>">Medical Purchase Invoice <?= $itm_vr->invoice_id ?></a>
                                                <?php

                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="right">
                                        <?php
                                        if ($itm_vr->t_type == "cr") {
                                            echo $itm_vr->t_amount;
                                        }
                                        ?>
                                    </td>
                                    <td align="right">
                                        <?php
                                        if ($itm_vr->t_type == "db") {
                                            echo $itm_vr->t_amount;
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="right">
                                        <?php echo '<strong>' . $balance_amount . '</strong> '?>

                                    </td>
                                    
                                    
                                </tr>
                            <?php } ?>


                            <a class="btn btn-primary" style="float: right"
                               href="print_customer_ladger.php?Df=<?= $gen->IDencode($date_from); ?>&Dt=<?= $gen->IDencode($date_to) ?>&cd=<?= $gen->IDencode($customer_id) ?>">Print</a>


                        <?php } ?>
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