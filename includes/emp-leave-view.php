<?php 
//delete record
if ( isset( $_POST[ 'deleteid' ] ) ) {
  $deleteid=$_POST[ 'deleteid' ];
  //delete From Database
	//$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = EMPleave. " set `is_deleted`=1  where id='" . $deleteid . "'";
		$flagmain = $conf->updateValue( $table );
  if ( $flagmain ) {
		$success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
	}
 
}

// $campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );

// $leave_type = $conf->fetchall(LEAVE . " WHERE is_deleted=0");

$sql = "SELECT *
                        FROM ".EMPleave." as empl 

                        INNER JOIN ".CAMPUStbl. " as c ON   empl.campus_id=c.id

                        INNER JOIN ".STAFF. " as s  ON  empl.emp_id = s.employel_id
                       
                        INNER JOIN ".LEAVE. " as l ON  empl.leave_type_id = l.id";

                        // echo $sql;
    $results = $conf->QueryRun($sql);




	// $results = $conf->fetchall(EMPleave);



// $results=$conf->fetchall(EMPleave." where is_deleted = 0");
 ?>


<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
                

              <div class="card center1">
    <div class="card-header ">
        <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
        <div class="float-right mt-3">
            <a class="btn btn-warning float-right" href="emp-leave-add.php"> Create New Employee Leave </a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline"
            aria-describedby="example1_info">
            <thead class="btn-warning">
                <tr>
                    <th style="width:15%">Campus</th>
                    <th style="width:15%">Staff</th>
                    <th style="width:15%">Leave</th>
                    <th style="width:15%">Short Leave Hour</th>
                    <th style="width:15%">From</th>
                    <th style="width:15%">To</th>
                    <th style="width:15%">Status</th>
                    <th style="width:15%">Approved By</th>

                    
                    <th style="width:1%">View</th>
                    <th style="width:1%">Edit</th>
                    <th style="width:1%">Delete</th>
                    
                  
                    <!-- <th class="no-sort" style="width:13%">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
               
                foreach ($results as $data){
               ?>
                <tr>

                    <td>
                      <?=$data->campus_name; ?>
                    </td>

                    <td>
                      <?=$data->employel_name; ?>
                    </td>

                    <td>
                      <?=$data->name; ?>
                    </td>

                    <td>
                      <?=$data->short_leave_hour; ?>
                    </td>

                    <td>
                      <?=$data->date_from; ?>
                    </td>

                    <td>
                      <?=$data->date_to; ?>
                    </td>

                    <td>
                      <?=$data->is_paid; ?>
                    </td>

                    <td>
                      <?=$data->aproved_by; ?>
                    </td>
                    <!-- <td>laraib</td> -->
                    <!-- <td>teacher</td> -->
                    
                    <!-- <td>Khatak</td>
                    <td>Multan</td> -->
                    
                    

                    <td class="">
                    
                    <form action="emp-leave-show.php?CD=<?php echo $data->id; ?>" method="post">
										<button type="submit" class="btn btn-primary">Show</button>									

                </form>
                    
                    </td>
                    <td>
                    <form action="emp-leave-edit.php?CD=<?php echo $data->id; ?>" method="post">
                   
										<button type="submit" class="btn btn-primary">Edit</button>									

                </form>  
                    </td>
                    <td>
                       <form action="" method="post">
                      <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                      </form></td>

               
                </tr>
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



























              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>