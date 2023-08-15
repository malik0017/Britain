<?php 
//delete record
if ( isset( $_POST[ 'deleteid' ] ) ) {
    $deleteid=$_POST[ 'deleteid' ];
    //delete From Database
      //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
    //delete From Frontened
    $table = BANKACCOUNT. " set `is_deleted`=1  where id='" . $deleteid . "'";
          $flagmain = $conf->updateValue( $table );
    if ( $flagmain ) {
          $success = "<p>Record  is <strong>Deleted</strong> Successfully</p>";
      }
   
  }
$results=$conf->fetchall(BANKACCOUNT." where is_deleted = 0");
 ?>


<div class="content">
      <!-- <div class="container"> -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
              <div class="card center1">
    <div class="card-header ">
        <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
        <div class="float-right mt-3">
            <a class="btn btn-warning float-right" href="banks-account-add.php"> Create New Bank Account</a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
    <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline " aria-describedby="example1_info">
            <thead class="btn-warning">
                <tr>
                    <th style="width:4%">Campus Name</th>
                    <th style="width:3%">Bank Name</th>
                    <th style="width:4%">Account Title</th>
                    <th style="width:4%">Account No</th>
                    <th style="width:4%">Branch Name</th>
                    <th style="width:4%">Branch Code</th>
                    <th style="width:4%">Note</th>
                    <th style="width:1%">View</th>
                    <th style="width:1%">Edit</th>
                    <th style="width:1%">Delete</th>
                    
                  
                    <!-- <th class="no-sort" style="width:13%">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
               
                foreach ($results as $data){

                  $Campus = CAMPUStbl . " where id='" . $data->campus . "'";
                $com = $conf->singlev($Campus);
               ?>
                <tr>

                <td> 
                <?=$com->campus_name?>
                </td>
                <td> 
                  <?=$data->bank_name?>
                  </td>
                <td> 
                  <?=$data->account_title?>
                 </td>
               <td> 
                <?=$data->account_no?>
                 </td>
                 <td> 
                <?=$data->branch_name?>
                 </td>
                 <td> 
                <?=$data->branch_code?>
                 </td>
                 <td> 
                <?=$data->note?>
                 </td>


                    <td class="">
                    
                    <form action="banks-account-show.php?CD=<?php echo $data->id; ?>" method="post">
										<button type="submit" class="btn btn-primary">Show</button>									

                </form>
                    
                    </td>
                    <td>
                    <form action="banks-account-edit.php?CD=<?php echo $data->id; ?>" method="post">
                   
					         <button type="submit" class="btn btn-primary">Edit</button>									

                </form>  
                    </td>
                    <td>
                       <form action="" method="post">
                      <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                      </form>
                    </td>

               
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <!-- /.card-body -->
                </div>
    </div>